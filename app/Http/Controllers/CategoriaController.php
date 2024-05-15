<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Consiga;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all(); // Obtener todos los usuarios
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('CrudSupervisor', compact('usuarios', 'categorias')); // Pasar las variables a la vista
    }



    /**
     * Show the form for creating a new resource.
     */
    
    public function show(Categoria $categoria)
    {
        $categoria = Categoria::all();
        return view('categorias',compact('categoria'));
    }
    
    public function crud()
{
        $usuarios = User::all(); // Obtener todos los usuarios
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('CrudSupervisorCategorias', compact('categorias'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function create()
    {
        return view('CreateCategorias');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
    ]);

    Categoria::create($request->only('nombre'));

    return redirect()->route('CrudSupervisorCategorias')
        ->with('success', 'Categoría creada exitosamente.');
}

public function edit($id)
{
    $categoria = Categoria::findOrFail($id);
    return view('EditCategorias', compact('categoria'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required',
    ]);

    $categoria = Categoria::find($id);
    $categoria->update($request->only('nombre'));

    return redirect()->route('CrudSupervisorCategorias')
        ->with('success', 'Categoría actualizada exitosamente.');
}
    

public function destroy($id)
{
    $categoria = Categoria::find($id);
    $categoria->delete();

    return redirect()->route('CrudSupervisorCategorias')
        ->with('success', 'Categoría eliminada exitosamente.');
}

    public function productosPorCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        $query = Consiga::whereHas('producto', function ($q) use ($id) {
            $q->where('idCategoria', $id);
        });

        $search = request('search');
        if ($search) {
            $query = Consiga::whereHas('producto', function ($q) use ($id, $search) {
                $q->where('idCategoria', $id);
                if ($search) {
                    $q->where(function ($query) use ($search) {
                        $query->where('nombre', 'like', '%' . $search . '%')
                            ->orWhere('descripcion', 'like', '%' . $search . '%');
                    });
                }
            });
        }

        $consignas = $query->get();

        return view('productosPorCategoria', compact('categoria', 'consignas'));
    }


public function productosPorCategoriaSup($id)
{
    $categoria = Categoria::findOrFail($id);
    $query = Consiga::whereHas('producto', function ($q) use ($id) {
        $q->where('idCategoria', $id);
    });

    $search = request('search');
    if ($search) {
        $query = Consiga::whereHas('producto', function ($q) use ($id, $search) {
            $q->where('idCategoria', $id);
            if ($search) {
                $q->where(function ($query) use ($search) {
                    $query->where('nombre', 'like', '%' . $search . '%')
                          ->orWhere('descripcion', 'like', '%' . $search . '%');
                });
            }
        });
    }

    $productos = $query->get();

    return view('ProductosCategoriaSupervisor', compact('categoria', 'productos'));
}
}
