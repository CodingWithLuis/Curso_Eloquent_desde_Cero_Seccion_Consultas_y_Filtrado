@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Productos</div>

                <div class="card-body">

                    <h3>Productos</h3>
                    @foreach ($products as $product)
                    <li> {{ $product }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
