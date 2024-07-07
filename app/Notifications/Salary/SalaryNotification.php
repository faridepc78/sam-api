<?php

namespace App\Notifications\Salary;

use App\Channels\SmsChannel;
use App\Channels\SmsChannelByMobile;
use Illuminate\Notifications\Notification;

class SalaryNotification extends Notification
{
    private $monthly_salary;
    private $monthly_daily;
    public function __construct($monthly_salary,$monthly_daily)
    {


        $this->monthly_salary = $monthly_salary;
        $this->monthly_daily = $monthly_daily;
    }
    public function via($notifiable): array
    {
        return [SmsChannelByMobile::class];
    }

    public function toSms($notifiable): string
    {
        return 'کارمند عزیز سام' .
            "\r\n" .
            'حقوق دریافتی  :'.
            "\r\n" .
            $this->monthly_salary.
            ' تومان '.
            "\r\n" .
            'پاداش  :'.
            "\r\n" .
            $this->monthly_daily.
            ' تومان '.
            "\r\n" .
            ' به حساب شما واریز گردید. ';
    }
}
