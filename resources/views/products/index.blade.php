@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Productos</div>

                <div class="card-body">

                    <a href="{{ route('products.aggregates') }}" class="btn btn-primary mt-2 mb-2"> Ejemplo Funciones de Agregado</a>
                    <a href="{{ route('products.having') }}" class="btn btn-danger mt-2 mb-2"> Ejemplo Having, Group By</a>

                    <a href="{{ route('products.clone') }}" class="btn btn-success mt-2 mb-2"> Ejemplo Clonar/Duplicar</a>

                    <form method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Buscar">
                            <button type="submit" class="input-group-text">Buscar</button>
                        </div>
                    </form>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Codigo</th>
                                <th>Producto</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
