<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{ private static $category,$image,$imageNewName,$directory,$imageUrl,$update,$categories;
    use HasFactory;

    public static function saveCategory($request){
        self::$category=new Category();
        self::$category->category_name=$request->category_name;
        if ($request->file('image')) {
            self::$category->image       =self::saveImage($request);
        }
        else{
            self::$category->image='image';
        }
        self::$category->save();
    }
    private static function saveImage($request){
      self::$image= $request->file('image');
     self::$imageNewName='category-'.rand().'.'.self::$image->Extension();
     self::$directory='admin-assets/upload-image/category/';
     self::$imageUrl=self::$directory.self::$imageNewName;
     self::$image->move(self::$directory,self::$imageNewName);
     return self::$imageUrl;

    }

    public static function categoryUpdate($request){
        self::$update                 = Category::find($request->category_id);
        self::$update->category_name  =$request->category_name;

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

}
