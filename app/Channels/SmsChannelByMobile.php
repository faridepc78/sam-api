<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Kavenegar;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class SmsChannelByMobile
{
    public function send($notifiable, Notification $notification): array
    {
        try {
            return Kavenegar::Send
            (env('KAVENEGAR_LINE_NUMBER'),
                [$notifiable->routes[__NAMESPACE__ . '\\' . class_basename(SmsChannelByMobile::class)]],
                $notification->toSms($notifiable));

        } catch (ApiException|HttpException $exception) {
            return [$exception->getCode(), $exception->errorMessage()];
        }
    }
}
