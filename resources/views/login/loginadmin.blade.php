<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('frontend/css/styleL.css')}}">
    <!-- google icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima:wght@600;700&family=Comfortaa:wght@300&family=Hind:wght@300&family=Montserrat&family=Noto+Sans:ital,wght@0,100;1,300&family=Open+Sans:ital,wght@0,300;0,400;1,400&family=Outfit:wght@100;200&family=PT+Sans+Caption&family=Poppins:wght@100;300&family=Quicksand:wght@300;500;600&family=Raleway:wght@100&family=Roboto:ital,wght@0,100;1,300;1,400;1,900&family=Rubik+Iso&family=Rubik:ital,wght@0,300;0,400;1,300&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <!--bootstarp-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
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
        @if (Session::has('status1'))
            <div class="alert alert-success">
                {{ Session::get('status1')}}
            </div>
        @endif
        @if (Session::has('status2'))
            <div class="alert alert-danger">
                {{Session::get('status2')}}
            </div>
        @endif
    <div class="ctn" id="ctn">
        <div class="form-ctn sign-up">
            <form action="{{url('/admin/nouveauadmin')}}" method="POST">
                @csrf
                <h1>Créer</h1>
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
                <span>ou utilisez votre email pour vous inscrire</span>
                <input type="text" placeholder="Name" name="nom">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-ctn sign-in">
            <form action="{{url('/admin/adminaccee')}}" method="POST">
                @csrf
                <h1>connecter</h1>
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
                <span>ou utilisez votre mot de passe de messagerie</span>
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <a href="#">Mot de passe oublié?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>


        <!--pour basculer les pages-->
        <div class="tgl-ctn">
          <div class="tgl">
            <div class="tgl-panel tgl-left">
                <h1> Content de te revoir!</h1>
                <p> Entrez vos informations personnelles pour utiliser toutes les fonctionnalités du site </p>
                <button class="hidden" id="login">Sign In</button>
            </div>
            <div class="tgl-panel tgl-right">
                <h1>Bonjour mon ami! </h1>
                <p> Inscrivez-vous avec vos informations personnelles pour utiliser toutes les fonctionnalités du site </p>
                <button class="hidden" id="register">Sign Up</button>
            </div>
         </div>
        </div>
    </div>
    <script src="{{asset('frontend/js/scriptL.js')}}"></script>
</body>
</html>
