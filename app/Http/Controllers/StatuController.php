<?php

namespace App\Http\Controllers;

use App\Statu;
use App\TypeStatu;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StatuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Statu::all();
        foreach ($status as $key => $statu) {
            $statu->id_type_status = TypeStatu::findOrFail($statu->id_type_status)->name;
        }
        return response()->json([
            "data"=>$status,
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
        $status = Statu::create($request->all());
        $status->id_type_status = TypeStatu::findOrFail($status->id_type_status)->name;
        return response()->json([
            "message"=>"Status created Success",
            "data"=>$status,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statu  $statu
     * @return \Illuminate\Http\Response
     */
    public function show(Statu $status)
    {

        $status->id_type_status = TypeStatu::findOrFail($status->id_type_status)->name;
        return response()->json([
            "message"=>"Get Status Success",
            "data:"=>$status,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statu  $statu
     * @return \Illuminate\Http\Response
     */
    public function edit(Statu $statu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statu  $statu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statu $status)
    {
        $status->update($request->all());
        $status->id_type_status = TypeStatu::findOrFail($status->id_type_status)->name;
        return response()->json([
            "message"=>"Status Updated Success.",
            "data"=>$status,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statu  $statu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statu $statu)
    {
        $status->delete();
        $status->id_type_status = TypeStatu::findOrFail($status->id_type_status)->name;
        return response()->json([
            "message"=>"Status Deleted Success.",
            "data"=>$status,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
