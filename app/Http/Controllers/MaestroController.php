<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use Illuminate\Http\Request;


class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//EN LA FUNCION index() TRAEMOS TODOS LOS REGISTROS
    {
       $maestros = Maestro::all();//LLAMAMOS AL MODELO Maestro LE PEDIMOS QUE TRAIGA TODOS LOS REGISTROS Y LO ALMACENAMOS EN LA VARIABLE  $maestros
       return response()->json($maestros);//ASI PEDIMOS QUE NOS DEVUELVA UNA RESPUESTA EN FORMATO JSON
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
        $maestro = Maestro::create($request->post());
        return response()->json([
            'maestro'=>$maestro
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Maestro $maestro)
    {
        return response()->json($maestro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maestro $maestro)
    {
        $maestro->fill($request->post())->save();
        return response()->json([
            'maestro'=>$maestro
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maestro $maestro)
    {
        $maestro->delete();
        return response()->json([
            'mensaje'=>'Maestro eliminado'
        ]);
    }
}
