<?php

namespace App\Http\Controllers;

use App\Product;
use App\Statu;
use App\TypeProduct;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        foreach ($products as $key => $product) {
            $product->id_status =Statu::findOrFail($product->id_status)->name;
            $product->id_type_product =TypeProduct::findOrFail($product->id_type_product)->name;
        }
        return response()->json([
            "data"=>$products,
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
        $product = Product::create($request->all());

        $product->id_status =Statu::findOrFail($product->id_status)->name;
        $product->id_type_product =TypeProduct::findOrFail($product->id_type_product)->name;
        return response()->json([
            "message"=>"Product has been Successfully created",
            "data"=>$product,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->id_status =Statu::findOrFail($product->id_status)->name;
        $product->id_type_product =TypeProduct::findOrFail($product->id_type_product)->name;
        return response()->json([
            "message"=>"Get Product has been Successfully",
            "data"=>$product,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        $product->id_status =Statu::findOrFail($product->id_status)->name;
        $product->id_type_product =TypeProduct::findOrFail($product->id_type_product)->name;
        return response()->json([
            "message"=>"Product has been Successfully Updated",
            "data"=>$product,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $product->id_status =Statu::findOrFail($product->id_status)->name;
        $product->id_type_product =TypeProduct::findOrFail($product->id_type_product)->name;
        return response()->json([
            "message"=>"Product has been Successfully Deleted",
            "data"=>$product,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
