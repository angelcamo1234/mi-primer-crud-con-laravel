@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Post</h2>
    <div class="my-3">
        <a href="{{ route('posts.misPosts') }}" class="btn btn-secondary">Volver</a>
    </div>
    <div>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}">
                @error('titulo')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea name="contenido" id="contenido" cols="30" rows="10" class="form-control @error('contenido') is-invalid @enderror">{{ old('contenido') }}</textarea>
                @error('contenido')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block">Crear post</button>
            </div>
        </form>
    </div>
</div>
@endsection