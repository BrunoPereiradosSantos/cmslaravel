@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <h1>Editar Usuário</h1>
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

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('users.update', ['user' => $user->id])}}">
                @method('PUT')
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> <i class="fas fa-user-alt"></i> </span>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="nome" aria-label="nome" aria-describedby="basic-addon1" name="name" value="{{$user->name}}">
                </div>

                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" aria-label="email" aria-describedby="basic-addon2" name="email" value="{{$user->email}}">
                    <span class="input-group-text" id="basic-addon2">@examplo.com</span>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> <i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="nova senha" aria-label="senha" aria-describedby="basic-addon3" name="password">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> <i class="fas fa-lock"></i> </span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="confirme a senha" aria-label="senha" aria-describedby="basic-addon3" name="password_confirmation">
                </div>

                <div class="input-group mb-3">
                    <input type="submit" class="btn btn-outline-success" value="salvar">
                </div>
            </form>
        </div>
    </div>

@endsection
