<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar;

class SmsChannel
{
    public function send($notifiable, Notification $notification): array
    {
        try {
            return Kavenegar::Send
            (config('kavenegar.line_number'),
                [$notifiable->mobile],
                $notification->toSms($notifiable));

        } catch (ApiException|HttpException $exception) {
            return [$exception->getCode(), $exception->errorMessage()];
        }
    }
}
