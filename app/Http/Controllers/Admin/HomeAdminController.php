<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index(){
        $users=User::where('role',0)->count();
        $admins=User::where('role',1)->count();
        $products=Product::count();
        $categories=Category::count();
        return view('admin.user.dashboard',compact('users','admins','products','categories'));

    }
}
