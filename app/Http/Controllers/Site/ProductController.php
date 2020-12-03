<?php

namespace App\Http\Controllers\Site;

use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Cart;

/**
 * Class ProductController
 * @package App\Http\Controllers
 * @author Haze Illias <hazreenaaida@gmail.com>
 */

class ProductController extends Controller
{
    protected $productRepository;
    protected $attributeRepository;

    public function __construct(ProductContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);

        return view('site.pages.product', compact('product'));
    }

    public function addToCart(Request $request)
    {
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'quantity');

        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('quantity'), $options);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}
