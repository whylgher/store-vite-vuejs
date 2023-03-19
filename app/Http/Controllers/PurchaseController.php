<?php

namespace App\Http\Controllers;

use App\Mail\purchaseMade;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PurchaseController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $user = Auth::user();
        Mail::to($user)->send(new purchaseMade($user));
        $products = Cart::all()->where('user_id', '=', $user->id);

        foreach ($products as $product) {
            $product->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Purchase made successfully'
        ],);
    }
}
