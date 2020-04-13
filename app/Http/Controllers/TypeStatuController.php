<?php

namespace App\Http\Controllers;

use App\TypeStatu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class TypeStatuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $typeStatus = TypeStatu::all();
        return response()->json([
            "data"=>$typeStatus,
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

        $typeStatus = TypeStatu::create($request->all());
        return response()->json([
            "message"=>"Type Status created Success",
            "data"=>$typeStatus,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeStatu  $typeStatu
     * @return \Illuminate\Http\Response
     */
    public function show(TypeStatu $typeStatus)
    {
        return response()->json([
            "message"=>"Get Type Status Success",
            "data:"=>$typeStatus,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeStatu  $typeStatu
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeStatu $typeStatu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeStatu  $typeStatu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeStatu $typeStatus)
    {

        $typeStatus->update($request->all());
        return response()->json([
            "message"=>"Type Status Updated Success.",
            "data"=>$typeStatus,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeStatu  $typeStatu
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeStatu $typeStatus)
    {
        $typeStatus->delete();
        return response()->json([
            "message"=>"Type Status Deleted Success.",
            "data"=>$typeStatus,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
