<?php

namespace App\Http\Controllers;

use App\Order;
use App\Statu;
use App\User;
use App\Client;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        foreach ($orders as $key => $order) {
            $order->id_status =Statu::findOrFail($order->id_status)->name;
            $order->id_user =User::findOrFail($order->id_product)->name;
            $order->id_client =Client::findOrFail($order->id_order)->name;
        }
        return response()->json([
            "data"=>$orders,
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
        $order = Order::create($request->all());
        $order->id_status =Statu::findOrFail($order->id_status)->name;
        $order->id_user =User::findOrFail($order->id_product)->name;
        $order->id_client =Client::findOrFail($order->id_order)->name;
        return response()->json([
            "message"=>"Order has been Successfully created",
            "data"=>$order,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->id_status =Statu::findOrFail($order->id_status)->name;
        $order->id_user =User::findOrFail($order->id_product)->name;
        $order->id_client =Client::findOrFail($order->id_order)->name;
        return response()->json([
            "message"=>"GET Order has been Successfully",
            "data"=>$order,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        $order->id_status =Statu::findOrFail($order->id_status)->name;
        $order->id_user =User::findOrFail($order->id_product)->name;
        $order->id_client =Client::findOrFail($order->id_order)->name;
        return response()->json([
            "message"=>"Order has been Successfully Updated",
            "data"=>$order,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        $order->id_status =Statu::findOrFail($order->id_status)->name;
        $order->id_user =User::findOrFail($order->id_product)->name;
        $order->id_client =Client::findOrFail($order->id_order)->name;
        return response()->json([
            "message"=>"Order has been Successfully Deleted",
            "data"=>$order,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
