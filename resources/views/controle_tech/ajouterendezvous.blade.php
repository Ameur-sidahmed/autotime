@extends('controle_tech_layout.master')

@section('title')
    ajouter-Rdv
@endsection
@section('content')
<main class="ajt_rdv" >
    <h1>Ajouter Un Rendez-vous</h1> <br>
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
        <div style="text-align: center;" class="alert alert-warning">
            {{ Session::get('statusX')}}
        </div>
        @endif
    <form class="row" method="post" action="{{ url('/controletech/ajouterendezvous/rdvsave') }}" role="form">
          @csrf
          @method('post')
        <div class="mb-3 col-md-6">
          <label for="email" class="form-label">Email address <span class="red">*</span> </label>
          <input type="email" class="form-control" id="email" name="Email">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="Nom" class="form-label">Nom <span class="red">*</span> </label>
            <input type="text" class="form-control" id="Nom" name="name">
            <div id="nameHelp" class="form-text">We'll never share your name with anyone else.</div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="Prenom" class="form-label">Prenom <span class="red">*</span> </label>
            <input type="text" class="form-control" id="Prenom" name="firstname">
        </div>
        <div class="mb-3 col-md-6">
            <label for="Telephone" class="form-label">Telephone <span class="red">*</span> </label>
            <input type="number" class="form-control" id="Telephone" name="telephone">
        </div>
        <div class="mb-3 col-md-6">
            <label for="Modele" class="form-label">Modele de voiture <span class="red">*</span> </label>
            <input type="text" class="form-control" id="Modele" name="Modele">
        </div>
        <div class="mb-3 col-md-6">
            <label for="Nom" class="form-label">Nom de voiture <span class="red">*</span> </label>
            <input type="text" class="form-control" id="Nom" name="name_voiture">
        </div>
        <div class="mb-3 col-md-6">
            <label for="Matricule" class="form-label">Matricule de voiture <span class="red">*</span> </label>
            <input type="number" class="form-control" id="Matricule" name="Matricule">
        </div>
        <div class="mb-3 col-md-6">
            <label for="Type" class="form-label">Type de voiture <span class="red">*</span> </label>
            <input type="text" class="form-control" id="Type" name="Type">
        </div>
        <div class="mb-3 col-md-6">
            <label for="Jour" class="form-label">Jour <span class="red">*</span> </label>
            <select class="form-select" aria-label="Default select example" name="Jour">
                <option value="Dimanche">Dimanche</option>
                <option value="Lundi">Lundi</option>
                <option value="Mardi">Mardi</option>
                <option value="Mercredi">Mercredi</option>
                <option value="Jeudi">Jeudi</option>
            </select>
        </div>
        <div class="mb-3 col-md-6">
            <label for="Heure" class="form-label">Heure <span class="red">*</span> </label>
            <select class="form-select" aria-label="Default select example" name="Heure">
                @for($i=8 ; $i<=12 ; $i++)
                @if($i<10)
                 <option value="{{$i}}">0{{$i}}:00</option>
                @else
                 <option value="{{$i}}">{{$i}}:00</option>
                @endif
                @endfor
            </select>
        </div>
        <br><br><br>
        <div class="mb-3 col-md-6">
             <button type="submit" class=" btn btn-primary">Envoyer</button>
        </div>
      </form>
</main>

@endsection
