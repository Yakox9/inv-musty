<?php

namespace App\Http\Controllers;

use App\ProductMaterial;
use App\Product;
use App\RawMaterial;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class ProductMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productMaterials = ProductMaterial::all();
        foreach ($productMaterials as $key => $PM) {
            $PM->id_product =Product::findOrFail($PM->id_product)->name;
            $PM->id_raw_material =RawMaterial::findOrFail($PM->id_raw_material)->name;
        }
        return response()->json([
            "data"=>$productMaterials,
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
        $productMaterial = ProductMaterial::create($request->all());

        $productMaterial->id_product =Product::findOrFail($productMaterial->id_product)->name;
        $productMaterial->id_raw_material =RawMaterial::findOrFail($productMaterial->id_raw_material)->name;
        return response()->json([
            "message"=>"Product Material created Success",
            "data"=>$productMaterial,
            "status"=>Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductMaterial  $productMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(ProductMaterial $productMaterial)
    {
        $productMaterial->id_product =Product::findOrFail($productMaterial->id_product)->name;
        $productMaterial->id_raw_material =RawMaterial::findOrFail($productMaterial->id_raw_material)->name;
        return response()->json([
            "data"=>$productMaterial,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductMaterial  $productMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductMaterial $productMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductMaterial  $productMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductMaterial $productMaterial)
    {
        $productMaterial->update($request->all());
        $productMaterial->id_product =Product::findOrFail($productMaterial->id_product)->name;
        $productMaterial->id_raw_material =RawMaterial::findOrFail($productMaterial->id_raw_material)->name;
        return response()->json([
            "data"=>$productMaterial,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductMaterial  $productMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductMaterial $productMaterial)
    {
        $productMaterial->delete();
        return response()->json([
            "data"=>$productMaterial,
            "status"=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
