@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Empleados Archivados</div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Empleado</th>
                                <th>Fecha Contratacion</th>
                                <th>Salario</th>
                                <th>Edad</th>
                                <th>Esta activo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->hire_date }}</td>
                                <td>{{ $employee->salary }}</td>
                                <td>{{ $employee->age }}</td>
                                <td>{{ $employee->is_active ? 'SI' : 'NO' }}</td>
                                <td>

                                    <form method="POST" onsubmit="confirm('Estas seguro que deseas restaurar el dato?')" action="{{ route('archived_employees.restore', $employee->id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="submit" class="btn btn-danger" value="Restaurar" />
                                    </form>

                                    <form method="POST" onsubmit="confirm('Estas seguro que deseas eliminar permanentemente el dato?')" action="{{ route('archived_employees.forceDelete', $employee->id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="submit" class="btn btn-warning" value="Eliminar" />
                                    </form>
                                </td>
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
