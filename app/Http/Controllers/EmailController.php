<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVous;
use App\Mail\RendezVousMail;
use Mail;
use PDF;

class EmailController extends Controller
{
    public function sendRendezVousEmail($id)
    {
        $rendezvous = RendezVous::findOrFail($id);

        // Générer le PDF
        $pdf = PDF::loadView('pdf.rendezvous', compact('rendezvous'));

        // Envoyer l'email
        Mail::to($rendezvous->email)->send(new RendezVousMail($rendezvous, $pdf->output()));

        return redirect()->back()->with('status', 'Email envoyé avec succès!');
    }
}
