<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
  public function addCategory(){

          return view('admin.category.add-category');
  }
    public function manageCategory(){

         return view('admin.category.manage-category',[
            'categories'=>Category::all()
         ]);
    }
    public function saveCategory(Request $request){
          Category::saveCategory($request);
          return back();


    }
    public function editCategory( $id){
           return view('admin.category.category-edit',[
          'category'=>Category::find($id)
      ]);
    }
    public function categoryUpdate(Request $request){
           Category::categoryUpdate($request);
           return redirect('/manage-category');
    }

    public function showCategory($id){
      $categoryWiseBlog = Blog::where('category_id',$id)->where('status',1)->get();
       $temp = $categoryWiseBlog->first()->id;
//          $blogID = DB::table('blogs')
//            ->join('categories','blogs.category_id','categories.id')
//            ->select('blogs.*','categories.category_name')
//            ->first();
       // return $blogID;

        //return $temp;



//        $commentDetails = Comment::where('blog_id', $blogID->id)->get();
//        if (is_null($commentDetails)){
//            $commentDetails=0;
//        }
        //return $commentDetails;

        $commentCount = DB::table('comments')
            ->where('blog_id',$temp)
            ->count();
        //return $commentCount;



      return view('frontEnd.blog.category-blog',[
         'categoryWiseBlog' => $categoryWiseBlog,
//          'comment'  => $commentDetails
          'comment' => Comment::all(),
          'commentCount' =>$commentCount,
          'categoryDetails' => Category::all()


      ]);

    }



}
