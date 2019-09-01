<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RideStarted extends Notification implements ShouldQueue
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
        if(get_class($notifiable) == "App\Client"){
//            return ['mail', 'nexmo'];
            return ['mail'];
        }else{
            return ['mail'];
        }
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
                    ->greeting("Hello $notifiable->name")
                    ->line("The Driver for your $ride->ride_type ride #$ride->id from $ride->pickup_city to $ride->drop_city has arrived")
                    ->line("The driver's name is $driver->name")
                    ->line("The driver's number is $driver->phone")
                    ->line("The driver's email address is $driver->email")
                    ->line("Please confirm these details from the driver before getting into any vehicle")
                    ->line("Enjoy Your Ride");
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

    /**
     * Get the Nexmo / SMS representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return NexmoMessage
     */
    public function toNexmo($notifiable)
    {
        $driver = $this->bid->driver;
        $ride = $this->bid->ride;
        return (new NexmoMessage)
            ->content("Your driver $driver->name has arrived for your ride #$ride->id. The driver's number is $driver->phone and their email is $driver->email. Please Confirm these details from the driver.");
    }
}
