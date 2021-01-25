<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::class;

        return view('pages.product.index',compact('product'));
    }

    public function create()
    {
        return view('pages.product.create');
    }

    public function edit($id)
    {
        return view('pages.product.edit',compact('id'));
    }
}
