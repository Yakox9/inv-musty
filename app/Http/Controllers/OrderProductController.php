<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use App\Product;
use App\Statu;
use App\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderProducts = OrderProduct::all();
        foreach ($orderProducts as $key => $orderProduct) {
            $orderProduct->id_status =Statu::findOrFail($orderProduct->id_status)->name;
            $orderProduct->id_product =Product::findOrFail($orderProduct->id_product)->name;
            $orderProduct->id_order =Order::findOrFail($orderProduct->id_order)->name;
        }
        return response()->json([
            "data"=>$orderProducts,
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
        $orderProduct = OrderProduct::create($request->all());
        $orderProduct->id_status =Statu::findOrFail($orderProduct->id_status)->name;
        $orderProduct->id_product =Product::findOrFail($orderProduct->id_product)->name;
        $orderProduct->id_order =Order::findOrFail($orderProduct->id_order)->name;
        return response()->json([
            "message"=>"Order Product has been Successfully created",
            "data"=>$orderProduct,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProduct $orderProduct)
    {
        $orderProduct->id_status =Statu::findOrFail($orderProduct->id_status)->name;
        $orderProduct->id_product =Product::findOrFail($orderProduct->id_product)->name;
        $orderProduct->id_order =Order::findOrFail($orderProduct->id_order)->name;
        return response()->json([
            "message"=>"GET Order Product has been Successfully",
            "data"=>$orderProduct,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProduct $orderProduct)
    {
        $orderProduct->update($request->all());
        $orderProduct->id_status =Statu::findOrFail($orderProduct->id_status)->name;
        $orderProduct->id_product =Product::findOrFail($orderProduct->id_product)->name;
        $orderProduct->id_order =Order::findOrFail($orderProduct->id_order)->name;
        return response()->json([
            "message"=>" Order Product has been Successfully Updated",
            "data"=>$orderProduct,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProduct $orderProduct)
    {
        $orderProduct->delete();
        $orderProduct->id_status =Statu::findOrFail($orderProduct->id_status)->name;
        $orderProduct->id_product =Product::findOrFail($orderProduct->id_product)->name;
        $orderProduct->id_order =Order::findOrFail($orderProduct->id_order)->name;
        return response()->json([
            "message"=>" Order Product has been Successfully Deleted",
            "data"=>$orderProduct,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
