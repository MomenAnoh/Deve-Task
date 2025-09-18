<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
    public function index(Request $request)
    {
        $products = $this->service->index($request->all());
        return response()->json($products);
    }

    public function store(StoreProductRequest $request)
    {
        $data=$request->validated();
        $product = $this->service->store($data);
        return response()->json($product, 201);
    }

    public function update(UpdateProductRequest $request,$id)
    {
        $data=$request->validated();
        $product = $this->service->update($data,$id);
        return response()->json($product);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);   
    }
}
