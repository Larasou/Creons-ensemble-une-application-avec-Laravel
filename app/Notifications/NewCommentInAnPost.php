<?php

namespace App\Notifications;

use App\Comment;
use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewCommentInAnPost extends Notification implements ShouldQueue
{
    use Queueable;
    /**
     * @var Post
     */
    private $post;
    /**
     * @var Comment
     */
    private $comment;

    /**
     * Create a new notification instance.
     *
     * @param Post $post
     * @param Comment $comment
     */
    public function __construct(Post $post, Comment $comment)
    {
        $this->post = $post;
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
            ->markdown('emails.new_comment_in_an_post', [
                'user' => $notifiable,
                'post' => $this->post,
                'comment' => $this->comment
            ])
            ->subject("Un nouveau comment dans {$this->post->name}")
           ->from('contact@larasou.com', 'Larasou')
            ->replyTo('soulouf@larasou.com', 'Soulouf');
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
