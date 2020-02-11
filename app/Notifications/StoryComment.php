<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class StoryComment extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $comment )
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $message = $this->comment->user->first_name . " ". $this->comment->user->last_name . " commented on your story.";

        return (new MailMessage)
                    ->greeting('Hello ' . $this->comment->story->user->first_name . ",")
                    ->subject($message)
                    ->line($message)
                    ->action('View Story', url('/stories/' . $this->comment->story->id))
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
        $user = User::find( $this->comment->user_id );

        return [
            'story_id'        => $this->comment->story_id,
            'text'            => $this->comment->text,
            'user_id'         => $this->comment->user_id,
            'user_first_name' => $user->first_name,
            'user_last_name'  => $user->last_name,
            'message'         => $user->first_name . " commented on your story.",
            'url'             => "/stories/" . $this->comment->story_id
        ];
    }
}
