@extends('adminlte::page')

@section('title', 'Configurações')

@section('content_header')
    <h1>Configurações</h1>
@endsection

@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <h5> <i class="icon fas fa-ban"></i>
                Ocorreu um erro!</h5>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-success">
            {{session('warning')}}
        </div>
    @endif

    <div class="card">
        <div class="card card-info">
            <div class="card-header">
                <div class="card-title">
                    Configurações do Site
                </div>
            </div>
        </div>
        <div class="card-body">
            <form  action="{{route('settings.save')}}" method="post">
                @method('PUT')
                @csrf

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"> <i class="fas fa-pen-nib"></i></span>
                    </div>
                    <input type="text" class="form-control" value="{{$settings['title']}}" aria-describedby="basic-addon1" name="title">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" value="{{$settings['subtitle']}}" name="subtitle">
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{$settings['email']}}" name="email">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2">@example.com</span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"> <i class="fas fa-code"></i></span>
                    </div>
                    <input type="color" class="form-control" value="{{$settings['bgcolor']}}" name="bgcolor">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"> <i class="fas fa-code"></i></span>
                    </div>
                    <input type="color" class="form-control" value="{{$settings['textcolor']}}" name="textcolor">
                </div>


                    <input type="submit" class="btn btn-outline-success" value="Salvar">
            </form>
        </div>
    </div>
@endsection

