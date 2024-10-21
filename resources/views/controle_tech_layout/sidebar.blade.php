<div class="sidebar">
    <a  style="text-decoration: none;" href="{{url('/controletech')}}" class="logo">
       <h1>AutoTime</h1>
    </a>
    <ul class="side-menu">
        <li class="{{request()->is('controletech') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/controletech')}}"><i class='bx bxs-dashboard'></i>Tableau de bord</a></li>
        <li class="{{request()->is('controletech/utilisateurs') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/controletech/utilisateurs')}}"><i class='bx bx-group'></i>Utilisateurs</a></li>
        <li class="{{request()->is('controletech/rendezVous') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/controletech/rendezVous')}}"><i class='bx bx-message-square-dots'></i>Rendez-vous</a></li>
        <li class="{{request()->is('controletech/ajouterendezvous') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/controletech/ajouterendezvous')}}"><i class='bx bx-message-square-check'></i>Ajouter RDV</a></li>
        <li class="{{request()->is('controletech/planing') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/controletech/planing')}}"><i class='bx bx-calendar'></i>Planing</a></li>
        <li class="{{request()->is('controletech/analitique') ? 'active' : ''}}"><a  style="text-decoration: none;" href="{{url('/controletech/analitique')}}"><i class='bx bx-analyse'></i>Analytique</a></li>
        <li class="{{request()->is('controletech/parametre') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/controletech/parametre')}}"><i class='bx bx-cog'></i>Parametres</a></li>
    </ul>
    <ul class="side-menu">
        <li>
            <a  style="text-decoration: none;" href="{{url('/controletech/logoutcontrole')}}" class="logout">
                <i class='bx bx-log-out-circle'></i>
                deconnecter
            </a>
        </li>
    </ul>
</div>
