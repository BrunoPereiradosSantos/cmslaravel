@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>
        Meus Usuários
        <a href="{{route('users.create')}}" class="btn btn-outline-success"> <span><i class="fas fa-plus"></i></span> Criar Usuário</a>
    </h1>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th width="50">ID</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th width="230">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route('users.edit', ['user' => $user->id])}}" class="btn btn-outline-info"> <span><i class="fas fa-edit"></i></span> Editar </a>

                                @if ($loggedId !== intval($user->id))
                                    <form method="POST" action="{{route('users.destroy', ['user' => $user->id])}}" class="d-inline" >
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger"> <span><i class="fas fa-trash"></i></span> Excluir</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{$users->links('pagination::bootstrap-4')}}

@endsection


