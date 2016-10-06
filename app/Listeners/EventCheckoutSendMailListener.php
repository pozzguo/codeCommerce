<?php

namespace codeCommerce\Listeners;

use codeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Mail;

class EventCheckoutSendMailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        echo "<script>alert('Disparando Evento!!');</script>";
        
        $user = $event->getUser();
        $order = $event->getOrder();
        
        
        Mail::send('emails.checkout', ['user' => $user, 'order' => $order], function ($m) use ($user) {
            $m->from('vendas@codeCommerce.com', 'Seu Pedido!');

            $m->to($user->email, $user->name)->subject('Pedido Recebido!');
            
        });
        
        echo "<script>alert('Evento disparado!!');</script>";
        
    }
}
