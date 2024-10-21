@extends('client_layout.master')

@section('title')
    cartCT
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
              <a href="{{url("/accueil/historique")}}" class="button">Historique</a>
              <a href="{{url("/accueil")}}" class="button">Retour</a>
            </div>
          </div>
        </div>
    </nav>
</section>

<section class="contrl_tech">
    <div class="search-box">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Chercher Un Controle technique Par nom" class="search-input" id="search-input" onkeyup="search()">
    </div>

    <div class="container-fluid my-4">
        <h6 style="color: grey; margin-left: 2%;">Trouvez à Alger un ControleTech proposant la prise de rendez-vous en ligne</h6>
        <br>
        <div class="row">
            <div class="col-md-8">
                <div class="desc mb-4" id="controle-tech-list">
                    @foreach ($ControleTechs as $ControleTech)
                        <div class="row no-gutters mb-5 descdett controle-tech-item">
                            <div class="col-md-6">
                                <div class="ct">
                                    <img src="{{asset('storage/controle_tech_image/'.$ControleTech->photo)}}" class="img-fluid" alt="Photo">
                                    <div class="description">
                                        <h4>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: red;transform: msFilter">
                                                <path d="m12 22 1-2v-3h5a1 1 0 0 0 1-1v-1.586c0-.526-.214-1.042-.586-1.414L17 11.586V8a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2H8c-1.103 0-2 .897-2 2v3a1 1 0 0 0 1 1v3.586L5.586 13A2.01 2.01 0 0 0 5 14.414V16a1 1 0 0 0 1 1h5v3l1 2zM8 4h8v2H8V4zM7 14.414l1.707-1.707A.996.996 0 0 0 9 12V8h6v4c0 .266.105.52.293.707L17 14.414V15H7v-.586z"></path>
                                            </svg>
                                            <a href="{{url($ControleTech->maps)}}" target="_blank">{{$ControleTech->localisation}}</a>
                                        </h4>
                                        <h4 style="color: #512da8;">{{$ControleTech->nom}}</h4>
                                        <h4 style="color: #512da8;">{{$ControleTech->email}}</h4>
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #512da8;transform: msFilter">
                                                <path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path>
                                            </svg>
                                            professional
                                        </p>
                                        <span class="mb-4">*Cliquer sur Les horaires Pour Prendre Un RDV</span>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="emploi">
                                    <table class="">
                                        <thead class="thead-light">
                                            <tr>
                                                @foreach ($jours as $jour)
                                                    <th class="text-center">{{ $jour }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <input type="hidden" value="{{$hours=8}}">
                                            @for ($j = 1; $j <= 5; $j++)
                                                <tr>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <?php
                                                            $Planings = App\Models\Planing::where('id_controle_tech', $ControleTech->id)->first();
                                                            $creneau = $jours[$i - 1].'_'.$hours;
                                                            $creneauDisponible = $Planings ? $Planings->$creneau == 1 : false;
                                                            $url = $creneauDisponible ? url('/accueil/formulaire/' . $jours[$i-1] .'/'. $hours .'/'.$ControleTech->id .'/'.$ControleTech->nom) : '#';
                                                        ?>
                                                        <td class="text-center">
                                                            <a href="{{ $url }}" class="btn {{ $creneauDisponible ? 'btn-light' : 'btn-secondary' }}">
                                                                {{ $hours < 10 ? '0' . $hours : $hours }}:00
                                                            </a>
                                                        </td>
                                                    @endfor
                                                </tr>
                                                <input type="hidden" value="{{$hours++}}">
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4" style="margin-top:0.5%;">
                <div class="card mb-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d190898.6503916093!2d2.9195774878412952!3d36.74958683296218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sles%20controles%20technique%20de%20alger!5e0!3m2!1sfr!2sdz!4v1706903555645!5m2!1sfr!2sdz" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
