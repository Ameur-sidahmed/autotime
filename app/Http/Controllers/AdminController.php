<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\ControleTech;
use App\Models\Client;
use App\Models\Planing;
use App\Models\Rendezvous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AdminController extends Controller
{
    //
    public function home(){
        if(Session::has('admin')){
            $now = Carbon::now();
            $twentyFourHoursAgo = $now->subHours(24);
            $newCTs = ControleTech::where('created_at', '>=', $twentyFourHoursAgo)->get();
            return view('admin.home')->with('newCTs',$newCTs);
        }
        else{
            return redirect('/loginadmin');
        }
    }

    public function ajouteControleTech(){
        if(Session::has('admin')){
            return view('admin.ajouteControleTech');
        }
        else{
            return redirect('/loginadmin');
        }

    }

    public function analitique(){
        if(Session::has('admin')){
            return view('admin.analitique');
        }
        else{
            return redirect('/loginadmin');
        }
    }

    public function controleTech(){
        if(Session::has('admin')){
            $controle_teches = ControleTech::get();
            return view('admin.controleTech')->with('controle_teches',$controle_teches);
        }
        else{
            return redirect('/loginadmin');
        }
    }

    public function parametre(){
        if(Session::has('admin')){
            return view('admin.parametre');
        }
        else{
            return redirect('/loginadmin');
        }
    }

    public function rendezVous(){
        if(Session::has('admin')){
            $controle_teches = ControleTech::get();
            return view('admin.rendezVous')->with('controle_teches',$controle_teches);
        }
        else{
            return redirect('/loginadmin');
        }
    }

    public function utilisateurs(){
        if(Session::has('admin')){
            $Client = Client::get();
            return view('admin.utilisateurs')->with('Client',$Client);
        }
        else{
            return redirect('/loginadmin');
        }
    }

    public function messagevisit(){
        if(Session::has('admin')){
            $Contacts = Contact::get();
            return view('admin.messagevisit')->with("Contacts",$Contacts);
        }
        else{
            return redirect('/loginadmin');
        }
    }

    public function addcontroletech(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'nom' => 'required',
            'localisation' => 'required',
            'maps' => 'required',
            'Telephone' => 'required',
            'photo' => 'image|nullable|max:1999',
            'password' => 'required|min:4',
        ]);

        $fileNameWithExt = $request->file('photo')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME);
        $ext = $request->file('photo')->getClientOriginalExtension();
        $fileNameToStore = $fileName."_" .time().".".$ext;
        $path = $request->file('photo')->storeAs("public/controle_tech_image",$fileNameToStore );

        $controle_teches = new ControleTech();
        $controle_teches->email = $request->input('email');
        $controle_teches->nom = $request->input('nom');
        $controle_teches->localisation = $request->input('localisation');
        $controle_teches->maps = $request->input('maps');
        $controle_teches->telephone = $request->input('Telephone');
        $controle_teches->password = $request->input('password');
        $controle_teches->photo =  $fileNameToStore;
        $controle_teches->save();

        $planing = new Planing();
        $planing->id_controle_tech = $controle_teches->id;
        $planing->save();
        return back()->with("status" , "Le controle Technique a ete ajouter avec succes");
    }

    public function deletecontroletech($id){
        $controle_teches = ControleTech::find($id);
        Storage::delete("public/controle_tech_image",$controle_teches->photo);
        $planing = Planing::where('id_controle_tech',$id)->first();
        if($planing){
            $planing->delete();
        }
        $controle_teches->delete();
        return back()->with("status" , "Le Controle tchnique $controle_teches->nom a ete supprime avec succes");
    }

    public function modifiercontroletech ($id){
        $controle_teche = ControleTech::find($id);
        return view('admin.modifierControleTech')->with('controle_teche',$controle_teche);
    }

    public function editcontroletech ($id, Request $request){
        $controle_teche = ControleTech::find($id);
        $controle_teche->email = $request->input('email');
        $controle_teche->nom = $request->input('nom');
        $controle_teche->localisation =$request->input('localisation');
        $controle_teche->telephone =$request->input('Telephone');
        $controle_teche->password =$request->input('password');
         if($request->file('photo')){
            $this->validate($request,[
                'photo' => 'image|nullable|max:1999'
            ]);
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME);
            $ext = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $fileName."_" .time().".".$ext;

            Storage::delete("public/controle_tech_image",$controle_teche->photo);
            $path = $request->file('photo')->storeAs("public/controle_tech_image",$fileNameToStore );
            $controle_teche->photo = $fileNameToStore;
         }

        $controle_teche->update();
        return back()->with("status" , "Le controle technique $controle_teche->nom a ete Modifier avec succes");
    }

    public function voirrdv($id){
      $Rendezvous = Rendezvous::where('id_client', $id)->get();
      $Client = Client::find($id);
      return view('admin.voirrdv')->with('Rendezvous',$Rendezvous)->with('Client',$Client);
    }

    public function voirrdvct($id){
        $Rendezvous = Rendezvous::where('id_controle_tech', $id)->get();
        $ControleTech = ControleTech::find($id);
        return view('admin.voirrdvct')->with('Rendezvous',$Rendezvous)->with('ControleTech',$ControleTech);
    }

}
