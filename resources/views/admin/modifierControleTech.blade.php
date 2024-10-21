@extends('admin_layout.master')

@section('title')
    modifierControleTech
@endsection

@section('content')
<main class="Ajt_CT">
    <h1>Modifier Le controle technique</h1> <br>
    @if (count($errors) > 0)
        <div class="alert alert-danger" style="text-align: center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has("status"))
       <br>
        <div class="alert alert-success" style="text-align: center">
            {{Session::get('status')}}
        </div>
    @endif
    <form action="{{url('/admin/editcontroletech/'.$controle_teche->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" >Email address <span class="red">*</span></label>
            <input type="email" value="{{$controle_teche->email}}" class="form-control" id="exampleInputEmail1" name="email" required>
          </div>
          <div class="mb-3">
            <label for="Nom" class="form-label">Nom <span class="red">*</span></label>
            <input type="text" value="{{$controle_teche->nom}}" class="form-control" id="Nom" name="nom" required>
          </div>
          <div class="mb-3">
            <label for="localisation" class="form-label">localisation <span class="red">*</span></label>
            <input type="text" value="{{$controle_teche->localisation}}" class="form-control" id="localisation" name="localisation" required>
          </div>

          <div class="mb-3">
            <label for="Telephone" class="form-label">Telephone <span class="red">*</span></label>
            <input type="tel" value="{{$controle_teche->telephone}}" class="form-control" id="Telephone" name="Telephone" required>
          </div>
        <div class="mb-3">
          <label for="photo" class="form-label">photo <span class="red">*</span></label>
          <input type="file" value="{{$controle_teche->photo}}" class="form-control" id="photo" name="photo" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password <span class="red">*</span></label>
            <input type="password" value="{{$controle_teche->password}}" class="form-control" id="exampleInputPassword1" name="password" required>
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</main>
@endsection


