<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RendezVousMail extends Mailable
{
    use Queueable, SerializesModels;

    public $rendezvous;
    public $pdf;

    public function __construct($rendezvous, $pdf)
    {
        $this->rendezvous = $rendezvous;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->subject('Votre rendez-vous chez AutoTime')
                    ->markdown('emails.rendezvous')
                    ->attachData($this->pdf, 'rendezvous.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
