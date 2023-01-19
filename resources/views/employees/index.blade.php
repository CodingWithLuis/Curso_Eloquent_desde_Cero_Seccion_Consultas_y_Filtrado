@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Empleados</div>

                <div class="card-body">

                    <a href="{{ route('employees.create') }}" class="btn btn-success mb-3">Nuevo Empleado</a>

                    <a href="{{ route('archived_employees.index') }}" class="btn btn-danger mb-3">Empleados Archivados</a>

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
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary mb-3">Editar Empleado</a>
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-success mb-3">Ver datos Empleado</a>

                                    <form method="POST" onsubmit="confirm('Estas seguro que deseas eliminar el dato?')" action="{{ route('employees.destroy', $employee->id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <input type="submit" class="btn btn-danger" value="Eliminar" />
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
