<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactMail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $contact)
    {
        $this->contact = $contact;    
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
        // return [];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {  
        $this->data['message'] = "Name : $this->contact['name']<br/>
                                    Email : $this->contact['email']<br/>
                                    Phone : $this->contact['phone']<br/>
                                    City : $this->contact['city']<br/>
                                    Service Type : $this->contact['service']<br/>";
        $this->data['short_subject'] = 'Enquiry From TH2.0 Website Contact Us Page';
        return (new MailMessage)
                    ->subject($this->data['short_subject'])
                    ->view('email.general', ['data' => $this->data]);
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
