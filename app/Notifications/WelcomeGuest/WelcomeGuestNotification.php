<?php

namespace App\Notifications\WelcomeGuest;

use App\Channels\SmsChannel;
use Illuminate\Notifications\Notification;

class WelcomeGuestNotification extends Notification
{
    public function via($notifiable): array
    {
        return [SmsChannel::class];
    }

    public function toSms($notifiable): string
    {
        return 'به روم تور خوش آمدید';
    }
}
