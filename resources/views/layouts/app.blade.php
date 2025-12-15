<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE INVENTARIO | Tienda</title>
    {{-- Enlace a Bootstrap CSS (versión 5.3.x) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- Estilo CSS para la Tienda --}}
    <style>
        .header-tienda {
            background: linear-gradient(135deg, #0d6efd 0%, #0c4cb3 100%); /* Azul degradado */
            color: white;
            padding: 30px 0;
            margin-bottom: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header-tienda h1 {
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="header-tienda">
        <div class="container text-center">
            <h1><i class="bi bi-shop"></i> Gestión de Inventario de Tienda</h1>
            <p class="lead">Control total de tus productos al alcance de tu mano.</p>
        </div>
    </div>

    <main class="py-2">
        @yield('content')
    </main>

    {{-- Enlace a Bootstrap JS con Popper --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    {{-- Opcional: Iconos de Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>
</html>