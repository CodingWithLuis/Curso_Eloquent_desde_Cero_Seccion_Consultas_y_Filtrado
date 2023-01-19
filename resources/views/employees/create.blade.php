@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Nuevo Empleado</div>

                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('employees.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salario</label>
                            <input type="text" class="form-control" name="salary" id="salary" aria-describedby="salary">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" value="1" name="is_active" class="form-check-input" id="is_active">
                            <label class="form-check-label" for="is_active">Esta activo?</label>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Edad</label>
                            <input type="number" name="age" class="form-control" id="age" aria-describedby="age">
                        </div>
                        <div class="mb-3">
                            <label for="hire_date" class="form-label">Fecha Contratación</label>
                            <input type="text" name="hire_date" class="form-control date" id="hire_date" aria-describedby="hire_date" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    flatpickr('.date', {
        dateFormat: 'd/m/Y'
    })
</script>
@endpush
