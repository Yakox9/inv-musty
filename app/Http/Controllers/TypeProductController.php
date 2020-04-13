<?php

namespace App\Http\Controllers;

use App\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeProduct = TypeProduct::all();
        return response()->json([
            "data"=>$typeProduct,
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
        $typeProduct = TypeProduct::create($request->all());
        return response()->json([
            "message"=>"Type Product created Success",
            "data"=>$typeProduct,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function show(TypeProduct $typeProduct)
    {
        return response()->json([
            "message"=>"Get Type Product Success",
            "data:"=>$typeProduct,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeProduct $typeProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeProduct $typeProduct)
    {
        $typeProduct->update($request->all());
        return response()->json([
            "message"=>"Type Product Updated Success.",
            "data"=>$typeProduct,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeProduct $typeProduct)
    {
        $typeProduct->delete();
        return response()->json([
            "message"=>"Type Product Deleted Success.",
            "data"=>$typeProduct,
            "status"=>Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
