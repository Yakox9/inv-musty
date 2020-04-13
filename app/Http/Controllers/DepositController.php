<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Product;
use App\RawMaterial;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::all();
        foreach ($deposits as $key => $deposit) {
            $deposit->id_product =Product::findOrFail($deposit->id_product)->name;
            $deposit->id_raw_material =RawMaterial::findOrFail($deposit->id_raw_material)->name;
        }
        return response()->json([
            "data"=>$deposits,
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
        $deposit = Deposit::create($request->all());
        $deposit->id_product =Product::findOrFail($deposit->id_product)->name;
        $deposit->id_raw_material =RawMaterial::findOrFail($deposit->id_raw_material)->name;
        return response()->json([
            "message"=>"Deposit has been Successfully created",
            "data"=>$deposit,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        $deposit->id_product =Product::findOrFail($deposit->id_product)->name;
        $deposit->id_raw_material =RawMaterial::findOrFail($deposit->id_raw_material)->name;
        return response()->json([
            "message"=>"Get Deposit has been Successfully",
            "data"=>$deposit,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        $deposit->update($request->all());
        $deposit->id_product =Product::findOrFail($deposit->id_product)->name;
        $deposit->id_raw_material =RawMaterial::findOrFail($deposit->id_raw_material)->name;
        return response()->json([
            "message"=>"Deposit has been Successfully Updated",
            "data"=>$deposit,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        $deposit->delete();
        $deposit->id_product =Product::findOrFail($deposit->id_product)->name;
        $deposit->id_raw_material =RawMaterial::findOrFail($deposit->id_raw_material)->name;
        return response()->json([
            "message"=>"Deposit has been Successfully Updated",
            "data"=>$deposit,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
