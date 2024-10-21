<!-- Sidebar -->
<div class="sidebar">
    <a  style="text-decoration: none;" href="{{url('/admin')}}" class="logo">
       <h1>AutoTime</h1>
    </a>
    <ul class="side-menu">
        <li class="{{request()->is('admin') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/admin')}}"><i class='bx bxs-dashboard'></i>Tableau de bord</a></li>
        <li class="{{request()->is('admin/controleTech') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/admin/controleTech')}}"><i class='bx bx-user'></i>Controle Tech</a></li>
        <li class="{{request()->is('admin/ajouteControleTech') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/admin/ajouteControleTech')}}"><i class='bx bx-user-plus'></i>AJT Controle Tech</a></li>
        <li class="{{request()->is('admin/utilisateurs') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/admin/utilisateurs')}}"><i class='bx bx-user-circle'></i>Utilisateur</a></li>
        <li class="{{request()->is('admin/rendezVous') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/admin/rendezVous')}}"><i class='bx bx-message-square-dots'></i>Rendez-vous</a></li>
        <li class="{{request()->is('admin/messagevisit') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/admin/messagevisit')}}"><i class='bx bxs-message-rounded-dots'></i>Messages</a></li>
        <li class="{{request()->is('admin/analitique') ? 'active' : ''}}"><a  style="text-decoration: none;" href="{{url('/admin/analitique')}}"><i class='bx bx-analyse'></i>Analytique</a></li>
        <li class="{{request()->is('admin/parametre') ? 'active' : ''}}"><a style="text-decoration: none;" href="{{url('/admin/parametre')}}"><i class='bx bx-cog'></i>Parametres</a></li>
    </ul>
    <ul class="side-menu">
        <li>
            <a  style="text-decoration: none;" href="{{url('/admin/logoutadmin')}}" class="logout">
                <i class='bx bx-log-out-circle'></i>
                deconnecter
            </a>
        </li>
    </ul>
</div>
<!-- End of Sidebar -->
