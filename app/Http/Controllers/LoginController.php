<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Admin;
use App\Models\ControleTech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\hash;

class LoginController extends Controller
{
    //
    public function login(){
        return view('login.login');
    }

    public function logout(){
        Session::forget('client');
        return redirect('/accueil');
    }

    public function loginadmin(){
        if(Session::has('admin')) {
            return redirect("/admin");
        }
        else{
            return view('login.loginadmin');
        }
    }

    public function logoutadmin(){
        Session::forget('admin');
        return redirect('/loginadmin');
    }

    public function logincontrole(){
        return view('login.logincontrole');
    }


    public function nouveauclient (Request $request){
    $this->validate($request,[
        'nom' => 'required',
        'email' => 'email|required|unique:clients', // unique de model clients
        'password' => 'required|min:4'
    ]);

    $client = new Client();
          $client->nom = $request->input('nom');
          $client->email = $request->input('email');
          $client->password = bcrypt($request->input('password'));
          $client->save();
        return back()->with('status1','Votre compte client à été créé avec succès');
    }

    public function clientaccee(Request $request){
        $this->validate($request ,[
          'email' => 'email|required'
        ]);

        $client = Client::where('email',$request->email)->first(); //un et un seul
          if($client){
              if(Hash::check($request->input('password'), $client->password)){ // dechifrer le mot de pass
                  Session::put('client',$client);
                  return redirect('/accueil');
              }
              return back()->with('status2','Mauvais mot de passe');
          }
        return back()->with('status2',"Vous n'avez pas de compte avec cette email");
    }



    public function nouveauadmin (Request $request){
        $this->validate($request,[
            'nom' => 'required',
            'email' => 'email|required|unique:clients', // unique de model clients
            'password' => 'required|min:4'
        ]);

        $admin = new Admin();
              $admin->nom = $request->input('nom');
              $admin->email = $request->input('email');
              $admin->password = bcrypt($request->input('password'));
              $admin->save();
            return back()->with('status1','Votre compte admin à été créé avec succès');
    }


    public function adminaccee(Request $request){
        $this->validate($request ,[
          'email' => 'email|required'
        ]);

        $admin = Admin::where('email',$request->email)->first(); //un et un seul
          if($admin){
              if(Hash::check($request->input('password'), $admin->password)){ // dechifrer le mot de pass
                  Session::put('admin',$admin);
                  return redirect('/admin');
              }
              return back()->with('status2','Mauvais mot de passe');
          }
        return back()->with('status2',"Vous n'avez pas de compte avec cette email");
    }


    public function controletechaccee(Request $request){
        $this->validate($request ,[
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $ControleTech = ControleTech::where('email', $request->email)->first();

        if($ControleTech){
            if ($request->input('password') == $ControleTech->password) {
                Session::put('ControleTech', $ControleTech);
                return redirect('/controletech');
            } else {
                return back()->with('status2', 'Mauvais mot de passe');
            }
        } else {
            return back()->with('status2', "Vous n'avez pas de compte avec cette email");
        }
    }

    public function logoutcontrole(){
        Session::forget('ControleTech');
        return redirect('/logincontrole');
    }

}
