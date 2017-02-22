<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\UsersRequest;

use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::orderBy('name')->paginate(10);
        //dd($usuarios);

        return view('admin.user.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'username' => $request->get('username'),
            'password' => bcrypt($request->get('password')),
            'type' => $request->get('type'),
            'direccion' => $request->get('direccion')
        ];

        $usuario = User::create($data);

        $mensaje = $usuario ? 'El usuario se creo correctamente' : 'Hubo un problema al crear el usuario';

        return redirect()->route('users.index')->with('message',$mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $username)
    {
        return $username;
    }
        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $username)
    {
        return view('admin.user.edit',compact('username'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $username)
    {
        $this->validate($request,[
            'name' => 'required|max:20|min:3',
            'last_name' => 'required|max:20|min:5',
            'email' => 'required|email|min:5|max:100',
            'username' => 'required|min:5|max:40',
            'password' => ($request->get('password') != "") ? 'required|min:8|confirmed' : '',
            'type' => 'in:SuperUsuario,Administrador,Invitado',
            'direccion' => 'required|max:1000'
        ]);

        $username->name = $request->get('name');
        $username->last_name = $request->get('last_name');
        $username->email = $request->get('email');
        $username->username = $request->get('username');
        $username->type = $request->get('type');
        $username->direccion = $request->get('direccion');
        if($request->get('password') != ""){
            $username->password = bcrypt($request->get('password'));
        }

        $actualizar = $username->save();

        $mensaje = $actualizar ? 'El usuario fue actualizado correctamente' : 'No se pudo actualizar el usuario';

        return redirect()->route('users.index')->with('message',$mensaje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $username)
    {
        //Eliminar de manera logica
        if($username->activo === 0){
            $eliminar = 0;
            return redirect()->route('users.index')->with('message','Este usuario ya esta eliminado');
        }else{
            $username->activo = 0;
            $eliminar = $username->save();
        }

        $mensaje = $eliminar ? 'El usuario fue eliminado correctamente' : 'Hubo un error al procesar solicitud para eliminar';

        return redirect()->route('users.index')->with('message',$mensaje);
    }
}
