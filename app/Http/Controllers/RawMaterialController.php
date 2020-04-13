<?php

namespace App\Http\Controllers;

use App\RawMaterial;
use App\Statu;
use App\TypeRawMaterial;
use App\Provider;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawMaterial = RawMaterial::all();
        foreach ($rawMaterial as $key => $RM) {
            $RM->id_status =Statu::findOrFail($RM->id_status)->name;
            $RM->id_type_raw_materials =TypeRawMaterial::findOrFail($RM->id_type_raw_materials)->name;
            $RM->id_provider =Provider::findOrFail($RM->id_provider)->name;
        }
        return response()->json([
            "data"=>$rawMaterial,
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
        $rawMaterial = RawMaterial::create($request->all());

        $rawMaterial->id_status =Statu::findOrFail($rawMaterial->id_status)->name;
        $rawMaterial->id_type_raw_materials =TypeRawMaterial::findOrFail($rawMaterial->id_type_raw_materials)->name;
        $rawMaterial->id_provider =Provider::findOrFail($rawMaterial->id_provider)->name;
        return response()->json([
            "message"=>"Raw Material created Success",
            "data"=>$rawMaterial,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(RawMaterial $rawMaterial)
    {
        $rawMaterial->id_status =Statu::findOrFail($rawMaterial->id_status)->name;
        $rawMaterial->id_type_raw_materials =TypeRawMaterial::findOrFail($rawMaterial->id_type_raw_materials)->name;
        $rawMaterial->id_provider =Provider::findOrFail($rawMaterial->id_provider)->name;
        return response()->json([
            "message"=>"Get Raw Material Success",
            "data:"=>$rawMaterial,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(RawMaterial $rawMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RawMaterial $rawMaterial)
    {
        $rawMaterial->update($request->all());

        $rawMaterial->id_status =Statu::findOrFail($rawMaterial->id_status)->name;
        $rawMaterial->id_type_raw_materials =TypeRawMaterial::findOrFail($rawMaterial->id_type_raw_materials)->name;
        $rawMaterial->id_provider =Provider::findOrFail($rawMaterial->id_provider)->name;
        return response()->json([
            "message"=>"Raw Material Updated Success.",
            "data"=>$rawMaterial,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawMaterial $rawMaterial)
    {
        $rawMaterial->delete();
        $rawMaterial->id_status =Statu::findOrFail($rawMaterial->id_status)->name;
        $rawMaterial->id_type_raw_materials =TypeRawMaterial::findOrFail($rawMaterial->id_type_raw_materials)->name;
        $rawMaterial->id_provider =Provider::findOrFail($rawMaterial->id_provider)->name;
        return response()->json([
            "message"=>"Raw Material Deleted Success.",
            "data"=>$rawMaterial,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
