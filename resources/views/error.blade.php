@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">¡Error!</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Algo salió mal</h5>
                    <p class="card-text">Lo sentimos, No cuentas con las credenciales necesarias para realizar esta accion.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary">Volver al inicio</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
