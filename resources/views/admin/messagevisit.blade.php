@extends('admin_layout.master')

@section('title')
    message
@endsection

@section('content')
<main>
    <h1>Messages des visiteurs du site</h1> <br>
    <table class="table">
        <thead class="table-light">
            <tr>
                <th style="text-align: center;">Num</th>
                <th style="text-align: center;">Nom</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">Messsage</th>
              </tr>
        </thead>
        <input type="hidden" {{$increment=1}}>
        <tbody>
            @foreach ($Contacts as $Contact)
                <tr>
                    <td>{{$increment}}</td>
                    <td>{{$Contact->nom}}</td>
                    <td>{{$Contact->email}}</td>
                    <td>{{$Contact->message}}</td>
                </tr>
                <input type="hidden" {{$increment++}}>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
