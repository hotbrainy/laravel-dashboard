<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ArticleHasApproved extends Notification
{
    use Queueable;

    public $user;
    public $article;
    public $userType;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$article,$userType)
    {
        //
        $this->user = $user;
        $this->article = $article;
        $this->userType = $userType;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                ->from('noreply@'.config('app.domain'),config('app.name'))
                ->level('success')
                ->subject("Article Approved: ".$this->article->title)
                ->greeting('Dear '.$this->user->name)
                ->line('Congratulation Your article #'.$this->article->article_id.' has been approved.')
                ->line('Article ID: '.$this->article->article_id)
                ->line('Title: '.$this->article->title)
                ->line('Words:'.$this->article->total_words)
                ->line('Characters: '.$this->article->total_chars)
                ->line('Paragraphs: '.$this->article->total_paras)
                ->action('See More Details', url('/article/view/'.$this->article->article_id));
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
            'user_id' => $this->user->id,
            'notify_type' => $this->userType,
            'article_id' => $this->article->article_id,
            'message' => 'Your article was submit.we will let you back soon.!',
        ];
    }
}
