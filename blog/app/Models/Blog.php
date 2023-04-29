<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    private static $str,$blog,$image,$imageNewName,$directory,$imageUrl,$update;


    public static function saveBlog($request){
        self::$blog=new Blog();
        self::$blog->category_id=$request->category_id;
        self::$blog->author_name=$request->author_name;
        self::$blog->title=$request->title;
        self::$blog->slug=self::makeSlug($request);
        self::$blog->description=$request->description;
        self::$blog->date=$request->date;
        self::$blog->status=$request->status;
        self::$blog->blog_type=$request->blog_type;


        if ($request->file('image')) {
            self::$blog->image       =self::saveImage($request);
        }
        else{
            self::$blog->image='image';
        }

        self::$blog->save();
    }

    private static function saveImage($request){
        self::$image= $request->file('image');
        self::$imageNewName='blog-'.rand().'.'.self::$image->Extension();
        self::$directory='admin-assets/upload-image/blog/';
        self::$imageUrl=self::$directory.self::$imageNewName;
        self::$image->move(self::$directory,self::$imageNewName);
        return self::$imageUrl;
    }


    private static function makeSlug($request){
        if ($request->slug){
            $str =  $request->slug;
            return preg_replace('/\s+/u','-',trim($str));
        }
        else {
            $str = $request->title;
            return preg_replace('/\s+/u','-',trim($str));
        }



    }

    public static function blogUpdate($request){
        self::$update                 = Blog::find($request->blog_id);
        self::$update->author_name   = $request->author_name;
        self::$update->title  = $request->title;
        self::$update->status  = $request->status;
        self::$update->blog_type  = $request->blog_type;





        if ($request->file('image')){
            if (self::$update->image){
                if (file_exists(self::$update->image)){
                    unlink(self::$update->image);
                    self::$update->image = self::saveImage($request);
                }

            }
            else {
                self::$update->image = self::saveImage($request);
            }
        }
        self::$update->save();

    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(Author::class);
    }




}
