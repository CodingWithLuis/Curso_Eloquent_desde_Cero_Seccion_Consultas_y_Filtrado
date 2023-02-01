@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Usuarios</div>

                <div class="card-body">

                    <form method="GET">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <input name="date" type="text" class="form-control" id="date">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger" type="submit">Filtrar</button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Empleado</th>
                                <th>Email</th>
                                <th>Creado</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->is_active ? 'Activo' : 'Inactivo' }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    flatpickr("#date", {
        locale: "es",
        dateFormat: "d/m/Y",
    });
</script>
@endpush
