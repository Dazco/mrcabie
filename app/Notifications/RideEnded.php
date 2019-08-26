<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RideEnded extends Notification implements ShouldQueue
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
        $class = get_class($notifiable);
        $ride = $this->bid->ride;
        $driver = $this->bid->driver;
        if($class === "App\Admin"){
            return (new MailMessage)
                ->greeting("Hello $notifiable->name")
                ->line("The ride #$ride->id from $ride->pickup_city to $ride->drop_city has been completed by $driver->name")
                ->line("Click the button below to view the ride")
                ->action("View Ride", route("admin.rides.show", $ride->id));
        }elseif($class === "App\Driver"){
            return (new MailMessage)
                ->greeting("Hello $notifiable->name")
                ->line("Good Job, You just completed the ride #$ride->id from $ride->pickup_city to $ride->drop_city")
                ->line("Click the button below to view the ride")
                ->action("View Ride", route("driver.rides.show", $ride->id));
        }elseif($class === "App\Client"){
            return (new MailMessage)
                ->greeting("Hello $notifiable->name")
                ->line("Your ride #$ride->id from $ride->pickup_city to $ride->drop_city has been completed by $driver->name")
                ->line("We hope you enjoyed our service");
        }
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
