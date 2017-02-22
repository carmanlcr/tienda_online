<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductoRequest;
use App\Producto;
use App\Categoria;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::with('categorias')->orderBy('id','desc')->paginate(8); //With pertenece a Eager loading y sirve para cargar los datos de la relacion producto haciendo una sola consulta
        return view('admin.productos.index',compact('productos'));
        //dd($productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('id','desc')->pluck('nombre','id'); //pluck es para obtener solo las columnas ahí dadas
        //dd($categorias);

        return view('admin.productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        $data = [
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'descripcion_corta' => str_limit($request->get('descripcion'),150),
            'precio' =>  $request->get('precio'),
            'imagen' =>  $request->get('imagen'),
            'categorias_id' => $request->get('categorias_id'),
        ];

        $productos = Producto::create($data);

        $mensaje = $productos ? 'El producto fue creado exitosamente' : 'Hubo un error al crear el producto';

        return redirect()->route('productos.index')->with('message',$mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::orderBy('id','desc')->pluck('nombre','id'); //pluck es para obtener solo las columnas ahí dadas
        //dd($producto);

        return view('admin.productos.edit',compact('categorias','producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, Producto $producto)
    {
        $producto->fill($request->all()); //Esto es para recibir el formulario ya validado por el request creado
        $producto->activo = $request->has('activo') ? 1 : 0;

        $actualizar = $producto->save();

        $mensaje = $actualizar ? 'Se ha actualizado correctamente' : 'Hubo un error al actualizar producto';

        return redirect()->route('productos.index')->with('message',$mensaje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $eliminar = $producto->delete();

        $mensaje = $eliminar ? 'El producto se ha eliminado correctamente' : 'Hubo un error al eliminar el producto';

        return redirect()->route('productos.index')->with('message',$mensaje);
    }
}
