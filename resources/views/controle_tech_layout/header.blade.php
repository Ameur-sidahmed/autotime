<nav>
    <i class='bx bx-menu'></i>
    <form action="#">
        <div class="form-input">
            <input type="search" placeholder="Search...">
            <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
        </div>
    </form>
    <input type="checkbox" id="theme-toggle" hidden>
    <a href="#" class="notif">
        <i class='bx bx-bell'></i>
        <span class="count">12</span>
    </a>
    <a href="#" class="profile">
        <img src="{{ asset('storage/controle_tech_image/' . session('ControleTech')->photo) }}">
    </a>    
</nav>
