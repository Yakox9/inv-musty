<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\People;
class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();
        foreach ($providers as $key => $provider) {
            $people = People::findOrFail($provider->id);
            $provider->name = $people->name;
            $provider->ic = $people->ic;
        }
        return response()->json([
            "message"=>"Provider created Success",
            "data"=>$providers,
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
        $provider = Provider::createProvider($request);


        return response()->json([
            "message"=>"Provider Has Been Successfully Created",
            "data"=>$provider,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        $people = People::findOrFail($provider->id);
        $provider->name = $people->name;
        $provider->ic = $people->ic;
        return response()->json([
            "message"=>"Get Provider Has Been Successfully",
            "data"=>$provider,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $provider = Provider::updateProvider($request);
        return response()->json([
            "message"=>"Provider Has Been Successfully Updated",
            "data"=>$provider,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {   $people = People::findOrFail($provider->id);
        $provider->delete();
        $people->delete();
        return response()->json([
            "message"=>"Provider Has Been Successfully Deleted",
            "data"=>$provider,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
