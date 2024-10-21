@extends('admin_layout.master')

@section('title')
    utilisateurs
@endsection

@section('content')
<main>
    <h1>Utilisateur</h1> <br>
    <div class="col-md-4">
        <div class="input-group mb-3">
            <label class="input-group-text" for="Rechercher">Rechercher :</label>
            <input id="Rechercher" name="Rechercher" type="text" class="form-control" placeholder="Rechercher Par Nom" aria-label="Rechercher Par Nom" onkeyup="searchTable()">
        </div>
    </div>
    <table id="tableUtilisateurs" class="table">
        <thead class="table-light">
            <tr>
                <th style="text-align: center;">ID</th>
                <th style="text-align: center;">Nom</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">Mot de pass</th>
                <th style="text-align: center;">Tout les Rendez-vous</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Client as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->nom}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->password}}</td>
                <td><a class="btn btn-primary" href="{{url('/admin/utilisateurs/voirrdv/'.$client->id)}}"> Voir </a></td>
            </tr>
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
        var table = document.getElementById("tableUtilisateurs");
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
