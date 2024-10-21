@extends('controle_tech_layout.master')

@section('title')
    utilisateurs
@endsection

@section('content')
<main>
    <h1>Utilisateur <span style="color:#512da8"> fidèles</span></h1> <br>
    <div class="col-md-4">
        <div class="input-group mb-3">
            <label class="input-group-text" for="Rechercher">Rechercher :</label>
            <input id="Rechercher" name="Rechercher" type="text" class="form-control" placeholder="Rechercher Par Nom" aria-label="Rechercher Par Nom" onkeyup="searchTable()">
        </div>
    </div>
    <table id="utilisateursTable" class="table">
        <thead class="table-light">
            <tr>
                <th>Pic</th>
                <th>Num</th>
                <th>Nom</th>
                <th>E-mail</th>
                <th>Status</th>
            </tr>
        </thead>
        <input type="hidden" {{$increment=1}}>
        <tbody>
            @foreach($utilisateurs as $utilisateur)
            <tr>
                <td><img style="margin-left:-40px; border-radius: 50px; width: 50px; height:45px;" src="https://i.pinimg.com/474x/e8/d7/d0/e8d7d05f392d9c2cf0285ce928fb9f4a.jpg" alt=""></td>
                <td style="text-align: left;">{{$increment}}</td>
                <td style="text-align: left;">{{$utilisateur->nom}}</td>
                <td style="text-align: left;">{{$utilisateur->email}}</td>
                <td style="text-align: center;"><div class="col-lg-4 p-3 mb-2 bg-success-subtle text-success-emphasis">fidèles</div></td>
            </tr>
            <input type="hidden" {{$increment++}}>
            @endforeach
        </tbody>
    </table>
</main>

<script>
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("Rechercher");
        filter = input.value.toUpperCase();
        table = document.getElementById("utilisateursTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection
