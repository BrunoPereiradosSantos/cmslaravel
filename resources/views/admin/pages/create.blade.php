@extends('adminlte::page')

@section('title', 'Nova Página')

@section('content_header')
    <h1>Nova Página</h1>
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
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Construa sua página</h3>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('pages.store')}}">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> <i class="fas fa-pen"></i> </span>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Titulo" aria-label="subtitle" aria-describedby="basic-addon1" name="title" value="{{old('title')}}">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> <i class="fas fa-pen"></i> </span>
                    <textarea name="body" class="form-control" cols="30" rows="10" style="resize: none">{{old('body')}}</textarea>
                </div>

                <div class="input-group mb-3">
                    <input type="submit" class="btn btn-outline-success" value="Criar">
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/sjx9opqatjshmkg14r3rzjyc7jxiauipzodqqxikx57b15al/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinyMCE.init({
            selector: 'textarea',
            width: "1482",
            menubar: false,
            plugins: ['link', 'table', 'image', 'autoresize', 'lists'],
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
            content_css: [
                '{{asset('assets/css/content.css')}}'
            ],
            images_upload_url:"{{route('imageupload')}}",
            images_upload_credentials:true,
            convert_urls:false
        });
    </script>

@endsection
