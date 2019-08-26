<?php

namespace App\Notifications;

use App\Ride;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RideBooked extends Notification implements ShouldQueue
{
    use Queueable;

    private $ride;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ride $ride)
    {
        //
        $this->ride = $ride;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if(get_class($notifiable) == "App\Client"){
            return ['mail', 'nexmo'];
        }else{
            return ['mail'];
        }
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $ride = $this->ride;
        $class = get_class($notifiable);
        if ($class === "App\Client") {
            return (new MailMessage)
                ->greeting("Hello $notifiable->name, Your ride #$ride->id has been booked.")
                ->line("The $ride->ride_type ride from $ride->pickup_address to $ride->drop_address, scheduled for pick up on $ride->pickup_date by $ride->pickup_time has been successfully booked.")
                ->line("You will receive details of your driver upon arrival for pickup.")
                ->line('Thank you for your patronage!');
        }elseif($class === "App\Admin"){
            return (new MailMessage)
                ->greeting("Hello $notifiable->name, a new ride has been booked .")
                ->line("A $ride->ride_type ride #$ride->id from $ride->pickup_address to $ride->drop_address, scheduled for pick up on $ride->pickup_date by $ride->pickup_time has been booked.")
                ->line("You can view the ride by clicking the button below.")
                ->action("View Ride", route("admin.rides.show", $ride->id));
        }elseif($class === "App\Driver"){
            return (new MailMessage)
                ->greeting("Hello $notifiable->name, a new ride has been booked .")
                ->line("A $ride->ride_type ride #$ride->id from $ride->pickup_address to $ride->drop_address, scheduled for pick up on $ride->pickup_date by $ride->pickup_time has been booked.")
                ->line("You can view and apply for the ride by clicking the button below.")
                ->action("View Ride", route("driver.rides.show", $ride->id));
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $class = get_class($notifiable);
        if($class=="App\Admin"){
            return [
                //
                "pickup"=>$this->ride->pickup_city,
                "drop"=>$this->ride->drop_city,
                "route"=>route("admin.rides.show", $this->ride->id)
            ];
        }elseif($class === "App\Driver"){
            return [
                //
                "pickup"=>$this->ride->pickup_city,
                "drop"=>$this->ride->drop_city,
                "route"=>route("driver.rides.show", $this->ride->id)
            ];
        }
    }

    /**
     * Get the Nexmo / SMS representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return NexmoMessage
     */
    public function toNexmo($notifiable)
    {
        $ride = $this->ride;
        return (new NexmoMessage)
            ->content("Your Ride #$ride->id has been booked. You would be contacted once your driver arrives");
    }
}
