<?php

namespace App\Services;

use App\Filters\FilterTrait;
use App\Models\Product;

class ProductService
{
    use FilterTrait;
    public function index(array $filters = [])
    {
        $products = Product::query();
        $this->ProductFilters($products, $filters);
        return $products->get();
    }
    public function store($data)
    {
        return Product::create($data);
    }

    public function update($data , $id)
    {

        $product=Product::where('id',$id)->first();
        $product->update($data);
        return $product;

    }
    public function delete($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product Deleted'], 200);
        }

        return response()->json(['message' => 'Product Not Found'], 404);
    }
}
