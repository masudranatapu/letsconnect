<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use App\Blog;
use App\Category;
use App\Setting;
use DB;

class BlogController extends Controller
{
    public function index()
    {
    	 $blog =DB::table('blogs')
                ->join('categories', 'blogs.category_slug', 'categories.category_slug')
                ->select('blogs.*', 'categories.category_name')
                ->orderBy('id', 'DESC')->get();
    	 $settings = Setting::where('status', 1)->first();
    	 return view('admin.blog.index', compact('settings', 'blog'));
    }

    public function Create()
    {
    	 $settings = Setting::where('status', 1)->first();
         $category = Category::latest()->get();
    	 return view('admin.blog.create', compact('settings', 'category'));
    }

    public function Store(Request $request)
    {
    	 $request->validate([
    	 	'title' 		=> 'required|unique:blogs',
    	 	'category_slug' 	=> 'required',
    	 	'image' 		=> 'required',
    	 	'details' 		=> 'required'
    	 ]);

    	 $blog = new Blog;
    	 $blog->title  	     = $request->title;
    	 $blog->slug  	     = Str::slug($request->title, '-');
    	 $blog->category_slug  = $request->category_slug;
    	 $blog->details  	 = $request->details;
    	 $blog->tag  	 	 = $request->tag;
    	 $blog->author  	 = $request->author;
    	 $blog->date  	     = date('d-m-Y');
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name  = time() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/assets/blog/', $name);
            $blog->image = 'frontend/assets/blog/' . $name;
         }
        $blog->save();
        alert()->success(trans('Post Created Successfully!'));
        return redirect()->route('admin.blog');
    }

    public function Edit($id)
    {
    	 $blog = Blog::find($id);
    	 $settings = Setting::where('status', 1)->first();
         $category = Category::latest()->get();
    	 return view('admin.blog.edit', compact('settings','blog', 'category'));
    }

    public function Update(Request $request, $id)
    {
    	 $blog =Blog::find($id);
    	 $blog->title  	     = $request->title;
    	 $blog->slug  	     = Str::slug($request->title, '-');;
    	 $blog->category_slug  = $request->category_slug;
    	 $blog->details  	 = $request->details;
    	 $blog->tag  	 	 = $request->tag;
    	 $blog->author  	 = $request->author;
    	 $blog->date  	     = date('d-m-Y');
         if ($request->hasFile('image')) {
         	// delete old image
            $imagePath = $blog->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }          
            // add new image
            $image = $request->file('image');
            $name  = time() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/assets/blog/', $name);
            $blog->image = 'frontend/assets/blog/' . $name;
         }
        $blog->update();
        alert()->success(trans('Post Updated Successfully!'));
        return redirect()->route('admin.blog');
    }

  public function Delete(Request $request)
    {
       $blog = DB::table('blogs')->where('id', $request->query('id'))->first();
       if (file_exists($blog->image)) {
            unlink($blog->image);
        };
       $blog = DB::table('blogs')->where('id', $request->query('id'))->delete();
       alert()->success(trans('Post Deleted Successfully!'));
       return redirect()->route('admin.blog');
    }
}
