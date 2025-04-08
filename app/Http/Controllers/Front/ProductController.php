<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubPlan;
class ProductController extends Controller
{
    public function index()
    {
        $data = Product::active()->get();
        return view('front.product.index', compact('data'));
    }
    public function show($slug)
    {   
        $subplans = SubPlan::active()->get();
        $data = Product::active()->where('slug', $slug)->first();
        if($data == null)
        {
            return redirect()->route('front.index');
        }

        return view('front.product.show', compact('data','subplans'));
    }
}
