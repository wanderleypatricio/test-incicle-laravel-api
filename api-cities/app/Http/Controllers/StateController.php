<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        return response()->json($states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $state = new State();

        $state->uf = $data['uf'];
        $state->name = $data['name'];

        if($state->save()){
            return response()->json("Cadastro realizado com sucesso!");
        }else{
            return response()->json("Erro ao tentar realizar o cadastro!");
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state = State::find($id);
        return response()->json($state);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $state = State::find($id);

        $state->uf = $data['uf'];
        $state->name = $data['name'];

        if($state->save()){
            return response()->json("Alteração realizada com sucesso!");
        }else{
            return response()->json("Erro ao tentar altrar os dados!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::find($id);

        if($state->delete()){
            return response()->json("Registro excluído com sucesso!");
        }else{
            return response()->json("Erro ao tentar excluir os dados!");
        }
    }
}
