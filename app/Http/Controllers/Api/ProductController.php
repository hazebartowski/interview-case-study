<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;

class ProductController extends BaseController
{
    protected $productRepository;

    public function __construct(ProductContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getProducts()
    {
        $products = $this->productRepository->listProducts();
        return $this->responseJson(false, 200, 'Products retrieved successfully', $products );
    }
}
