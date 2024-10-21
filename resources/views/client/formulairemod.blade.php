@extends('client_layout.master')

@section('title')
    formulaire mod
@endsection

@section('content')
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" id="logo" href="{{url('/accueil')}}">AutoTime</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul style="margin: 0px auto;" class="navbar-nav me-auto mb-2 mb-lg-0">
          <li style="margin-left: 10px;" class="nav-item">
            <a class="nav-link active" aria-current="page" href=""></a>
          </li>
          <li style="margin-left: 10px;" class="nav-item">
            <a class="nav-link active" href=""></a>
          </li>
          <li style="margin-left: 10px;" class="nav-item">
            <a class="nav-link active" href=""></a>
          </li>
          <li style="margin-left: 10px;" class="nav-item dropdown">

          </li>
        </ul>
        <div class="d-flex btn">
            <a href="{{url('/accueil/historique')}}" class="button">Retour</a>
        </div>
      </div>
    </div>
</nav>

<section class="Formulaire">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error )
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('status'))
            <div style="text-align: center;" class="alert alert-success">
                {{ Session::get('status')}}
            </div>
            @endif
            @if (Session::has('statusX'))
            <div style="text-align: center;" class="alert alert-danger" style="text-align: center;">
                {{ Session::get('statusX')}}
            </div>
            @endif
    <div class="row">
           <h2>Modifier Le <span>Rendez-vous</span> chez <span>{{$nom}}</span> à <div style="color:#512da8 ;">{{$creneau}}:00</div></h2>
        <div class="col-lg-12 col-lg-offset-1">
            <!--url('accueil/modifierrdv/'. $creneau .'/'. $id. '/' . $nom )-->
            <form class="contact-form" method="post" action="{{ url('/accueil/historique/formulairemod/modfrdv/'.$Rendezvous->id.'/'.$creneau) }}" role="form">
                <!--dans l'action je fait rappeller la page lui meme avec cette instruction dephp suivante-->
                  @csrf
                  @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="firstname">prenom <span class="blue">*</span></label>
                        <input type="text" value="{{$Rendezvous->prenom}}" id="firstname" name="firstname" class="form-control" placeholder="saisir ton prenom" >
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="name">nom <span class="blue">*</span></label>
                        <input type="text" value="{{$Rendezvous->nom}}" id="name" name="name" class="form-control" placeholder="saisir ton nom">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="Email">Email <span class="blue">*</span></label>
                        <input type="email" value="{{$Rendezvous->email}}"  id="Email"name="Email" class="form-control" placeholder="saisir ton Email" >
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="telephone">telephone</label>
                        <input type="tel" value="{{$Rendezvous->telephone}}" id="telephone" name="telephone" class="form-control" placeholder="saisir ton telephone" >
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="Modele">Modele de Voiture <span class="blue">*</span></label>
                        <input type="text" value="{{$Rendezvous->modele}}" id="Modele" name="Modele" class="form-control" placeholder="saisir ton Modele de Voiture">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="name_voiture">nom de Voiture <span class="blue">*</span></label>
                        <input type="text" value="{{$Rendezvous->nomv}}" id="name_voiture" name="name_voiture" class="form-control" placeholder="saisir ton nom de Voiture">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="Matricule">Matricule <span class="blue">*</span></label>
                        <input type="text" value="{{$Rendezvous->matricule}}" id="Matricule" name="Matricule" class="form-control" placeholder="saisir ton Matricule">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="Type">Type de Voiture <span class="blue">*</span></label>
                        <input type="text" value="{{$Rendezvous->type}}" id="Type" name="Type" class="form-control" placeholder="saisir ton Type de Voiture">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-12">
                        <label for="message">message <span class="blue">*</span></label>
                        <textarea  id="message" name="message" class="form-control" rows="4"  placeholder="saisir ton message"></textarea>
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="Type">Jour <span class="blue">*</span></label>
                        <select id="Jour" name="Jour" class="form-select" aria-label="Default select example">
                            <option value="Dimanche">Dimanche</option>
                            <option value="Lundi">Lundi</option>
                            <option value="Mardi">Mardi</option>
                            <option value="Mercredi">Mercredi</option>
                            <option value="Jeudi">Jeudi</option>
                        </select>
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="Type">Heure <span class="blue">*</span></label>
                        <select id="Heure" name="Heure" class="form-select" aria-label="Default select example">
                         @for($i=8 ; $i<=12 ; $i++)
                           @if($i<10)
                            <option value="{{$i}}">0{{$i}}:00</option>
                           @else
                            <option value="{{$i}}">{{$i}}:00</option>
                           @endif
                        @endfor
                        </select>
                        <p class="comments"></p>
                    </div>


                    <div class="col-md-12">
                        <p class="blue"><strong>* Ces informations sont requises</strong></p>
                    </div>

                    <div class="col-md-3">
                        <input type="submit" class="Button1" value="Modifier">
                    </div>

                </div>
            </form>
        </div>
    </div>

</section>
@endsection
