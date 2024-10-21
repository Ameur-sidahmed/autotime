@extends('controle_tech_layout.master')

@section('title')
    home
@endsection

@section('content')
<main>
    <div class="header">
        <div class="left">
            <h1>Dashboard <span style="color:#512da8">{{session('ControleTech')->nom}}</span> </h1>
            <ul class="breadcrumb">
                <li><a href="#">
                        Analytics
                    </a></li>
                /
                <li><a href="#" class="active">RDV</a></li>
            </ul>
        </div>
        <a href="#" class="report">
            <i class='bx bx-cloud-download'></i>
            <span>Download CSV</span>
        </a>
    </div>

    <!-- Insights -->
    <ul class="insights">
        <li>
            <i class='bx bx-calendar-check'></i>
            <span class="info">
                <h3>
                    1,074
                </h3>
                <p>Rendez-vous</p>
            </span>
        </li>
        <li><i class='bx bx-show-alt'></i>
            <span class="info">
                <h3>
                    3,944
                </h3>
                <p> Visite</p>
            </span>
        </li>
        <li><i class='bx bx-line-chart'></i>
            <span class="info">
                <h3>
                    14,721
                </h3>
                <p>Recherche</p>
            </span>
        </li>
        <li><i class='bx bx-dollar-circle'></i>
            <span class="info">
                <h3>
                    $6,742
                </h3>
                <p>Totale</p>
            </span>
        </li>
    </ul>
    <!-- End of Insights -->

    <div class="bottom-data">
        <div class="orders">
            <div class="header">
                <i class='bx bx-receipt'></i>
                <h3>Rendez-vous <span style="color:#512da8">/24</span></h3>
                <i class='bx bx-filter'></i>
                <i class='bx bx-search'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th style="text-align:center;">Pic</th>
                        <th style="text-align:center;">utilisateur</th>
                        <th style="text-align:center;">Order Date</th>
                        <th style="text-align:center;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($newRDVs as $newRDV)
                    <tr>
                        <td><img style=" border-radius: 50px; width: 50px; height:45px;" src="https://i.pinimg.com/474x/e8/d7/d0/e8d7d05f392d9c2cf0285ce928fb9f4a.jpg" alt=""></td>
                        <td>
                            <p>{{$newRDV->nom}}</p>
                        </td>
                        <td>{{$newRDV->created_at}}</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Reminders -->
        <div class="reminders">
            <div class="header">
                <i class='bx bx-note'></i>
                <h3>Rappels</h3>
                <i class='bx bx-filter'></i>
                <i class='bx bx-plus'></i>
            </div>
            <ul class="task-list">
                <li class="completed">
                    <div class="task-title">
                        <i class='bx bx-check-circle'></i>
                        <p>Commencer notre réunion</p>
                    </div>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </li>
                <li class="completed">
                    <div class="task-title">
                        <i class='bx bx-check-circle'></i>
                        <p>Analyser notre site</p>
                    </div>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </li>
            </ul>
        </div>

        <!-- End of Reminders-->

    </div>

</main>
@endsection

