<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function getProductList() {
        $data = Product::paginate();
        return Response::json($data, 200);
    }

    public function getProduct($id) {
        $data = Cache::rememberForever($id, function () use ($id) {
            return Product::find($id);
        });
        return Response::json($data, 200);
    }

    public function createProduct(Request $request) {
        Product::create($request->all());
        return Response::json(['message' => 'Product is successfully created.'], 200);
    }
}
