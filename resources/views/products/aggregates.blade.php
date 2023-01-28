@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Productos</div>

                <div class="card-body">

                    Productos Totales: {{ $total_products }} <br>

                    Precio maximo: {{ $max_price_product }} <br>

                    Precio minimo: {{ $min_price_product }} <br>

                    Precio promedio: {{ $avg_price_product }} <br>

                    Sumatoria productos: {{ $sum_price_product }} <br>

                    @foreach ($total_products2 as $key => $value)
                    <li>Producto: {{ $key }} Cantidad Total: {{ $value }} </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
