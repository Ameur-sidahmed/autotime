@extends('client_layout.master')

@section('title')
    formulaire
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
            <a href="{{url('/accueil/carteCT')}}" class="button">Retour</a>
        </div>
      </div>
    </div>
</nav>

<section class="Formulaire">
    <div class="row">
           <h2>Passer <span>Rendez-vous</span> chez <span>{{$nom}}</span></h2>
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
                    <div class="col-md-12 alert alert-success" style="text-align: center;">
                        {{Session::get('status')}}
                     </div>
                    @endif
        <div class="col-lg-12 col-lg-offset-1">
            <form class="contact-form" method="post" action="{{url('accueil/ajouterdv/'. $creneau .'/'. $id. '/' . $nom )}}" role="form"> <!--dans l'action je fait rappeller la page lui meme avec cette instruction dephp suivante-->
                  @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="firstname">prenom <span class="blue">*</span></label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="saisir ton prenom" >
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="name">nom <span class="blue">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="saisir ton nom">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="Email">Email <span class="blue">*</span></label>
                        <input type="email"  id="Email"name="Email" class="form-control" placeholder="saisir ton Email" >
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="telephone">telephone</label>
                        <input type="tel" id="telephone" name="telephone" class="form-control" placeholder="saisir ton telephone" >
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="Modele">Modele de Voiture <span class="blue">*</span></label>
                        <input type="text" id="Modele" name="Modele" class="form-control" placeholder="saisir ton Modele de Voiture">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="name_voiture">nom de Voiture <span class="blue">*</span></label>
                        <input type="text" id="name_voiture" name="name_voiture" class="form-control" placeholder="saisir ton nom de Voiture">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="Matricule">Matricule <span class="blue">*</span></label>
                        <input type="text" id="Matricule" name="Matricule" class="form-control" placeholder="saisir ton Matricule">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="Type">Type de Voiture <span class="blue">*</span></label>
                        <input type="text" id="Type" name="Type" class="form-control" placeholder="saisir ton Type de Voiture">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-12">
                        <label for="message">message <span class="blue">*</span></label>
                        <textarea  id="message" name="message" class="form-control" rows="4"  placeholder="saisir ton message"></textarea>
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-12">
                        <p class="blue"><strong>* Ces informations sont requises</strong></p>
                    </div>

                    <div class="col-md-3">
                        <input type="submit" class="Button1" value="Envoyer">
                    </div>

                </div>
            </form>
        </div>
    </div>

</section>
@endsection
