<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductsController extends Controller
{
  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Make new product
    public function newProduct(StoreProductRequest $request){
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity')
        ]);

        return new ProductResource($product);
    }

        /**
     * Show the form for editing the specified resource.
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    //Edit product details
    public function editProduct(UpdateProductRequest $request, Product $product){
        $product->update([
            'name' => $request->input('name')

        ]);

        return new ProductResource($product);
    }

            /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    //Edit product details
    public function getSpecificProduct(Product $product){
        return new ProductResource($product);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Get all products
    public function getProducts(){
        return ProductResource::collection(Product::all());
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    //Activate product
    public function activateProduct(Product $product){
        $product->update([
            'isActive' => 'true'
        ]);
        return new ProductResource($product);
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    //Deactivate Product
    public function deactivateProduct(Product $product){
        $product->update([
            'isActive' => 'false'
        ]);
        return new ProductResource($product);
    }
}
