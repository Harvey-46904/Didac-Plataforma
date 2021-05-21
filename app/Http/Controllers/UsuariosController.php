<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;
use DB;
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
   
    public function Login(Request $request){
        $data=$request->all();
        
        $email=$data["Email"];
        $Password=$data["contraseña"];
        $usuarios=DB::table('usuarios')
        ->select()
        ->where('usuarios.correo','=',$email)
        ->get()->first();
       
        if($usuarios){
            if($usuarios->contraseña==$Password){
                session()->put('id', $usuarios->id);
                session()->put('usernamecomplet', $usuarios->nombre." ".$usuarios->apellido);
                session()->put('email', $usuarios->correo);
                return view("dashboard");
            }else{
                return back()->with('msgerror', 'La Contraseña Es Incorrecta');
            }
           
        }else{
            return back()->with('msgerror', 'El Correo Es Incorrecto');
        }
        
    }
    public function destroy()
    {
        //session()->flush();
        return view("index");
    }
}
