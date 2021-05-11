@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Mis Posts</h2>
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if (session('deleted'))
    <div class="alert alert-danger" role="alert">
        {{ session('deleted') }}
    </div>
    @endif
    <div class="my-3">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Crear Post</a>
    </div>
    <div>
        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="row">#</th>
                    <th scope="row">TÍTULO</th>
                    <th scope="row">CONTENIDO</th>
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
                    <td style="width: 250px">
                        <a href="#" class="btn btn-primary mr-2">Ver</a>
                        <a href="#" class="btn btn-success mr-2">Editar</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#eliminarModal-{{ $loop->iteration }}">
                            Eliminar
                        </button>

                        <div class="modal fade" id="eliminarModal-{{ $loop->iteration }}" tabindex="-1"
                            aria-labelledby="eliminarModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Post - {{ Str::words($post->titulo, 5, '...') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Seguro de querer eliminar el post?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Sí, seguro</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center">No tienes posts creados aún, <a
                            href="{{ route('posts.create') }}">crear tu primer post</a></td>
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