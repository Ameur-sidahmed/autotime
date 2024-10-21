@extends('admin_layout.master')

@section('title')
    rendez-vous
@endsection

@section('content')
<main>
    <h1>Les rendez-vous pour chaque contrôler la technique</h1> <br>
    <div class="col-md-4">
        <div class="input-group mb-3">
            <label class="input-group-text" for="Rechercher">Rechercher :</label>
            <input id="Rechercher" name="Rechercher" type="text" class="form-control" placeholder="Rechercher Par Nom" aria-label="Rechercher Par Nom" onkeyup="searchTable()">
        </div>
    </div>
    <table id="tableRendezVous" class="table">
        <thead class="table-light">
            <tr>
                <th style="text-align: center;">Num</th>
                <th style="text-align: center;">Nom</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">localisation</th>
                <th style="text-align: center;">Telephone</th>
                <th style="text-align: center;">photo</th>
                <th style="text-align: center;">Tout Les Rendez-vous</th>
            </tr>
        </thead>
        <tbody>
            <input type="hidden" {{$increment=1}}>
            @foreach ($controle_teches as $controle_teche)
                <tr>
                    <td>{{$increment}}</td>
                    <td>{{$controle_teche->nom}}</td>
                    <td>{{$controle_teche->email}}</td>
                    <td>{{$controle_teche->telephone}}</td>
                    <td>{{$controle_teche->localisation}}</td>
                    <td><img style="width: 50px; height: 45px; border-radius: 50%;" src="{{asset('storage/controle_tech_image/'.$controle_teche->photo)}}"></td>
                    <td> <a href="{{url('/admin/rendezVous/voirrdvct/'.$controle_teche->id)}}" class="btn btn-primary">Voir</a></td>
                </tr>
                <input type="hidden" {{$increment++}}>
            @endforeach
        </tbody>
    </table>
</main>

<script>
    function searchTable() {
        // Récupérer la valeur saisie dans le champ de recherche
        var input = document.getElementById("Rechercher");
        var filter = input.value.toUpperCase();

        // Récupérer les lignes du tableau
        var table = document.getElementById("tableRendezVous");
        var rows = table.getElementsByTagName("tr");

        // Parcourir les lignes du tableau et cacher celles qui ne correspondent pas à la recherche
        for (var i = 0; i < rows.length; i++) {
            var td = rows[i].getElementsByTagName("td")[1]; // On suppose que le nom est dans la deuxième colonne
            if (td) {
                var textValue = td.textContent || td.innerText;
                if (textValue.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection
