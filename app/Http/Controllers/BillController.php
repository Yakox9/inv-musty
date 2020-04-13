<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Order;
use App\Currency;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::all();
        foreach ($bills as $key => $bill) {
            $bill->id_currency =Currency::findOrFail($bill->id_currency)->name;
            $bill->id_order =Order::findOrFail($bill->id_order)->name;
        }
        return response()->json([
            "data"=>$bills,
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
        $bill = Bill::create($request->all());
        $bill->id_currency =Currency::findOrFail($bill->id_currency)->name;
        $bill->id_order =Order::findOrFail($bill->id_order)->name;
        return response()->json([
            "message"=>"Bill has been Successfully created",
            "data"=>$bill,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        $bill->id_currency =Currency::findOrFail($bill->id_currency)->name;
        $bill->id_order =Order::findOrFail($bill->id_order)->name;
        return response()->json([
            "message"=>"GET Bill has been Successfully",
            "data"=>$bill,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $bill->update($request->all());
        $bill->id_currency =Currency::findOrFail($bill->id_currency)->name;
        $bill->id_order =Order::findOrFail($bill->id_order)->name;
        return response()->json([
            "message"=>"GET Bill has been Successfully",
            "data"=>$bill,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();
        $bill->id_currency =Currency::findOrFail($bill->id_currency)->name;
        $bill->id_order =Order::findOrFail($bill->id_order)->name;
        return response()->json([
            "message"=>"GET Bill has been Successfully",
            "data"=>$bill,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
