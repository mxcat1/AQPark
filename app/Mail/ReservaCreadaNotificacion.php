<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservaCreadaNotificacion extends Mailable
{
    use Queueable, SerializesModels;

    public $DatosCorreo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($DatosCorreo)
    {
        $this->DatosCorreo = $DatosCorreo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.templatemail');
    }
}
