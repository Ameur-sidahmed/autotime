@extends('client_layout.master')

@section('title')
    Historique
@endsection

@section('content')
<section id="Home_Page">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" id="logo" href="#">AutoTime</a>
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
            <div class="d-flex">
              <a href="{{url('/accueil/logout')}}" class="button">disconnecter</a>
              <a href="{{url('/accueil/carteCT')}}" class="button">Retour</a>
            </div>
          </div>
        </div>
    </nav>
</section>

<section class="Historique mt-4">
    <div class="container row">
        @if (Session::has('status'))
            <div class="alert alert-success text-center">
                {{ Session::get('status') }}
            </div>
        @endif

        <div class="Rdv-24 col-md-12">
            @php
                $indice = 0;
            @endphp

            @foreach($RendezV as $Rdv)
                @php
                    $id = $Rdv->id_controle_tech;
                    $CT = App\Models\ControleTech::where('id', $id)->first();
                    if($Rdv->status == 1) {
                        $indice++;
                    }
                @endphp
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
                    <h4><span style="color: #512da8">*</span>Votre Rendez-vous est <span class="badge badge-primary">{{ $Rdv->creneau }}:00</span></h4>
                    <h6><span style="font-size: 20px">date : </span> {{$Rdv->created_at}}</h6>
                    <div class="mt-2 mt-md-0">
                        <a href="{{ url('accueil/historique/formulairemod/'.$Rdv->id. '/' .$Rdv->creneau. '/' .$CT->nom) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ url('accueil/historique/editrdv/'.$Rdv->id.'/'.$Rdv->creneau.'/'.$Rdv->id_controle_tech) }}" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
                <hr>
            @endforeach

            @if ($indice == 0)
                <h4 class="text-center"><span class="text-primary">Ooops !!!</span> Vous n'avez pas de <span class="text-primary">rendez-vous</span></h4>
            @endif
        </div>

        <div class="Rdv mt-4 col-md-12">
            <h3>Tout Les Rendez-vous *</h3>
            <ul class="list-unstyled">
                @foreach($Rendezvous as $Rdv)
                    @php
                        $id = $Rdv->id_controle_tech;
                        $CT = App\Models\ControleTech::where('id', $id)->first();
                    @endphp
                    <li class="mb-2">
                        <h6>
                            Vous pris Rendez-vous Le <span class="text-primary">{{ $Rdv->created_at->format('Y-m-d') }}</span> à: <span class="text-primary">{{ $Rdv->creneau }}:00</span> chez : <span class="text-primary">{{ $CT->localisation }}</span>
                        </h6>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="container">
            <div class="row">
                <div class="utilisation mt-5 col-md-6">
                    <h2>Utilisation de l'historique des Rendez-vous</h2>
                    <p>Dans notre application de gestion des rendez-vous chez le contrôle technique, l'historique joue un rôle crucial pour suivre et gérer vos rendez-vous passés et futurs.</p>

                    <h3 style="color: green;">Rendez-vous Acceptés</h3>
                    <p>L'historique affiche tous vos rendez-vous confirmés et planifiés avec succès. Vous pouvez y retrouver les détails tels que la date, l'heure et l'emplacement du contrôle technique.</p>

                    <h3 style="color: rgb(255, 197, 82)">Rendez-vous en Attente</h3>
                    <p>Les rendez-vous en attente sont ceux pour lesquels une demande a été soumise mais qui n'ont pas encore été confirmés par le contrôle technique. Si votre rendez-vous est en attente, vous avez la possibilité de le modifier ou de le supprimer.</p>

                    <p>Cela signifie que vous pouvez ajuster l'heure du rendez-vous ou annuler la demande si nécessaire. Cela vous offre une flexibilité précieuse pour organiser votre emploi du temps en fonction de vos besoins.</p>

                    <p>En utilisant l'historique, vous pouvez suivre l'évolution de vos rendez-vous et prendre les mesures nécessaires pour assurer une expérience de service fluide chez le contrôle technique.</p>
                </div>
                <div class="photo mt-5 text-center col-md-6">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#512DA8" d="M49.1,-50C62.9,-35.2,73,-17.6,75.5,2.5C77.9,22.5,72.7,45,58.9,56.7C45,68.5,22.5,69.4,1.2,68.3C-20.1,67.1,-40.3,63.8,-55.3,52C-70.2,40.3,-80,20.1,-79,1C-78,-18.1,-66.1,-36.2,-51.1,-51C-36.2,-65.7,-18.1,-77.2,-0.2,-77C17.6,-76.7,35.2,-64.8,49.1,-50Z" transform="translate(100 100)" />
                        <image class="img-fluid" xlink:href="https://ghasla.dz/istuchur/2022/05/car-type2.png" width="80" height="80" x="50" y="50" />
                    </svg>
                </div>
            </div>
        </div>


    </div>




</section>
@endsection
