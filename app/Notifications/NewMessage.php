<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewMessage extends Notification
{
    use Queueable;

    public $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $message )
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $message = auth()->user()->first_name . " sent you a message!";

        return (new MailMessage)
                    ->greeting('Hello ' . $this->message->recipient->first_name . ",")
                    ->subject($message)
                    ->line($message)
                    ->action('View Message', url('/messages/' . $this->message->from_user_id))
                    ->line('Thank you for using connection coin!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $message = auth()->user()->first_name . " sent you a message.";

        return [
            'to_user_id'      => $this->message->to_user_id,
            'from_user_id'    => $this->message->from_user_id,
            'from_first_name' => auth()->user()->first_name,
            'text'            => $this->message->text,
            'url'             => 'messages/' . $this->message->from_user_id,
            'message'         => $message
        ];
    }
}
