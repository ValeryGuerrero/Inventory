@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col-md-8">
                <h2 class="text-secondary">Detalle del Producto: <span class="text-primary">{{ $producto->nombre }}</span></h2>
            </div>
            <div class="col-md-4 text-md-end">
                {{-- Botón para Volver --}}
                <a class="btn btn-secondary" href="{{ route('productos.index') }}">
                    <i class="bi bi-arrow-left"></i> Volver al Catálogo
                </a>
            </div>
        </div>

        <div class="card shadow-lg border-success">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0"><i class="bi bi-info-circle me-2"></i> Información Completa del Artículo</h4>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    {{-- Columna de Datos de Identificación --}}
                    <div class="col-md-6 border-end">
                        <h5 class="text-primary mb-3">Identificación</h5>
                        <div class="mb-3">
                            <strong class="d-block text-muted">ID de Registro:</strong>
                            <p class="fs-5">{{ $producto->id }}</p>
                        </div>
                        <div class="mb-3">
                            <strong class="d-block text-muted">Nombre del Producto:</strong>
                            <p class="fs-4">{{ $producto->nombre }}</p>
                        </div>
                        <div>
                            <strong class="d-block text-muted">Fecha de Creación:</strong>
                            <p class="text-sm">{{ $producto->fecha_creacion->format('d/m/Y H:i:s') }}</p>
                        </div>
                    </div>

                    {{-- Columna de Datos Financieros y Stock --}}
                    <div class="col-md-6">
                        <h5 class="text-primary mb-3">Inventario y Precios</h5>
                        <div class="mb-3">
                            <strong class="d-block text-muted">Precio de Venta:</strong>
                            <p class="fs-4 text-success fw-bold">
                                <i class="bi bi-currency-dollar"></i> {{ number_format($producto->precio, 2) }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <strong class="d-block text-muted">Stock Actual:</strong>
                            <p class="fs-3">
                                <span class="badge p-3 rounded-pill {{ $producto->stock > 10 ? 'bg-primary' : ($producto->stock > 0 ? 'bg-warning text-dark' : 'bg-danger') }}">
                                    {{ $producto->stock }}
                                </span>
                                unidades
                            </p>
                            @if ($producto->stock == 0)
                                <small class="text-danger"><i class="bi bi-exclamation-octagon-fill"></i> ¡Producto agotado! Se requiere reabastecimiento.</small>
                            @elseif ($producto->stock <= 5)
                                <small class="text-warning"><i class="bi bi-exclamation-triangle-fill"></i> Stock bajo. Considera ordenar más.</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end gap-2">
                <a class="btn btn-sm btn-primary" href="{{ route('productos.edit', $producto->id) }}">
                    <i class="bi bi-pencil-square"></i> Editar Producto
                </a>
            </div>
        </div>
    </div>
@endsection