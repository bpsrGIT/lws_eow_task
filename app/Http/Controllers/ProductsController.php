<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Request;

class ProductsController extends Controller
{
    //Make new product
    public function newProduct(StoreProductRequest $request){
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'isActive' => 'true'
        ]);
        return new ProductResource($product);
    }

    //Edit product details
    public function editProduct(Request $request, Product $product){
        $product->update([
            'name' => $request::input('name'),
            'description' => $request::input('description'),
            'price' => $request::input('price'),
            'quantity' => $request::input('quantity')
        ]);
        return new ProductResource($product);
    }

    //get specific product
    public function getSpecificProduct(Product $product){
        return new ProductResource($product);
    }

    //Get all products
    public function getProducts(){
        return ProductResource::collection(Product::all());
    }

    //Activate product
    public function activateProduct(Product $product){
        $product->update([
            'isActive' => 1
        ]);
        return new ProductResource($product);
    }

    //Deactivate Product
    public function deactivateProduct(Product $product){
        $product->update([
            'isActive' => 0
        ]);
        return new ProductResource($product);
    }
}
