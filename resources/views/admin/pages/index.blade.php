@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>
        Minhas Páginas
        <a href="{{route('pages.create')}}" class="btn btn-outline-success"> <span><i class="fas fa-plus"></i></span> Nova Página</a>
    </h1>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th width="50">ID</th>
                        <th>Titulo</th>
                        <th width="350">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td>{{$page->id}}</td>
                            <td>{{$page->title}}</td>
                            <td>
                                <a href=""class="btn btn-outline-dark" target="_blank"> <span><i class="fas fa-eye"></i></span>
                                    Visualizar</a>
                                <a href="{{route('pages.edit', ['page' => $page->id])}}" class="btn btn-outline-info"> <span><i class="fas fa-edit"></i></span> Editar </a>
                                    <form method="POST" action="{{route('pages.destroy', ['page' => $page->id])}}" class="d-inline" >
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger"> <span><i class="fas fa-trash"></i></span> Excluir</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{$pages->links('pagination::bootstrap-4')}}

@endsection


