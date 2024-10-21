<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rendez-vous</title>
</head>
<body style="background-color: #fff; padding:2%;">
    <h1><span style="color:#512da8">AutoTime</span> &nbsp; Service</h1>
        @php
        $CT = App\Models\ControleTech::where('id',$rendezvous->id_controle_tech)->first();
        @endphp
    <p>Bien Venu au Rendez-vous Chez <span style="color:#512da8;">{{$CT->nom}}</span> a <span style="color:#512da8;">{{$CT->localisation}}<span></p>
    <p style="margin:2.5%; font-size:17.5px"><span style="text-decoration:underline">Nom: </span>{{ $rendezvous->nom }}</p>
    <p style="margin:2.5%; font-size:17.5px"><span style="text-decoration:underline">Prénom: </span>{{ $rendezvous->prenom }}</p>
    <p style="margin:2.5%; font-size:17.5px"><span style="text-decoration:underline">Téléphone: </span>+213 {{ $rendezvous->telephone }}</p>
    <p style="margin:2.5%; font-size:17.5px"><span style="text-decoration:underline">Email: </span>{{ $rendezvous->email }}</p>
    <p style="margin:2.5%; font-size:17.5px"><span style="text-decoration:underline">modele: </span>{{ $rendezvous->modele }}</p>
    <p style="margin:2.5%; font-size:17.5px"><span style="text-decoration:underline">Nom de Voiture: </span>{{ $rendezvous->nomv }}</p>
    <p style="margin:2.5%; font-size:17.5px"><span style="text-decoration:underline">Matricule: </span>{{ $rendezvous->matricule }}</p>
    <p style="margin:2.5%; font-size:17.5px"><span style="text-decoration:underline">Date: </span>{{ $rendezvous->created_at }}</p>
    <p style="margin:2.5%; font-size:17.5px"><span style="text-decoration:underline">creneau: </span>{{ $rendezvous->creneau }}:00</p>
    <br>
        @php
         if($rendezvous->status){
            echo '<span style="background-color: #198754;color: #fff; padding:2%; border-raduis:15px;">Accepter</span>';

         }else{
             echo '<span style="background-color: #dc3545; color: #fff; padding:2%; border-raduis:15px;">Refuser</span>';
         }
        @endphp
</body>
</html>
