<?php

namespace App\Http\Controllers\Api\V1\Admin\Salary;

use App\Channels\SmsChannel;
use App\Channels\SmsChannelByMobile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\Salary\CreateSalaryRequest;
use App\Http\Requests\Api\V1\Admin\Salary\UpdateSalaryRequest;
use App\Http\Resources\Api\V1\Admin\Salary\SalaryPaginateResource;
use App\Http\Resources\Api\V1\Admin\Salary\SalaryResource;
use App\Models\Salary;
use App\Notifications\Salary\SalaryNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class SalaryController extends Controller
{
    public function index(Request $request)
    {
       // $this->authorize('index', Salary::class);

        $salarys = Salary::query()
            ->latest()
            ->paginate($request->input('per_page', 10));

        return new SalaryPaginateResource($salarys);
    }

    public function store(CreateSalaryRequest $request)
    {
      //  $this->authorize('store', Salary::class);

        $salary = Salary::query()
            ->create(filterNullData($request->validationData()));

      //  dd($salary->clerk->mobile);
        if ($salary->sms==='active'){
            Notification::route(SmsChannelByMobile::class, $salary->clerk->mobile)
                ->notify(new SalaryNotification(
                    number_format($salary->monthly_salary),
                    number_format($salary->monthly_daily),
            ));
        }


        return $this->success_response(new SalaryResource($salary),
            'salary has been successfully created');
    }

    public function show(Salary $salary)
    {
       // $this->authorize('show', Salary::class);

        return $this->success_response
        (SalaryResource::make($salary),
            'show salary information in admin panel');
    }

    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
        //   $this->authorize('update', Salary::class);

        $salary->update(filterNullData($request->all()));



        return $this->success_response(new SalaryResource($salary),
            'salary has been successfully updated');
    }

    public function destroy(Salary $salary)
    {
      //  $this->authorize('destroy', Salary::class);

        $salary->delete();

        return $this->success_response
        (null, 'salary has been successfully deleted');
    }
}
