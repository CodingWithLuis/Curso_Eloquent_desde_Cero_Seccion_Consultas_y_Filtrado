@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Datos del Empleado</div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Empleado</th>
                                <th>Fecha Contratacion</th>
                                <th>Salario</th>
                                <th>Edad</th>
                                <th>Esta activo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->hire_date }}</td>
                                <td>{{ $employee->salary }}</td>
                                <td>{{ $employee->age }}</td>
                                <td>{{ $employee->is_active ? 'SI' : 'NO' }}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
