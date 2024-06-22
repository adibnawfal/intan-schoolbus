<?php

namespace App\Notifications;

use App\Models\UserDetails;
use App\Models\BusService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BusServiceNotification extends Notification
{
  use Queueable;

  private $userDetails;

  private $busService;

  /**
   * Create a new notification instance.
   */
  public function __construct(UserDetails $userDetails, BusService $busService)
  {
    $this->userDetails = $userDetails;
    $this->busService = $busService;
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
    if ($this->busService->status === 'Success') {
      return (new MailMessage)
        ->subject('Intan Schoolbus - Schoolbus Request Update')
        ->greeting(
          __(
            'Dear :first_name :last_name,',
            ['first_name' => $this->userDetails->first_name, 'last_name' => $this->userDetails->last_name]
          )
        )
        ->line(
          __(
            'Congratulations, your bus service request for :first_name :last_name is :status. You can now view the bus location from dashboard during school days and make monthly payment.',
            ['first_name' => $this->busService->student->first_name, 'last_name' => $this->busService->student->last_name, 'status' => $this->busService->status]
          )
        )
        ->action('Dashboard', url('/dashboard'));
    } else {
      return (new MailMessage)
        ->subject('Intan Schoolbus - Schoolbus Request Update')
        ->greeting(
          __(
            'Dear :first_name :last_name,',
            ['first_name' => $this->userDetails->first_name, 'last_name' => $this->userDetails->last_name]
          )
        )
        ->line(
          __(
            'We regret to inform you that you application for school bus service for :first_name :last_name is :status. Kindly contact the owner personally at +6012651336 to discuss further.',
            ['first_name' => $this->busService->student->first_name, 'last_name' => $this->busService->student->last_name, 'status' => $this->busService->status]
          )
        );
    }
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