<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends Controller
{
    //

    public function index(){
        $products = Product::all();
        return view('products', compact('products'));
    }
    public function checkout(Request $request){

        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');

        \Stripe\Stripe::setApiKey(env(key:'STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $name,
                            'description' => $description
                        ],
                        'unit_amount' => $price * 100,
                    ],
                    'quantity' => 1
                                
                ]
            ],
            'mode' => 'payment',
            'success_url' => route(name: 'products'),
            'cancel_url' => route(name: 'products')
        ]);
        return redirect()->away($session->url);
    }
}
