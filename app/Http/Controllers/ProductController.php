<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {

        return view('products.create');
    }



    public function store(Request $request)
    {


        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'details' => 'required|string',
                'price' => 'required|integer|min:0',
            ]);

            $product = new Product();
            $product->name = $validatedData['name'];
            $product->details = $validatedData['details'];
            $product->price = $validatedData['price'];
            $product->save();
            return  back()->with('success', 'created successfully');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getmessage());
        }
    }
}
