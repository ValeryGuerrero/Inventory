<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Muestra una lista de todos los productos. (READ - Listar)
     */
    public function index()
    {
        // Obtiene todos los productos
        $productos = Producto::all();
        // Carga la vista 'productos.index' y le pasa la lista de productos
        return view('productos.index', compact('productos'));
    }

    /**
     * Muestra el formulario para crear un nuevo producto. (CREATE - Formulario)
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Almacena un producto recién creado en la base de datos. (CREATE - Guardar)
     */
    public function store(Request $request)
    {
        // 1. Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0',
        ]);

        // 2. Creación del producto
        Producto::create($request->all());

        // 3. Redirección con mensaje de éxito
        return redirect()->route('productos.index')
                         ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Muestra un producto específico. (READ - Detalle)
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Muestra el formulario para editar un producto. (UPDATE - Formulario)
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualiza el producto especificado en la base de datos. (UPDATE - Guardar)
     */
    public function update(Request $request, Producto $producto)
    {
        // 1. Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0',
        ]);

        // 2. Actualización del producto
        $producto->update($request->all());

        // 3. Redirección con mensaje de éxito
        return redirect()->route('productos.index')
                         ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Elimina el producto especificado de la base de datos. (DELETE)
     */
    public function destroy(Producto $producto)
    {
        // 1. Eliminación
        $producto->delete();

        // 2. Redirección con mensaje de éxito
        return redirect()->route('productos.index')
                         ->with('success', 'Producto eliminado exitosamente.');
    }
}