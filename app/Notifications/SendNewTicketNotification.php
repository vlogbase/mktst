<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendNewTicketNotification extends Notification
{
    use Queueable;

    private $data;
    private $ticketDetail;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data, $ticketDetail)
    {
        $this->data = $data;
        $this->ticketDetail = $ticketDetail;
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
                    ->subject($this->ticketDetail['subject'])
                    ->line('Ticket title is: ' . $this->data['title'])
                    ->line('Ticket urgency is: ' . $this->data['urgency'])
                    ->action('Go to Ticket Detail', $this->ticketDetail['url'])
                    ->line('Have a nice day!');
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
