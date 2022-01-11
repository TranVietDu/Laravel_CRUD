<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ItWork;
use App\Models\PricingPlan;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories=Category::all();
        $products=Product::take(6)->get();
        $pricing_plans=PricingPlan::take(3)->get();
        $it_works=ItWork::take(3)->get();
        return view('home',compact('categories','products','pricing_plans','it_works'));
    }
}
