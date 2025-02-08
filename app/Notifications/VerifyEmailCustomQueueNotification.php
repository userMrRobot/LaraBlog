<?php

namespace App\Notifications;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;


class VerifyEmailCustomQueueNotification extends BaseVerifyEmail implements ShouldQueue
{
    use Queueable;
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Подтверждение Email')
            ->greeting('Здравствуйте!')
            ->line('Пожалуйста, подтвердите ваш email, чтобы завершить регистрацию.')
            ->action('Подтвердить Email', $verificationUrl)
            ->line('Если вы не регистрировались на нашем сайте, просто проигнорируйте это письмо.')
            ->salutation('С уважением, ' . config('app.name'));
    }

}
