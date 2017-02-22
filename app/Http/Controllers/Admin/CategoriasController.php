<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(){
        return view('admin.home');
    }

    public function index()
    {
        $categorias = Categoria::paginate(10);
        return view('admin.categoria.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
            'nombre' => 'required|unique:categorias|max:255',
            'descripcion' => 'required|max:1000',
            'color' => 'required',
        ]);

        $categoria = Categoria::create([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'color' => $request->get('color')
        ]);

        $mensaje = $categoria ? 'Categoria agregada correctamente' : 'La categoria NO pudo agregarse';

        return redirect()->route('categorias.index')->with('message',$mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return $categoria;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //dd($categoria);
        return view('admin.categoria.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->fill($request->all());

        $updated = $categoria->save();

        $mensaje = $updated ? 'Categoria actualizada correctamente' : 'La categoria no se actualizo';

        return redirect()->route('categorias.index')->with('message',$mensaje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $eliminar = $categoria->delete();

        $mensaje = $eliminar ? 'La categoria se elimino correctamente' : 'Ocurrió un error al intentar eliminar';

        return redirect()->route('categorias.index')->with('message',$mensaje);
    }
}
