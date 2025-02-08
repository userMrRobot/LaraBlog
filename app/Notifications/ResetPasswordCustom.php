<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordCustom extends ResetPassword implements ShouldQueue
{
    use Queueable;

    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->subject('Сброс пароля')
            ->greeting('Здравствуйте!')
            ->line('Вы получили это письмо, потому что мы получили запрос на сброс пароля для вашей учетной записи.')
            ->action('Сбросить пароль', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('Если вы не запрашивали сброс пароля, просто проигнорируйте это сообщение.')
            ->salutation('С уважением, ' . config('app.name'));
    }



}
