<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBookingNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Booking $booking)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Booking Request for ' . $this->booking->profile->name)
            ->greeting('Hello ' . $this->booking->profile->name . '!')
            ->line('You have received a new booking request for your profile.')
            ->line('Booking Details:')
            ->line('Full Name: ' . $this->booking->fullname)
            ->line('Phone: ' . $this->booking->phone)
            ->line('Zipcode: ' . $this->booking->zipcode)
            ->line('Service Type: ' . $this->booking->service_type)
            ->line('Duration: ' . $this->booking->duration)
            ->line('Date: ' . $this->booking->booking_date->format('F j, Y g:i A'))
            ->line('Status: ' . ucfirst($this->booking->status))
            ->when($this->booking->notes, function ($message) {
                return $message->line('Additional Notes:')
                    ->line($this->booking->notes);
            })
            ->action('View Booking', route('filament.admin.resources.bookings.edit', $this->booking))
            ->line('Thank you for using our platform!');
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