<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'products' => $products
        ], 200);
    }

    public function show(Product $product)
    {
        return response()->json([
            'product' => $product
        ], 200);
    }

    public function store(Request $request)
    {
        $photo = $request->photo;
        if ($photo) {
            $name = 'product_' . time() . '.' . $photo->getClientOriginalExtension();
            $request->photo->storeAs('public/upload', $name);
            $urlPhoto = 'storage/upload/' . $name;
        }

        $product = Product::create([
            'name' => $request->name,
            'photo' => $urlPhoto,
            'price' => $request->price,
            'description' => $request->description,
            'details' => $request->details,
        ]);

        return response()->json([
            'product' => $product
        ], 200);
    }

    public function update(
        Request $request,
        Product $product,
    ) {
        $photo = $request->photo;
        $urlPhoto = '';
        if ($photo && $photo != 'null') {
            $name = 'product_' . time() . '.' . $photo->getClientOriginalExtension();
            $request->photo->storeAs('public/upload', $name);
            $urlPhoto = 'storage/upload/' . $name;

            $old_photo = $product->photo;
            if (File::exists($old_photo)) {
                File::delete($old_photo);
            }
        } else {
            $urlPhoto = $product->photo;
        }
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $urlPhoto,
            'details' => $request->details,
            'price' => $request->price,
        ]);
        return response()->json("Product updated");
    }

    public function destroy(Product $product)
    {
        $photo = $product->photo;
        if (File::exists($photo)) {
            File::delete($photo);
        };

        $product->delete();

        return response()->json("Product delete");
    }
}
