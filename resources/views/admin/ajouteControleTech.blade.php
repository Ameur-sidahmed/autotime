@extends('admin_layout.master')

@section('title')
    ajouterControleTech
@endsection

@section('content')
<main class="Ajt_CT">
    <h1>Ajouter Un contrôle technique</h1> <br>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
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
    <form action="{{url('/admin/addcontroletech')}}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
          <div class="mb-3 col-md-6">
            <label for="exampleInputEmail1" class="form-label" >Email address <span class="red">*</span></label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" >
          </div>
          <div class="mb-3 col-md-6">
            <label for="Nom" class="form-label">Nom <span class="red">*</span></label>
            <input type="text" class="form-control" id="Nom" name="nom" >
          </div>
          <div class="mb-3 col-md-6">
            <label for="localisation" class="form-label">localisation <span class="red">*</span></label>
            <input type="text" class="form-control" id="localisation" name="localisation" >
          </div>
          <div class="mb-3 col-md-6">
            <label for="maps" class="form-label">maps <span class="red">*</span></label>
            <input type="text" class="form-control" id="maps" name="maps" >
          </div>
          <div class="mb-3 col-md-6">
            <label for="Telephone" class="form-label">Telephone <span class="red">*</span></label>
            <input type="tel" class="form-control" id="Telephone" name="Telephone" >
          </div>
        <div class="mb-3 col-md-6">
          <label for="photo" class="form-label">photo <span class="red">*</span></label>
          <input type="file" class="form-control" id="photo" name="photo" >
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Password <span class="red">*</span></label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" >
        </div>
        <div class="mb-3 col-md-12">
        <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
      </form>
</main>
@endsection


