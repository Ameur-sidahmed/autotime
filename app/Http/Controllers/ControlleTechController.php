<?php

namespace App\Http\Controllers;
use App\Models\Planing;
use App\Models\Rendezvous;
use App\Models\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ControlleTechController extends Controller
{
    //
    public function home(){
        if(Session::has('ControleTech')){
            $now = Carbon::now();
            $twentyFourHoursAgo = $now->subHours(24);
            $newRDVs = Rendezvous::where('created_at', '>=', $twentyFourHoursAgo)
                        ->where('id_controle_tech', session('ControleTech')->id)
                        ->get();
            return view('controle_tech.home')->with('newRDVs',$newRDVs);
        }
        else{
            return redirect('/logincontrole');
        }

    }

    public function ajouterendezvous(){
        if(Session::has('ControleTech')){
            return view('controle_tech.ajouterendezvous');
        }
        else{
            return redirect('/logincontrole');
        }
    }

    public function analitique(){
        if(Session::has('ControleTech')){
            return view('controle_tech.analitique');
        }
        else{
            return redirect('/logincontrole');
        }

    }

    public function planing(){
        if(Session::has('ControleTech')){
            $jours = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi'];
            return view('controle_tech.planing')->with('jours',$jours);
        }
        else{
            return redirect('/logincontrole');
        }
    }

    public function unactivatecreneau($creneau ,$idct){
        $Planing = Planing::where('id_controle_tech', $idct)->first();
        if($Planing->$creneau){
            $Planing->$creneau = 0;
            $Planing->update();
            return back();
        }

    }

    public function activatecreneau($creneau ,$idct){
        $Planing = Planing::where('id_controle_tech', $idct)->first();
        if(!$Planing->$creneau){
            $Planing->$creneau = 1;
            $Planing->update();
            return back();
        }

    }

    public function parametre(){
        if(Session::has('ControleTech')){
            return view('controle_tech.parametre');
        }
        else{
            return redirect('/logincontrole');
        }

    }

    public function rendezVous(){
        if(Session::has('ControleTech')){
            $RDVs = Rendezvous::where('id_controle_tech',session('ControleTech')->id)->get();
            return view('controle_tech.rendezVous')->with('RDVs',$RDVs);
        }
        else{
            return redirect('/logincontrole');
        }
    }

    public function utilisateurs(){
        if(Session::has('ControleTech')){
            $controleTechId = Session::get('ControleTech')->id;
            $utilisateurs = DB::table('rendezvouses')
                            ->join('clients', 'clients.id', '=', 'rendezvouses.id_client')
                            ->select('clients.nom', 'clients.email', DB::raw('COUNT(*) as total_rdv'))
                            ->where('rendezvouses.id_controle_tech', $controleTechId)
                            ->groupBy('clients.nom', 'clients.email')
                            ->having('total_rdv', '>', 0)
                            ->orderBy('total_rdv', 'desc')
                            ->get();
            return view('controle_tech.utilisateurs')->with('utilisateurs',$utilisateurs);
        }
        else{
            return redirect('/logincontrole');
        }
    }

    public function confirme($id){
       $Rendezvous = Rendezvous::where('id',$id)->first();
       $Rendezvous->status=0;
       $Rendezvous->update();
       return back();
    }

    public function annulle($id){
       $Rendezvous = Rendezvous::where('id',$id)->first();
       $Rendezvous->status=1;
       $Rendezvous->update();
       return back();
    }

    public function supprimerrdv($id,$creneau){
       $Rendezvous = Rendezvous::where('id',$id)->first();
       $Planing = Planing::where('id_controle_tech', $Rendezvous->id_controle_tech)->first();
       $Rendezvous->delete();
        if ($Planing && !$Planing->$creneau) {
            $Planing->$creneau = 1 ;
            $Planing->save();
        }
        return back()->with("status", "Le Rendez-Vous a été supprimé avec succès");
    }

    public function modifierrendezvous($id){
        $Rendezvous = Rendezvous::where('id',$id)->first();
        return view('controle_tech.modifierrendezvous')->with('Rendezvous',$Rendezvous);
    }

    public function rdvsave(Request $request){
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
        $id_default = 1;
        $Rendezvous = new Rendezvous();
        $Rendezvous->prenom = $request->input('firstname');
        $Rendezvous->nom = $request->input('name');
        $Rendezvous->email = $request->input('Email');
        $Rendezvous->telephone = $request->input('telephone');
        $Rendezvous->modele = $request->input('Modele');
        $Rendezvous->nomv = $request->input('name_voiture');
        $Rendezvous->matricule = $request->input('Matricule');
        $Rendezvous->type = $request->input('Type');
        $Rendezvous->id_controle_tech = Session('ControleTech')->id;
        $Rendezvous->message = 'par default';
        $Rendezvous->id_client=  $id_default;
        $jour=$request->input('Jour');
        $heure=$request->input('Heure');
        $creneaux = $jour.'_'.$heure;
        $Rendezvous->creneau=$creneaux;
        $Planing = Planing::where('id_controle_tech',Session('ControleTech')->id)->first();
        if($Planing && $Planing->$creneaux){
            $Planing->$creneaux = 0;
            $Planing->save();
            $Rendezvous->save();
            return back()->with('status','Le Rendez vous a ete bien Ajouter ');
        }else{
            return back()->with('statusX','le creneau '.$creneaux.':00 est indisponible');
        }
    }

    public function rdvupdate ($id, Request $request){
        $Rendezvous = Rendezvous::find($id);
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

        $Rendezvous->prenom = $request->input('firstname');
        $Rendezvous->nom = $request->input('name');
        $Rendezvous->email = $request->input('Email');
        $Rendezvous->telephone = $request->input('telephone');
        $Rendezvous->modele = $request->input('Modele');
        $Rendezvous->nomv = $request->input('name_voiture');
        $Rendezvous->matricule = $request->input('Matricule');
        $Rendezvous->type = $request->input('Type');
        $creneau = $Rendezvous->creneau;
        $jour=$request->input('Jour');
        $heure=$request->input('Heure');
        $creneaux = $jour.'_'.$heure;
        $Rendezvous->creneau=$creneaux;
        $Planing = Planing::where('id_controle_tech',Session('ControleTech')->id)->first();

        if($Planing && $Planing->$creneaux){
            $Planing->$creneaux = 0;
            $Planing->$creneau = 1;
            $Planing->save();
            $Rendezvous->update();
            return back()->with('status','Le Rendez vous a ete bien Modifier ');
        }else{
            return back()->with('statusX','le creneau '.$creneaux.':00 est indisponible');
        }



    }
}
