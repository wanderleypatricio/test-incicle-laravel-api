<?php

namespace App\Http\Controllers;

use App\Events\websocket\SendMessage;
use App\Models\Person;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Event;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::all();
        return response()->json($persons);
    }

    public function apiCityState($city)
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://localhost:8000/api/search/city?name=" . $city . "";


        $response = $client->request('GET', $url, [
            'json' => $city
        ]);

        $responseBody = json_decode($response->getBody());

        return $responseBody;
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

        $person = new Person();

        $result = $this->apiCityState($data['city']);
        if (sizeof($result) > 0 && $result[0]->city == $data['city']) {
            $person->name = $data['name'];
            $person->cpf = $data['cpf'];
            $person->state = $data['state'];
            $person->city = $data['city'];

            if ($person->save()) {
                return response()->json("Cadastro realizado com sucesso!");
            } else {
                return response()->json("Erro ao realizar o cadastro");
            }
        } else {
            return response()->json("A cidade informada não existe");
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
        $person = Person::find($id);
        return response()->json($person);
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

        $person = Person::find($id);

        $result = $this->apiCityState($data['city']);
        if (sizeof($result) > 0 && $result[0]->city == $data['city']) {
            $person->name = $data['name'];
            $person->cpf = $data['cpf'];
            $person->state = $data['state'];
            $person->city = $data['city'];

            if ($person->save()) {
                return response()->json("Dados alterados com sucesso!");
            } else {
                return response()->json("Erro ao realizar o alteração");
            }
        } else {
            return response()->json("A cidade informada não existe");
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
        $person = Person::find($id);
        if ($person->delete()) {
            return response()->json("Registro excluído com sucesso!");
        } else {
            return response()->json("Erro ao excluir registro");
        }
    }
}
