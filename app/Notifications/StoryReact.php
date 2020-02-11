<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class StoryReact extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $story )
    {
        $this->story = $story;
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
        $message = auth()->user()->first_name . " ". auth()->user()->last_name . " reacted on your story.";

        return (new MailMessage)
                    ->greeting('Hello ' . $this->story['user_first_name'] . ",")
                    ->subject($message)
                    ->line($message)
                    ->action('View Story', url('/stories/' . $this->story->story_id))
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
        $emotions = getEmotions();
        $reaction = $this->story->reaction_id;

        return [
            'user_id'         => auth()->user()->id,
            'story_id'        => $this->story->story_id,
            'reaction_id'     => $this->story->reaction_id,
            'user_first_name' => auth()->user()->first_name,
            'user_last_name'  => auth()->user()->last_name,
            'message'         => auth()->user()->first_name . " reacted \"". $emotions[$reaction]['title'] ."\" to your story.",
            'url'             => '/stories/' . $this->story->story_id
        ];
    }
}
