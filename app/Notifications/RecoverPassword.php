<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RecoverPassword extends Notification
{
    use Queueable;

    public $name;
    public $encrypt;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $encrypt)
    {
        $this->name = $name;
        $this->encrypt = $encrypt;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello, '.$this->name)
                    ->line('You are receiving this email because we received a password request for your account. Please click the button below.')
                    ->action('Recover Password', url('recover-password/'.$this->encrypt))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
