@extends('admin_layout.master')

@section('title')
    RDVCL
@endsection

@section('content')
<main>
    <h1>Tout les Rendez-vous de <span style="color:#512da8;"> {{$Client->nom}} </span> </h1> <br>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="Rechercher">Rechercher :</label>
                <input id="Rechercher" name="Rechercher" type="text" class="form-control" placeholder="Rechercher Par Nom" aria-label="Rechercher Par Nom" onkeyup="searchTable()">
            </div>
        </div>
    <table id="tableRDVCL" class="table">
        <thead class="table-light">
            <tr>
                <th style="text-align: center;">Num</th>
                <th style="text-align: center;">Nom</th>
                <th style="text-align: center;">Prenom</th>
                <th style="text-align: center;">Telephone</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">Modele</th>
                <th style="text-align: center;">Nom de Voiture</th>
                <th style="text-align: center;">Matricule</th>
                <th style="text-align: center;">creneau</th>
            </tr>
        </thead>
        <tbody>
            <input type="hidden" {{$increment=1}}>
            @foreach ($Rendezvous as $rendezvous)
                <tr>
                    <td>{{$increment}}</td>
                    <td>{{$rendezvous->nom}}</td>
                    <td>{{$rendezvous->prenom}}</td>
                    <td>{{$rendezvous->telephone}}</td>
                    <td>{{$rendezvous->email}}</td>
                    <td>{{$rendezvous->modele}}</td>
                    <td>{{$rendezvous->nomv}}</td>
                    <td>{{$rendezvous->matricule}}</td>
                    <td>{{$rendezvous->creneau}}:00</td>
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
        var table = document.getElementById("tableRDVCL");
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
