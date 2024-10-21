<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Rendezvous;
use App\Models\ControleTech;
use App\Models\Planing;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function accueil(){
        return view('client.accueil');
    }

    public function carteCT(){
        $ControleTechs = ControleTech::get();
        $jours = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi'];
        return view('client.carteCT')->with('ControleTechs',$ControleTechs)->with('jours',$jours);
    }

    public function formulaire($jours, $hours, $id, $nom){
        $creneau = $jours . '_' . $hours;
        return view('client.formulaire')->with('nom', $nom)
                                        ->with('creneau',$creneau)
                                        ->with('id',$id);
    }

    public function ajouterdv(Request $request , $creneau , $id ,$nom){
        $clientID = session('client')->id;
        $this->validate($request,[
            'firstname' => 'required',
            'name' => 'required',
            'Email' => 'email|required',
            'telephone' => 'required',
            'Modele' => 'required',
            'name_voiture' => 'required',
            'Matricule' => 'required',
            'Type' => 'required',
        ]);
        $Rendezvous = new Rendezvous();
        $Rendezvous->prenom = $request->input('firstname');
        $Rendezvous->nom = $request->input('name');
        $Rendezvous->email = $request->input('Email');
        $Rendezvous->telephone = $request->input('telephone');
        $Rendezvous->modele = $request->input('Modele');
        $Rendezvous->nomv = $request->input('name_voiture');
        $Rendezvous->matricule = $request->input('Matricule');
        $Rendezvous->type = $request->input('Type');
        $Rendezvous->message = $request->input('message');
        $Rendezvous->id_controle_tech = $id;
        $Rendezvous->id_client = $clientID;
        $Rendezvous->creneau = $creneau;
        $Rendezvous->save();
        $Planings = Planing::where('id_controle_tech', $id)->first();
        if ($Planings && $Planings->$creneau) {
            $Planings->$creneau = 0 ;
            $Planings->save();
        }
        return back()->with('status','Votre Rendez-Vous a été bien passer a '.$creneau.':00');
    }

    public function editrdv($id, $creneau, $idct) {
        $Rendezvous = Rendezvous::find($id);
        $Rendezvous->delete();
        $Planing = Planing::where('id_controle_tech', $idct)->first();
        if ($Planing && !$Planing->$creneau) {
            $Planing->$creneau = 1 ;
            $Planing->save();
        }
        return back()->with("status", "Votre Rendez-Vous a été supprimé avec succès");
    }

    public function savecontact(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'Email' => 'email|required',
            'message' => 'required',
        ]);
        $Contact = new Contact();
        $Contact->nom = $request->input('name');
        $Contact->email = $request->input('Email');
        $Contact->message = $request->input('message');
        $Contact->save();
        return back()->with("status","Vos informations ont été envoyées");
    }



    public function historique(){
            $clientID = session('client')->id;
            $Rendezvous = Rendezvous::where('id_client', $clientID)
                                    ->where('status', 0)
                                    ->get();
            $RendezV = Rendezvous::where('id_client', $clientID)
                                    ->where('status', 1)
                                    ->get();
            return view('client.historique')->with('Rendezvous', $Rendezvous)->with('RendezV',$RendezV);
    }


    public function formulairemod($id , $creneau , $nom){
        $Rendezvous = Rendezvous::find($id);
        return view('client.formulairemod')->with('Rendezvous',$Rendezvous)->with('nom',$nom)->with('creneau',$creneau);
    }

    public function modfrdv(Request $request , $id , $creneau){
        $this->validate($request,[
            'firstname' => 'required',
            'name' => 'required',
            'Email' => 'email|required',
            'telephone' => 'required',
            'Modele' => 'required',
            'name_voiture' => 'required',
            'Matricule' => 'required',
            'Type' => 'required',
        ]);
        $Rendezvous = Rendezvous::find($id);
        $Rendezvous->prenom = $request->input('firstname');
        $Rendezvous->nom = $request->input('name');
        $Rendezvous->email = $request->input('Email');
        $Rendezvous->telephone = $request->input('telephone');
        $Rendezvous->modele = $request->input('Modele');
        $Rendezvous->nomv = $request->input('name_voiture');
        $Rendezvous->matricule = $request->input('Matricule');
        $Rendezvous->type = $request->input('Type');
        $Rendezvous->message = $request->input('message');
        $jour=$request->input('Jour');
        $heure=$request->input('Heure');
        $creneaux = $jour.'_'.$heure;
        $Rendezvous->creneau=$creneaux;

        $idCT = $Rendezvous->id_controle_tech;
        $Planing = Planing::where('id_controle_tech',$idCT )->first();

        if($Planing && ($Planing->$creneaux == 0)){
            return back()->with('statusX','le creneau '.$creneaux.':00 est indisponible');
         }
         else{
             $Planing->$creneaux = 0;
             $Planing->$creneau = 1;
             $Planing->save();
             $Rendezvous->update();
             return back()->with('status','Votre Rendez vous a été modifié avec success ');
         }

    }


}
