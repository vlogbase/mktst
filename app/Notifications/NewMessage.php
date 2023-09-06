<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessage extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $registeredUser;

    public function __construct($registeredUser)
    {
        $this->registeredUser = $registeredUser;
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
            ->subject('New Message')
            ->greeting('Hello, ' . $this->registeredUser['userName'])
            ->line('You have a new message from Markket website')
            ->line('Name: ' . $this->registeredUser['messageName'])
            ->line('Email: ' . $this->registeredUser['messageEmail'])
            ->line('Phone: ' . $this->registeredUser['messagePhone'])
            ->line('Subject: ' . $this->registeredUser['messageSubject'])
            ->line('Message: ' . $this->registeredUser['messageMessage']);
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
