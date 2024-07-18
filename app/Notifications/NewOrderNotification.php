<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification; 
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class NewOrderNotification extends Notification
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        //dd(request()->all());
        try{
            return TelegramMessage::create()
            ->to('@campusguardapp_bot') // Replace with logic to get chat ID
            ->content("New Order: #");
        }catch(\Exception $ex){
            \Log::error($ex);
        }
        
    }
}