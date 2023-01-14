<?php

namespace App\Notifications;

use App\Models\CwsPackage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CwsPackagePurchaseNotification extends Notification
{
    use Queueable;

    public $coWorkSpacePackage;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(CwsPackage $coWorkSpacePackage)
    {
        $this->coWorkSpacePackage = $coWorkSpacePackage;
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
        return (new MailMessage)
                    ->subject('Co-Working Space Package Purchased Successfully.')
                    ->line("Your transaction for ".$this->coWorkSpacePackage->cws->name." subscription of ".$this->coWorkSpacePackage->amount." for the period of ".$this->coWorkSpacePackage->package->validity." is successfully completed.")
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
