<?php

namespace App\Http\Controllers;

use App\Models\estudiante;
use Illuminate\Http\Request;
use Redirect;
use DB;
class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes=estudiante::all();
        return view('registro_estudiante',compact("estudiantes"));
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
        $estudiante=new estudiante;
        $estudiante->no_documento= $request->no_documento;
        $estudiante->nombre= $request->nombre;
        $estudiante->apellido= $request->apellido;
        $estudiante->sexo= $request->sexo;
        $estudiante->contacto= $request->contacto;
        $estudiante->save();
        return Redirect::to('/estudiante_registro')->with('correcto', 'Registro Correcto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(estudiante $estudiante)
    {
        //
    }

    public function lista($id){
        $estudiantes=estudiante::findOrFail($id);
        $puntos=DB::table('puntuacions')
        ->select()
        ->where('id_estudiante','=',$id)
        ->get();

        return view("lista_estudiante",compact("estudiantes"),compact("puntos"));
    }

    public function juego($documento){
        
        $usuarios=DB::table('estudiantes')
        ->select("id","nombre")
        ->where('no_documento','=',$documento)
        ->get()->first();
       return $usuarios->id."/".$usuarios->nombre;
    }

    public function niveles($jugador){
        $nivelbasico=false;
        $nivelmedio=false;
        $condicion=['id_estudiante'=>$jugador];
        $usuarios=DB::table('puntuacions')
        ->select()
        ->where($condicion)
        ->get();

      $resultado1= self::findObjectById(1,$usuarios);
      $resultado2= self::findObjectById(2,$usuarios);
      $resultado3= self::findObjectById(3,$usuarios);
      $resultado4= self::findObjectById(4,$usuarios);
      $resultado5= self::findObjectById(5,$usuarios);
      $resultado6= self::findObjectById(6,$usuarios);

      $nivelbasico=self::tres_verdades(
          $resultado1,
          $resultado2,
          $resultado3,
          $resultado4,
          $resultado5,
          $resultado6
        );
        if($nivelbasico){
            $resultado1= self::findObjectById(7,$usuarios);
            $resultado2= self::findObjectById(8,$usuarios);
            $resultado3= self::findObjectById(9,$usuarios);
            $resultado4= self::findObjectById(10,$usuarios);
            $resultado5= self::findObjectById(11,$usuarios);
            $resultado6= self::findObjectById(12,$usuarios);

            $nivelmedio=self::tres_verdades(
                $resultado1,
                $resultado2,
                $resultado3,
                $resultado4,
                $resultado5,
                $resultado6
                );

        }
      return $nivelbasico."/".$nivelmedio;
       
    }

    function findObjectById($id,$objecto){
        $array = $objecto;
        foreach ( $array as $element ) {
            if ( $id == $element->id_juego ) {
               return true;
            }
        }
        return false;
    }

    function tres_verdades($a,$b,$c,$d,$e,$f){
        if( $a && $b && $c && $d && $e && $f){return true;}
        return false;
    }


}
