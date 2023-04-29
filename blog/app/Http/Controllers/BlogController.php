<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    public function addBlog(){
        return view('admin.blog.add-blog',[
            'categories' => Category::all(),
            'authors'=> Author::all()
        ]);
    }

    public function saveBlog(Request $request){
        Blog::saveBlog($request);
        return back()->with('message','success');


}
    public function showBlog(){

//        To show what are the things return
//        $blog= DB::table('blogs')
//            ->join('categories','blogs.category_id','categories.id')
//            ->select('blogs.*','categories.category_name')
//            ->get();
//        return $blog;

        // Eloquent ORM

        //return $blog =Blog::where('status',1)->with('category:id,category_name')->get();
       // return $blog =Blog::where('status',1)->with('category:id,category_name','author')->get();

//        $blog = DB::table('blogs')
//            ->join('categories','blogs.category_id','categories.id')
//            ->join('authors','blogs.author_name','authors.author_name')
//            ->select('blogs.*','categories.category_name','authors.author_name')
//            ->get();
//        return $blog;




        return view('admin.blog.show-blog',[
            'blog'=> DB::table('blogs')
                ->join('categories','blogs.category_id','categories.id')
                ->join('authors','blogs.author_name','authors.author_name')
                ->select('blogs.*','categories.category_name','authors.author_name')
                ->get()
        ]);
    }

    public function editBlog($id){
        return view('admin.blog.blog-edit',[
            'blog'=>Blog::find($id)
        ]);
    }

    public function blogUpdate(Request $request){
        Blog::blogUpdate($request);
        return redirect('/show-blog');
    }

    public function blogDelete(Request $request){
        $blog= Blog::find($request->blog_id);
        if ($blog->image){
            unlink($blog->image);
        }
        $blog->delete();
        return redirect('/');
    }

}
