<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class loginNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $email;
    /**
     * @var mixed
     */
    private $platform;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
        $this->platform = env('APP_NAME', 'karmento');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line("New Device Login To $this->email")
            ->line("Your Karmetno Account was just logged in to from a new $this->platform
device");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}
