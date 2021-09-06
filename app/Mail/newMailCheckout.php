<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newMailCheckout extends Mailable
{
    use Queueable, SerializesModels;

    private $checkout;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($checkout)
    {
        //
        $this->checkout = $checkout;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $checkout = $this->checkout;
        $user = $checkout->getBuyer->getUser;
        $checkoutProducts = $checkout->listCheckProducts;

        $this->subject("Novo pedido {$this->checkout->id} foi criado");
        $this->to($user->email,  $user->name);
        return $this->markdown('mail.newCheckout', [
            'user' => $user,
            'checkout' => $checkout,
            'checkoutProducts' => $checkoutProducts
        ]);
    }
}