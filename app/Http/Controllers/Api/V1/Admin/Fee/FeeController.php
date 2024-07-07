<?php

namespace App\Http\Controllers\Api\V1\Admin\Fee;

use App\Channels\SmsChannel;
use App\Channels\SmsChannelByMobile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\Fee\CreateFeeRequest;
use App\Http\Requests\Api\V1\Admin\Fee\UpdateFeeRequest;
use App\Http\Resources\Api\V1\Admin\Fee\FeePaginateResource;
use App\Http\Resources\Api\V1\Admin\Fee\FeeResource;
use App\Models\Fee;
use App\Notifications\Fee\FeeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class FeeController extends Controller
{
    public function index(Request $request)
    {
       // $this->authorize('index', Fee::class);

        $fees = Fee::query()
            ->latest()
            ->paginate($request->input('per_page', 10));

        return new FeePaginateResource($fees);
    }

    public function store(CreateFeeRequest $request)
    {
      //  $this->authorize('store', Fee::class);

        $fee = Fee::query()
            ->create(filterNullData($request->validationData()));

      //  dd($fee->clerk->mobile);


        return $this->success_response(new FeeResource($fee),
            'salary has been successfully created');
    }

    public function show(Fee $fee)
    {
       // $this->authorize('show', Fee::class);

        return $this->success_response
        (FeeResource::make($fee),
            'show salary information in admin panel');
    }

    public function update(UpdateFeeRequest $request, Fee $fee)
    {
        //   $this->authorize('update', Fee::class);


        $fee->update(filterNullData($request->all()));



        return $this->success_response(new FeeResource($fee),
            'salary has been successfully updated');
    }

    public function destroy(Fee $fee)
    {
      //  $this->authorize('destroy', Fee::class);

        $fee->delete();

        return $this->success_response
        (null, 'fee has been successfully deleted');
    }
}
