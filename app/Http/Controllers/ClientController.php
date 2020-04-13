<?php

namespace App\Http\Controllers;

use App\Client;
use App\People;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        foreach ($clients as $key => $client) {
            $people = People::findOrFail($client->id);
            $client->name = $people->name;
            $client->ic = $people->ic;
        }
        return response()->json([
            "message"=>"Provider created Success",
            "data"=>$clients,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
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
        $client = Client::createClient($request);


        return response()->json([
            "message"=>"Client Has Been Successfully Created",
            "data"=>$client,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $people = People::findOrFail($client->id);
        $client->name = $people->name;
        $client->ic = $people->ic;
        return response()->json([
            "message"=>"Get Client Has Been Successfully",
            "data"=>$client,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client = Client::updateClient($request);
        $people = People::findOrFail($client->id);
        $client->name = $people->name;
        $client->ic = $people->ic;
        return response()->json([
            "message"=>"Client Has Been Successfully Updated",
            "data"=>$client,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        $people = People::findOrFail($client->id);
        $client->name = $people->name;
        $client->ic = $people->ic;
        return response()->json([
            "message"=>"Client Has Been Successfully Updated",
            "data"=>$client,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
