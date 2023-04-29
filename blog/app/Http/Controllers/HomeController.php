<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Session;
use DB;

class HomeController extends Controller
{
    public function index(){

         $blog = Blog::where('status',1)->with('category:id,category_name')->take(7)->get();
        return view('frontEnd.home.home',[
            'blogs' => $blog
            ]);
//        return view('frontEnd.home.home',[
////            'blogs'=>Blog::where('status',1)
////            ->take(3)
////            ->get(),
//
//        ]);
    }

    public function blogDetails ($slug){
//    return $blogDetails = Blog::where('slug',$slug)->get();
        $blogDetails = Blog::where('slug',$slug)->first();
        //return $blogDetails;
        $commentDetails = Comment::where('blog_id', $blogDetails->id)->get();
        if (is_null($commentDetails)){
            $commentDetails=0;
        }

        //$tcomment = count($comment);
        return view('frontEnd.blog.blog-details',[
            'blogDetails' => $blogDetails,
            'comment'  => $commentDetails,
            'categoryDetails' => Category::all(),
            'authorDetails' => Author::all()


        ]);

    }

    public function blogUserRegister(){
        return view('frontEnd.user.register');
    }
    public function saveUser(Request $request){
        Customer::saveUser($request);
        return redirect('/');

    }

    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return back();
    }

    public function customerLogin(){
        return view('frontEnd.user.user-login');
    }
    public function customerLoginCheck(Request $request){
        $customerInfo = Customer::where('email',$request->user_name)
            ->orWhere('phone',$request->user_name)
            ->first();
        if ($customerInfo){
            $existingPassword=$customerInfo->password;
            if (password_verify($request->password,$existingPassword)){
                Session::put('customerId',$customerInfo->id);
                Session::put('customerName',$customerInfo->name);
                return redirect('/');
            }
            else{
                return back()->with('message','Please enter a valid password');

            }

        }
        else{
            return back()->with('message','Please Use Valid email or Phone');
        }

    }

    public function saveComment(Request $request){
        Comment::saveComment($request);
        return back();

    }

    public function showCategory($id){
        $categoryWiseBlog = Blog::where();

    }

}
