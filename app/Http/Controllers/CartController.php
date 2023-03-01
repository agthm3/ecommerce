<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_to_cart(Request $request, Product $product){
        $user_id = Auth::id();
        $product_id = $product->id;
        $existing_cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)->first();

        if($existing_cart == null){
            $request->validate([
                'amount' => 'required|gte:1|lte:'.$product->stock,
            ]);
            Cart::create([
                'user_id'=> $user_id, 
                'product_id' => $product_id, 
                'amount' => $request->amount
            ]);
        } else{
            $request->validate([
                    'amount' => 'required|gte:1|lte:'.($product->stock- $existing_cart->amount),
                ]);
            $existing_cart->update([
                'amount' => $existing_cart->amount + $request->amount
            ]);
        }





        return Redirect::route('show_cart');
    }
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        $user_id = Auth::id();

        $carts = Cart::where('user_id', $user_id)->get();

        return view('show_cart', compact('carts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'amount' => 'required|gte:1|lte:'.$cart->product->stock,
        ]);

        $cart->update([
            'amount'=> $request->amount
        ]);

        return Redirect::route('show_cart', compact('cart'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return Redirect::back();
    }
}
