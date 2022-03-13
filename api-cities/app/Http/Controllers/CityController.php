<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return response()->json($cities);
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
        $city = new City();

        $state = DB::table('states')->select('states.id')->where('states.uf', $data['state'])->get();
        $city->state_id = $state[0]->id;
        $city->city = $data['city'];

        if($city->save()){
            return response()->json("Cadastro realizado com sucesso!");
        }else{
            return response()->json("Erro ao realizar o cadastro dos dados!");
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
        $city = City::find($id);
        return response()->json($city);
    }

    public function consultCityName(Request $request)
    {
        $name = $request->query("name");
        $city = DB::table('cities')->select('cities.*')->where('cities.city', $name)->get();
        return response()->json($city);
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
        $city = City::find($id);

        $state = DB::table('states')->select('states.id')->where('states.uf', $data['state'])->get();

        $city->state_id = $state[0]->id;
        $city->city = $data['city'];

        if($city->save()){
            return response()->json("Alteração realizada com sucesso!");
        }else{
            return response()->json("Erro ao alterar dados!");
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
        $city = City::find($id);
        if($city->delete()){
            return response()->json("Registro excluído com sucesso!");
        }else{
            return response()->json("Erro ao excluir dados!");
        }
    }
}
