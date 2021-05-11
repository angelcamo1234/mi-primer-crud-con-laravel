@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Posts</h2>
    <div>
        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="row">#</th>
                    <th scope="row">TÍTULO</th>
                    <th scope="row">CONTENIDO</th>
                    <th scope="row" style="width: 150px">CREADO POR</th>
                    <th scope="row">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->count() > 0)
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Str::words($post->titulo, 5, '...') }}</td>
                    <td>{{ Str::words($post->contenido, 10, '...') }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td><a href="#" class="btn btn-primary mr-2">Ver</a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center">
                        No hay posts creados aún, 
                        @auth
                        <a href="#">sé el primero en crear uno</a>
                        @else   
                        <a href="{{ route('register') }}">regístrate para poder crear uno</a>
                        @endauth
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="row justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection