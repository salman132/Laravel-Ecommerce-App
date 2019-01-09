<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;
use Stripe\Stripe;
use Stripe\Charge;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        return view('checkout');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pid' => 'required|integer',

        ]);

        $pid = Product::find($request->pid);

        Cart::add([
            'id'=> $pid->id,
            'name'=> $pid->product,
            'price'=> $pid->price,
            'quantity' => $request->qty,
            'attributes' => [
                'image'=> $pid->image,
            ]

        ]);




        return redirect()->route('cart.show');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('carts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function remove($id){
        Cart::remove($id);

        return redirect()->route('cart.show');
    }



    public function minus($id){
        Cart::update($id,[
            'quantity'=> -1
        ]);

        return redirect()->back();


    }

    public function plus($id){
        Cart::update($id,[
            'quantity'=> 1
        ]);

        return redirect()->back();
    }

    public function  pay(){
        Stripe::setApiKey("sk_test_slDogfWuH3cwhLVJWAEmqcJV");

        $token = \request()->stripeToken();

        $charge =Charge::create([
            'amount' => Cart::getSubTotal() * 100,
            'currency' => 'usd',
            'description' => 'User Webiste',
            'source' => $token
        ]);

        dd('Thank Tou');
    }
}
