<?php

namespace App\Notifications;

use App\Models\UserDetails;
use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentNotification extends Notification
{
  use Queueable;

  private $userDetails;

  private $payment;

  /**
   * Create a new notification instance.
   */
  public function __construct(UserDetails $userDetails, Payment $payment)
  {
    $this->userDetails = $userDetails;
    $this->payment = $payment;
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
      ->subject('Intan Schoolbus - Monthly Payment Update')
      ->greeting(
        __(
          'Dear :first_name :last_name,',
          ['first_name' => $this->userDetails->first_name, 'last_name' => $this->userDetails->last_name]
        )
      )
      ->line(
        __(
          'Thank you for using our school bus services. Your payment for :month is successful. Kindly return to the payment page for the updated record.',
          ['month' => $this->payment->month]
        )
      )
      ->action('View Record', url('/payment/record/' . $this->payment->bus_service_id));
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