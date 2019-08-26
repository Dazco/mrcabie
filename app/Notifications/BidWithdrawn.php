<?php

namespace App\Notifications;

use App\Bid;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BidWithdrawn extends Notification implements ShouldQueue
{
    use Queueable;

    private $bid;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Bid $bid)
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
        $driver = $this->bid->driver;
        return (new MailMessage)
                    ->error()
                    ->greeting("Hello $notifiable->name")
                    ->line("The bid from $driver->name for the ride #$ride->id from $ride->pickup_city to $ride->drop_city has been withdrawn")
                    ->line("Please confirm the driver was not the selected driver for the ride")
                    ->line("If this is the case, please choose a new driver immediately by clicking the button below.")
                    ->action('View Ride', route("admin.rides.show", $ride->id));
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
