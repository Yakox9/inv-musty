<?php

namespace App\Http\Controllers;

use App\TypeRawMaterial;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class TypeRawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeRawMaterial = TypeRawMaterial::all();
        return response()->json([
            "data"=>$typeRawMaterial,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TypeRawMaterial $typeRawMaterial)
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
        $typeRawMaterial = TypeRawMaterial::create($request->all());
        return response()->json([
            "message"=>"Type Raw Material created Success",
            "data"=>$typeRawMaterial,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeRawMaterial  $typeRawMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(TypeRawMaterial $typeRawMaterial)
    {
        return response()->json([
            "message"=>"Get Type Raw Material Success",
            "data:"=>$typeRawMaterial,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeRawMaterial  $typeRawMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeRawMaterial $typeRawMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeRawMaterial  $typeRawMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeRawMaterial $typeRawMaterial)
    {
        $typeRawMaterial->update($request->all());
        return response()->json([
            "message"=>"Type Raw Material Updated Success.",
            "data"=>$typeRawMaterial,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeRawMaterial  $typeRawMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeRawMaterial $typeRawMaterial)
    {
        $typeRawMaterial->delete();
        return response()->json([
            "message"=>"Type Raw Material Deleted Success.",
            "data"=>$typeRawMaterial,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
