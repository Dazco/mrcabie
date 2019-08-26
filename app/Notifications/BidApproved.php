<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BidApproved extends Notification implements ShouldQueue
{
    use Queueable;

    private $bid;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($bid)
    {
        //
        $this->bid = $bid;
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
        $ride = $this->bid->ride;
        return (new MailMessage)
                    ->greeting("Hello $notifiable->name.")
                    ->line("The bid you submitted for the ride #$ride->id from $ride->pickup_city to $ride->drop_city has been approved.")
                    ->line("Please click the button below to view the ride")
                    ->action('View Ride', route("driver.rides.show", $ride->id));
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
