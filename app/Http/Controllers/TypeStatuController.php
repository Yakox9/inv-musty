<?php

namespace App\Http\Controllers;

use App\TypeStatu;
use Illuminate\Http\Request;

class TypeStatuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TypeStatu::get();
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
        return TypeStatu::createTypeStatus($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeStatu  $typeStatu
     * @return \Illuminate\Http\Response
     */
    public function show(TypeStatu $typeStatu)
    {
        return $typeStatu;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeStatu  $typeStatu
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeStatu $typeStatu)
    {
        return $typeStatu;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeStatu  $typeStatu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeStatu $typeStatu)
    {
        return $typeStatu->updateTypeStatus($request,$typeStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeStatu  $typeStatu
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeStatu $typeStatu)
    {
        try{

            $typeStatu->delete();
            return true;
        }catch  (Exception $e) {
            return false;
        }
    }
}
