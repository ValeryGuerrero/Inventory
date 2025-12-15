@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col-md-6">
                <h2 class="text-secondary">Catálogo de Productos</h2>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('productos.create') }}" class="btn btn-primary btn-lg shadow-sm">
                    <i class="bi bi-plus-circle-fill"></i> Agregar Nuevo Producto
                </a>
            </div>
        </div>

        {{-- Mensajes de Sesión --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-lg border-0">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                {{-- <th>ID (Oculto)</th> --}}
                                <th scope="col">Producto</th>
                                <th scope="col" class="text-end">Precio</th>
                                <th scope="col" class="text-center">Stock</th>
                                <th scope="col">Creado el</th>
                                <th scope="col" width="180px" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productos as $producto)
                            <tr>
                                <td><i class="bi bi-box-seam me-2"></i><strong>{{ $producto->nombre }}</strong></td>
                                <td class="text-end text-success">${{ number_format($producto->precio, 2) }}</td>
                                <td class="text-center">
                                    <span class="badge rounded-pill p-2 {{ $producto->stock > 10 ? 'bg-primary' : ($producto->stock > 0 ? 'bg-warning text-dark' : 'bg-danger') }}">
                                        {{ $producto->stock }}
                                    </span>
                                </td>
                                <td>{{ $producto->fecha_creacion->format('Y-m-d') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-sm btn-outline-info" href="{{ route('productos.show', $producto->id) }}" title="Ver Detalle">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('productos.edit', $producto->id) }}" title="Editar Producto">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar Producto" onclick="return confirm('¿CONFIRMAS que quieres eliminar el producto {{ $producto->nombre }}?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <i class="bi bi-search me-2"></i> No se encontraron productos en el inventario.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection