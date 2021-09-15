<?php

namespace App\Mail;

use App\Models\Bolo;
use App\Models\Interessado;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvisoInressado extends Mailable
{
    use Queueable, SerializesModels;
    private $interessado;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Interessado $interessado)
    {
        $this->interessado = $interessado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Bolo disponível')
             ->to($this->interessado->email,'');

        return $this->markdown('mail.AvisoInteressado', [
            'interessado' => $this->interessado
        ]);
    }
}
