<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Setting;
use DB;

class CategoryController extends Controller
{
    public function Index()
    {
    	$settings = Setting::where('status', 1)->first();
    	$category = Category::latest()->get();
    	return view('admin.category.index', compact('settings', 'category'));
    }

    public function Create()
    {
    	$settings = Setting::where('status', 1)->first();
    	return view('admin.category.create', compact('settings'));
    }

    public function Store(Request $request )
    {
    	$request->validate([
    		 'category_name' => 'required|unique:categories'
    	]);

    	$category = new Category;
    	$category->category_name = $request->category_name;
    	$category->category_slug = Str::slug($request->category_name, '-');
        $category->save();
    	alert()->success(trans('Category Created Successfully!'));
        return redirect()->route('admin.category.index');
    }

    public function Edit($id)
    {
    	 $category = Category::find($id);
    	 $settings = Setting::where('status', 1)->first();
    	 return view('admin.category.edit', compact('settings','category'));
    }

    public function Update(Request $request, $id)
    { 
        $request->validate([
             // 'category_name' => 'required|unique:categories';
             'category_name' => 'unique:categories,category_name,'.$id
        ]);

		$category = Category::find($id);
		$category->category_name = $request->category_name;
		$category->category_slug = Str::slug($request->category_name, '-');
		$category->update();
		alert()->success(trans('Category Updated Successfully!'));
    	return redirect()->route('admin.category.index');
    }

    public function Delete(Request $request)
    {
    	 $category = DB::table('categories')->where('id', $request->query('id'))->delete();
    	 alert()->success(trans('Category Deleted Successfully!'));
         return redirect()->route('admin.category.index');
    }
}

