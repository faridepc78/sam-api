<?php

namespace App\Http\Controllers\Api\V1\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\Order\IndexOrderRequest;
use App\Http\Requests\Api\V1\Admin\Order\StoreOrderRequest;
use App\Http\Requests\Api\V1\Admin\Order\UpdateOrderRequest;
use App\Http\Resources\Api\V1\Admin\Order\OrderPaginateResource;
use App\Http\Resources\Api\V1\Admin\Order\OrderResource;
use App\Models\Order;
use App\Models\User;
use App\Notifications\WelcomeGuest\WelcomeGuestNotification;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

class OrderController extends Controller
{
    public function index(IndexOrderRequest $request)
    {
        $this->authorize('index', Order::class);

        $ordersQueryBuilder = QueryBuilder::for(Order::class)
            ->allowedFilters([
                AllowedFilter::callback('guest_name', function (Builder $query, $value) {
                    $query->whereHas('guest', function (Builder $query) use ($value) {
                        $query->where('name', 'like', '%' . $value . '%');
                    });
                }),
                AllowedFilter::exact('space_id'),
            ])
            ->with(['author', 'guest', 'space'])
            ->latest();

        $orders = $ordersQueryBuilder
            ->when($request->input('set_paginate'), function ($query) use ($request) {
                return $query->paginate($request->input('per_page', 10));
            }, function ($query) {
                return $query->get();
            });

        return $request->input('set_paginate')
            ? new OrderPaginateResource($orders)
            : $this->success_response(OrderResource::collection($orders),
            'show all of orders by space_id in admin panel');
    }

    public function store(StoreOrderRequest $request)
    {
        $this->authorize('store', Order::class);

        $order = Order::query()
            ->create(filterNullData($request->validationData()));

        //send notification to guest
        User::query()
            ->findOrFail($request->input('guest_id'))
            ->notify(new WelcomeGuestNotification());

        return $this->success_response
        (OrderResource::make($order->load(['author', 'guest', 'space'])),
            'order has been successfully created');
    }

    public function show(Order $order)
    {
        $this->authorize('show', Order::class);

        return $this->success_response
        (OrderResource::make($order->load(['author', 'guest', 'space'])),
            'show order information in admin panel');
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $this->authorize('update', Order::class);

        $order->update(filterNullData($request->validated()));

        return $this->success_response
        (OrderResource::make($order->refresh()
            ->load(['author', 'guest', 'space'])),
            'order has been successfully updated');
    }

    public function destroy(Order $order)
    {
        $this->authorize('destroy', Order::class);

        $order->delete();

        return $this->success_response
        (null, 'order has been successfully deleted');
    }
}
