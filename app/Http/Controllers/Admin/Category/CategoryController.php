<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function category(){

        $category = Category::all();
        return view('admin.category.category',compact('category'));
    }

    public function storecategory(Request $request){

        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        $data = array();
        $data['category_name'] = $request->category_name;
        DB::table('categories')->insert($data);
        $notification=array(
            'messege'=>'Category Added Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}
