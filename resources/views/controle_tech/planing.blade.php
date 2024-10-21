@extends('controle_tech_layout.master')

@section('title')
    planing
@endsection

@section('content')
<main>
    <h1>Planing</h1> <br>
    <h5>Clique sur les créneau pour modifie l'etat de la disponibilite des <span style="color: #512da8;">Rendez-vous</span></h5>
    <div class="Planing">
        <table>
            <thead>
                <tr>
                    @foreach ($jours as $jour)
                       <th>{{ $jour }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                        <input type="hidden" value="{{$hours=8}}">
                      @for ($j = 1; $j <= 5; $j++)
                        <tr>
                              @for ($i = 1; $i <= 5; $i++)
                              <?php
                                  $idct  = session('ControleTech')->id;
                                  $Planings = App\Models\Planing::where('id_controle_tech', $idct)->first();
                                  $creneau = $jours[$i - 1].'_'.$hours;
                                  $creneauDisponible = $Planings->$creneau == 1;
                                  $url = $creneauDisponible ? url('/controletech/planing/unactivatecreneau/' . $creneau .'/'.$idct ) : url('/controletech/planing/activatecreneau/' . $creneau .'/'.$idct);
                              ?>
                                  @if($hours<10)
                                      <td><a href="{{ $url }}" class="btn {{ $creneauDisponible ? 'btn-light' : 'btn-secondary' }}">0{{ $hours }}:00</a></td>
                                  @else
                                      <td><a href="{{ $url }}" class="btn {{ $creneauDisponible ? 'btn-light' : 'btn-secondary' }}">{{$hours}}:00</a></td>
                                  @endif
                              @endfor
                        </tr>
                         <input type="hidden" value="{{$hours++}}">
                      @endfor
            </tbody>
        </table>
</div>
</main>
@endsection
