@extends('client_layout.master')

    @section('title')
        accueil
    @endsection

    @section('content')
    <section id="Home_Page">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <a class="navbar-brand" id="logo" href="{{url("/accueil")}}">AutoTime</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul style="margin: 0px auto;" class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li style="margin-left: 10px;" class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#Home_Page">Home Page</a>
                  </li>
                  <li style="margin-left: 10px;" class="nav-item">
                    <a class="nav-link active" href="#Services">Services</a>
                  </li>
                  <li style="margin-left: 10px;" class="nav-item">
                    <a class="nav-link active" href="#Contactez-Nous">Contactez-Nous</a>
                  </li>
                  <li style="margin-left: 10px;" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Entrer
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{url('/accueil')}}">Comme Client</a></li>
                      <li><a class="dropdown-item" href="{{url('/controletech')}}">Comme Controle technique</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{url('/admin')}}">Comme Admin</a></li>
                    </ul>
                  </li>
                </ul>
                <div class="d-flex">
                  <a href="{{url('/accueil/login')}}" class="login">Login</a>
                  <div class="telephone">+213 542457516 <br> &nbsp; &nbsp; Appelez-nous</div>
                </div>
              </div>
            </div>
        </nav>
    <header class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5" id="text">
                <h1>Services Auto <br> en <span>Algérie</span></h1>
                <p>Bienvenue chez <span>AutoTime</span> votre partenaire de confiance pour tous vos besoins automobiles.
                   Nous sommes fiers de vous offrir une gamme complète de services automobiles de qualité supérieure. <br>
                   Chez <span>AutoTime</span> notre mission est de fournir à nos clients une expérience exceptionnelle.
                </p>
                @if (Session::has('client'))
                    <a href="{{url('/accueil/carteCT')}}">
                        COMMANDEZ MAINTENANT
                    </a>
                @else
                    <a href="{{url('/accueil/login')}}">
                        COMMANDEZ MAINTENANT
                    </a>
                @endif
            </div>
            <div class="col-lg-5 mb-5 text-center">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-100 h-auto">
                    <path fill="#512DA8" d="M49.1,-50C62.9,-35.2,73,-17.6,75.5,2.5C77.9,22.5,72.7,45,58.9,56.7C45,68.5,22.5,69.4,1.2,68.3C-20.1,67.1,-40.3,63.8,-55.3,52C-70.2,40.3,-80,20.1,-79,1C-78,-18.1,-66.1,-36.2,-51.1,-51C-36.2,-65.7,-18.1,-77.2,-0.2,-77C17.6,-76.7,35.2,-64.8,49.1,-50Z" transform="translate(100 100)" />
                    <image xlink:href="https://ghasla.dz/istuchur/2023/05/cc_2021MBS530005_01_1280_040.png" width="150" height="100" x="50" y="50" />
                </svg>
            </div>
        </div>
    </header>
    </section>

    <!-- Qui sommes-nous -->
    <section id="Services">
        <br>
    <div class="container-fluid">
        <h2 class="separator text-center" id="hidden">
            <a href="{{url('/accueil')}}" class="logo">AutoTime</a><br>
            Qui sommes-nous
        </h2>
        <div class="def text-center mb-5" id="hidden">
            AutoTime est une application qui vise à organiser et à faciliter le service de voitures en Algérie. Un nouveau concept conçu pour permettre aux propriétaires de voitures de garder leurs voitures en bon état. Nous offrons des services automobiles à la demande. Nos professionnels viennent à vous où que vous soyez.
        </div>
        <div class="sell-auto row" id="hidden">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="header mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="m20.145 8.27 1.563-1.563-1.414-1.414L18.586 7c-1.05-.63-2.274-1-3.586-1-3.859 0-7 3.14-7 7s3.141 7 7 7 7-3.14 7-7a6.966 6.966 0 0 0-1.855-4.73zM15 18c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path><path d="M14 10h2v4h-2zm-1-7h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2z"></path></svg>
                            <h5>Rendez-Vous express</h5>
                        </div>
                        <p>
                            Planifiez, organisez et suivez facilement tous vos rendez-vous d'entretien et de réparation de véhicules.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="header mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M5.122 21c.378.378.88.586 1.414.586S7.572 21.378 7.95 21l4.336-4.336a7.495 7.495 0 0 0 2.217.333 7.446 7.446 0 0 0 5.302-2.195 7.484 7.484 0 0 0 1.632-8.158l-.57-1.388-4.244 4.243-2.121-2.122 4.243-4.243-1.389-.571A7.478 7.478 0 0 0 14.499 2c-2.003 0-3.886.78-5.301 2.196a7.479 7.479 0 0 0-1.862 7.518L3 16.05a2.001 2.001 0 0 0 0 2.828L5.122 21zm4.548-8.791-.254-.616a5.486 5.486 0 0 1 1.196-5.983 5.46 5.46 0 0 1 4.413-1.585l-3.353 3.353 4.949 4.95 3.355-3.355a5.49 5.49 0 0 1-1.587 4.416c-1.55 1.55-3.964 2.027-5.984 1.196l-.615-.255-5.254 5.256h.001l-.001 1v-1l-2.122-2.122 5.256-5.255z"></path></svg>
                            <h5>Résultat garanti</h5>
                        </div>
                        <p>
                            Les garages automobiles peuvent maximiser leur efficacité opérationnelle en rationalisant le processus de prise de rendez-vous.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="header mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M20.29 8.29 16 12.58l-1.3-1.29-1.41 1.42 2.7 2.7 5.72-5.7zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z"></path></svg>
                            <h5>Expérience</h5>
                        </div>
                        <p>
                            Notre application vous offre une expérience de réservation fluide et sans tracas, vous permettant de fixer des rendez-vous en quelques clics depuis n'importe quel appareil.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!---->

    <div class="container">
        <h2 class="separator text-center my-4">
            <span style="font-size: 33px;color: #512da8;font-weight: 600;" >AutoTime</span> est le <span>futur</span> du Services automobile
        </h2>

        <div class="auto-ser text-center mb-4">
            <div class="category row">
                <a href="" class="col-lg-2 col-md-10 mb-3">Controle technique</a>
                <a href="" class="col-lg-2 col-md-10 mb-3">Entretien périodique</a>
                <a href="" class="col-lg-2 col-md-10 mb-3">Services électriques</a>
                <a href="" class="col-lg-2 col-md-10 mb-3">Diagnostic</a>
                <a href="" class="col-lg-2 col-md-10 mb-3">Expert</a>
                <a href="" class="col-lg-2 col-md-10 mb-3">Dépannage</a>
            </div>
        </div>
        <div class="row cart-service">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="cart">
                    <div class="photo" style="margin: 0px auto ;">
                        <img src="https://i.pinimg.com/474x/a2/c8/ef/a2c8ef5b89a91d163a167abbd778339c.jpg" alt="Controle technique">
                    </div>
                    <div class="description">
                        <h3>Controle technique</h3>
                        <p>Obligatoire effectuée périodiquement sur les véhicules automobiles pour évaluer leur état</p>
                        <div class="dispo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill:#512da8;">
                                <path d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.294-4.708-4.3 4.292-1.292-1.292-1.414 1.414 2.706 2.704 5.712-5.702z"></path>
                            </svg>
                            <p>Disponible</p>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="cart">
                    <div class="photo"  style="margin: 0px auto ;">
                        <img src="https://i.pinimg.com/474x/6a/98/ad/6a98ad17dba935ae2b3259f5e188e3ca.jpg" alt="Entretien périodique">
                    </div>
                    <div class="description">
                        <h3>Entretien périodique</h3>
                        <p>Révision générale, changement d'huile, remplacement du filtre à air</p>
                        <div class="dispo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill:#512da8;">
                                <path d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.293-4.707L18 10.586l-2.293-2.293-1.414 1.414 2.292 2.292-2.293 2.293 1.414 1.414 2.293-2.293 2.294 2.294 1.414-1.414L19.414 12l2.293-2.293z"></path>
                            </svg>
                            <p>Bientôt</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="cart">
                    <div class="photo"  style="margin: 0px auto ;">
                        <img src="https://i.pinimg.com/474x/07/ae/02/07ae02c06d86db27bff814ce9399e613.jpg" alt="Entretien périodique">
                    </div>
                    <div class="description">
                        <h3>Services électriques</h3>
                        <p>Diagnostic et réparation des systèmes électriques dans la voiture</p>
                        <div class="dispo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill:#512da8 ;transform: msFilter"><path d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.293-4.707L18 10.586l-2.293-2.293-1.414 1.414 2.292 2.292-2.293 2.293 1.414 1.414 2.293-2.293 2.294 2.294 1.414-1.414L19.414 12l2.293-2.293z"></path></svg>
                                <path d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.293-4.707L18 10.586l-2.293-2.293-1.414 1.414 2.292 2.292-2.293 2.293 1.414 1.414 2.293-2.293 2.294 2.294 1.414-1.414L19.414 12l2.293-2.293z"></path>
                            </svg>
                            <p>Bientôt</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="cart">
                    <div class="photo"  style="margin: 0px auto ;">
                        <img src="https://i.pinimg.com/474x/ea/db/8c/eadb8c7d820389ff68bd140e7e017f57.jpg" alt="Entretien périodique">
                    </div>
                    <div class="description">
                        <h3>systèmes informatiques</h3>
                        <p>Diagnostic et réparation des systèmes électriques dans la voiture</p>
                        <div class="dispo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill:#512da8 ;transform: msFilter"><path d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.293-4.707L18 10.586l-2.293-2.293-1.414 1.414 2.292 2.292-2.293 2.293 1.414 1.414 2.293-2.293 2.294 2.294 1.414-1.414L19.414 12l2.293-2.293z"></path></svg>
                            <p>Bientôt</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="cart">
                    <div class="photo" style="margin: 0px auto ;">
                        <img src="https://i.pinimg.com/474x/07/16/90/071690cb11b127545d4a6ca037a0bab8.jpg">
                    </div>
                    <div class="description">
                        <h3>expert</h3>
                        <p>professionnel spécialisé dans l'évaluation des dommages subis par un véhicule</p>
                        <div class="dispo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill:#512da8 ;transform: msFilter"><path d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.293-4.707L18 10.586l-2.293-2.293-1.414 1.414 2.292 2.292-2.293 2.293 1.414 1.414 2.293-2.293 2.294 2.294 1.414-1.414L19.414 12l2.293-2.293z"></path></svg>
                            <p>Bientôt</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="cart">
                    <div class="photo"  style="margin: 0px auto;">
                        <img src="https://i.pinimg.com/474x/bb/98/f7/bb98f7507850652fed0eb4c55045af47.jpg">
                    </div>
                    <div class="description">
                        <h3>Dépanage</h3>
                        <p>est un service qui fournit une assistance aux conducteurs en cas de panne de leur véhicule</p>
                        <div class="dispo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill:#512da8 ;transform: msFilter"><path d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.293-4.707L18 10.586l-2.293-2.293-1.414 1.414 2.292 2.292-2.293 2.293 1.414 1.414 2.293-2.293 2.294 2.294 1.414-1.414L19.414 12l2.293-2.293z"></path></svg>
                            <p>Bientôt</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


    <section id="Contactez-Nous">
        <br>
        <div class="container">
            <h2 class="separator text-center">
                <a href="{{url('/accueil')}}" class="logo">AutoTime</a> <br>
                Contactez-Nous
            </h2>

            <div class="row contact-info">
                <div class="col-lg-6 col-md-12 mb-5 formulaire">
                    <form class="contact-form" method="post" action="{{url('/accueil/savecontact')}}" role="form">
                        @csrf
                        <h1 style="text-align: center;">Contactez-Nous</h1>
                        <span style="color: red;">passe votre nom et votre email </span> <br>
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
                        @if(Session::has("status"))
                         <br>
                             <div class="col-md-12 alert alert-success" style="text-align: center;">
                                {{Session::get('status')}}
                             </div>
                         @endif
                        <div class="form-group">
                            <label for="name">Nom<span class="blue">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Saisir ton nom">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email <span class="blue">*</span></label>
                            <input type="email" id="Email" name="Email" class="form-control" placeholder="Saisir ton Email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message <span class="blue">*</span></label>
                            <textarea id="message" name="message" class="form-control" rows="4" placeholder="Saisir ton message"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="button">Envoyer</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 col-md-12 mb-5">
                    <div class="siege mb-4">
                        <h3>SIÈGE SOCIAL</h3>
                        <ul>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #411d95;transform: msFilter"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>&nbsp;AutoTime</li>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #411d95;transform: msFilter"><path d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z"></path></svg>&nbsp;Boumerdes, Algeria</li>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #411d95; transform: msFilter"><path d="m20.487 17.14-4.065-3.696a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a.997.997 0 0 0-.085-1.39z"></path></svg>&nbsp;(+213) 542457516</li>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #411d95;transform: msFilter"><path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4.7-8 5.334L4 8.7V6.297l8 5.333 8-5.333V8.7z"></path></svg>&nbsp;support@autotime.dz</li>
                        </ul>
                    </div>
                    <div class="hms">
                        <h3>HEURES D'OUVERTURE</h3>
                        <h5>Tous les jours à partir de</h5>
                        <p>9:00 to 21:00</p>
                        <div class="social-icons">
                            <a href="#" class="icon">
                                <i class="fa-brands fa-google-plus-g"></i>
                            </a>
                            <a href="#" class="icon">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="#" class="icon">
                                <i class="fa-brands fa-github"></i>
                            </a>
                            <a href="#" class="icon">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

