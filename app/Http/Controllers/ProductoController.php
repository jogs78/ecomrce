<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
//use App\Models\Registro;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Events\ComprarProducto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $evento = new Registro();
//        $evento->quien = Auth::user()->correo;
//        $evento->que = "Lista los productos";
//        $evento->save();
        $encontrados = Producto::all();
        return view('producto.index', compact('encontrados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if(Gate::allows('create', Producto::class )) {
//        $this->authorize('create', Producto::class );
//            $evento = new Registro();
//            $evento->quien = Auth::user()->correo;
//            $evento->que = "Agrega un productos en el sistema.";
//            $evento->save();
            $categorias = Categoria::all();
            return view('producto.create',compact('categorias'));
        }else{
            
            echo "NO PUEDES";
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
//        $evento = new Registro();
//        $evento->quien = Auth::user()->correo;
//        $evento->que = "Guardo el productos en el sistema.";
//        $evento->save();


        $valores = $request->all();
        $valores['propietario_id'] = Auth::user()->id;
        $nuevo = new Producto();
        $nuevo->fill($valores);
        $nuevo->save();
        return redirect(route('productos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
 //       $evento = new Registro();
 //       $evento->quien = Auth::user()->correo;
 //       $evento->que = "Mostro el productos del sistema.";
 //       $evento->save();

        $categorias = Categoria::all();
        return view('producto.show',compact('producto','categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
  //      $evento = new Registro();
  //      $evento->quien = Auth::user()->correo;
  //      $evento->que = "Muestra para edicion el productos del sistema.";
  //      $evento->save();

        $categorias = Categoria::all();
        return view('producto.edit',compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        //$producto->fill($request->all());

//        $evento = new Registro();
//        $evento->quien = Auth::user()->correo;
//        $evento->que = "Actualizo el productos del sistema.";
//        $evento->save();

        $producto->save();
        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
//        $evento = new Registro();
//        $evento->quien = Auth::user()->correo;
//        $evento->que = "Elimino el productos del sistema.";
//        $evento->save();

        $producto->delete();
        return redirect(route('productos.index'));
    }

    public function comprar( $cual)
    {
        $producto = Producto::with('categoria')->find($cual);

        //aqui se "dispara el evento ComprarProducto"
        ComprarProducto::dispatch();
        
        return view('producto.comprar',compact('producto'));
    }
}
