@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4 text-secondary">Registrar Nuevo Producto</h2>

        @if ($errors->any())
            <div class="alert alert-danger shadow-sm">
                <i class="bi bi-exclamation-triangle-fill"></i> **Error de Validación:** Por favor, corrige los siguientes problemas.
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-lg border-primary">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Datos del Producto</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="nombre" class="form-label fw-bold">Nombre del Producto:</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="precio" class="form-label fw-bold">Precio de Venta:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                <input type="number" step="0.01" name="precio" class="form-control" id="precio" value="{{ old('precio') }}" required min="0.01">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="stock" class="form-label fw-bold">Stock Inicial:</label>
                            <input type="number" name="stock" class="form-control" id="stock" value="{{ old('stock') }}" required min="0">
                        </div>
                        <div class="col-12 mt-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a class="btn btn-secondary" href="{{ route('productos.index') }}"><i class="bi bi-arrow-left"></i> Volver</a>
                                <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Guardar Producto</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection