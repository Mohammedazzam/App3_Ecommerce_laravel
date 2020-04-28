<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function brand(){
        $brand = Brand::all();
        return view('admin.category.brand',compact('brand'));
    }
    public function storebrand(){

    }
}
