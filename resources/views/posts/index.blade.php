@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Listado de Posts</div>

                <div class="card-body">

                    <form method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="category_id" class="form-label">Categoria</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Seleccione</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="user_id" class="form-label">Usuario</label>
                                <select class="form-control" name="user_id">
                                    <option value="">Seleccione</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1 mt-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_published">
                                    <label class="form-check-label" for="is_published">
                                        Esta publicado
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3 mt-4">
                                <button type="submit" class="btn btn-danger">Filtrar</button>
                            </div>

                        </div>
                    </form>

                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th>Post</th>
                                <th>Contenido</th>
                                <th>Esta publicado</th>
                                <th>Usuario</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->is_published ? 'Esta publicado': 'Es un borrador' }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->category->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
