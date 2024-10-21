@extends('controle_tech_layout.master')

@section('title')
    rendez-vous
@endsection

@section('content')
<main>
    <h1>Rendez-vous</h1> <br>
    <div class="col-md-4">
        <div class="input-group mb-3">
            <label class="input-group-text" for="Rechercher">Rechercher :</label>
            <input id="Rechercher" name="Rechercher" type="text" class="form-control" placeholder="Rechercher Par Nom" aria-label="Rechercher Par Nom" onkeyup="searchTable()">
        </div>
    </div>
    @if (Session::has("status"))
        <br>
    <div style="text-align: center;" class="alert alert-success">
        {{ Session::get("status") }}
    </div>
    @endif
    <table id="tableRendezVous" class="table">
        <thead class="table-light">
            <tr>
                <th style="text-align: center;">Pic</th>
                <th style="text-align: center;">Date</th>
                <th style="text-align: center;">Créneau</th>
                <th style="text-align: center;">Nom du client</th>
                <th style="text-align: center;">E-mail du client</th>
                <th style="text-align: center;">Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($RDVs as $RDV)
                <tr>
                    <td><img style="border-radius: 50px; width: 50px; height:45px;" src="https://i.pinimg.com/474x/e8/d7/d0/e8d7d05f392d9c2cf0285ce928fb9f4a.jpg" alt=""></td>
                    <td>{{ $RDV->created_at }}</td>
                    <td>{{ $RDV->creneau }}:00</td>
                    <td>{{ $RDV->nom }}</td>
                    <td>{{ $RDV->email }}</td>
                    @php
                         if($RDV->status){
                            $url = url('/controletech/rendezVous/confirme/'.$RDV->id);
                         }
                         else{
                             $url = url('/controletech/rendezVous/annulle/'.$RDV->id);
                         }
                    @endphp
                    <td>
                        <a href="{{ $url }}" type="button" class="btn {{ $RDV->status ? 'btn-success' : 'btn-warning' }}">{{ $RDV->status ? 'Confirmé' : 'Annulée' }}</a>
                        &nbsp; &nbsp;
                        <a href="{{ url('/controletech/rendezVous/supprimerrdv/'.$RDV->id.'/'.$RDV->creneau) }}" type="button" class="btn btn-danger">Supp</a>
                        &nbsp; &nbsp;
                        <a href="{{ url('/controletech/rendezVous/modifierrendezvous/'.$RDV->id) }}" type="button" class="btn btn-primary">Modifier</a>
                        &nbsp; &nbsp;
                        <a href="{{ route('pdf.rendezvous', ['id' => $RDV->id]) }}" target="_blank" type="button" class="btn btn-secondary">PDF</a>
                        &nbsp; &nbsp;
                        <a href="{{ url('/controletech/rendezVous/email/'.$RDV->id) }}" type="button" class="btn btn-dark">Email</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>

<script>
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("Rechercher");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableRendezVous");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3]; // Index 3 corresponds to the client name column
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
