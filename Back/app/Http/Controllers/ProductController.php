<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartProduct;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ["products" => ProductResource::collection(Product::get())];
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
    public function newProduct(Request $request)
    {
        //
        if (Gate::denies('seller-add-Product')) {
            return [
                "Success" => false,
                "error message" => "user Can't add a product, only seller can"
            ];
        }

        $product = new Product();
        $product->name = $request->name;
        $product->user_id = Auth::user()->id;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return $product;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
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
        if (Gate::denies('seller-add-Product')) {
            return [
                "Success" => false,
                "error message" => "user Can't update a product, only seller can"
            ];
        }
        //
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (Gate::denies('seller-add-Product')) {
            return [
                "Success" => false,
                "error message" => "user Can't delete a product, only seller can"
            ];
        }
        //
        $product->delete();
        return 'deleted';
    }

    public function productByCategory($categoryId)
    {

        return Product::get()->where("category_id", $categoryId);
    }

    public function addToCard(Request $request)
    {
        if (Gate::denies('user-add-Product-to-cart')) {
            return [
                "Success" => false,
                "error message" => "Selllers Can't buy a product, you need a user account to be able to perform this action "
            ];
        }
        $cp = CartProduct::GetIfProductExist($request->product_id);

        $cp->cart_id = Cart::getActiveCartIfExist(Auth::user()->id)->id;

        $cp->product_id = $request->product_id;
        $cp->quantity = $request->quantity;

        $cp->save();

        return $cp;
    }
}
