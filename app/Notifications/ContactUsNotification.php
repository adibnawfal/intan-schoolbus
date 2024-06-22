<?php

namespace App\Notifications;

use App\Models\UserDetails;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUsNotification extends Notification
{
  use Queueable;

  private $userDetails;

  private $name;

  private $email;

  private $message;

  /**
   * Create a new notification instance.
   */
  public function __construct(UserDetails $userDetails, string $name, string $email, string $message)
  {
    $this->userDetails = $userDetails;
    $this->name = $name;
    $this->email = $email;
    $this->message = $message;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @return array<int, string>
   */
  public function via(object $notifiable): array
  {
    return ['mail'];
  }

  /**
   * Get the mail representation of the notification.
   */
  public function toMail(object $notifiable): MailMessage
  {
    return (new MailMessage)
      ->subject('Intan Schoolbus - Query')
      ->greeting(
        __(
          'Hi :first_name :last_name,',
          ['first_name' => $this->userDetails->first_name, 'last_name' => $this->userDetails->last_name]
        )
      )
      ->line(__('I am :name (:email), I have some query:', ['name' => $this->name, 'email' => $this->email]))
      ->line(__(':query', ['query' => $this->message]))
      ->line('It would be appriciative, if you gone through this feedback.');
  }

  /**
   * Get the array representation of the notification.
   *
   * @return array<string, mixed>
   */
  public function toArray(object $notifiable): array
  {
    return [
      //
    ];
  }
}