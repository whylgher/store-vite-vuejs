<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Cart::all();

        return response()->json([
            'products' => $products
        ], 200);
    }

    public function show(Cart $cart)
    {
        return response()->json([
            'cart' => $cart
        ], 200);
    }

    public function store(Request $request)
    {
        $cart = Cart::create($request->all());

        $response = [
            'success' => true,
            'data' => $cart,
            'message' => 'successfully'
        ];

        return response()->json($response, 200);
    }
}
