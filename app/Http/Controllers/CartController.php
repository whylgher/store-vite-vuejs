<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $products = Cart::all()->where('user_id', '=', $user->id);

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
