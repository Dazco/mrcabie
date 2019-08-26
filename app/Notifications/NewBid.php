<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewBid extends Notification implements ShouldQueue
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
        $driver = $this->bid->driver;
        return (new MailMessage)
                    ->greeting("Hello $notifiable->name.")
                    ->line("A new bid from $driver->name for the ride #$ride->id from $ride->pickup_city to $ride->drop_city has been submitted ")
                    ->line("Please click the button below to view the ride and review the bid")
                    ->action("View Ride", route("admin.rides.show", $ride->id));
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
