<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    private static $author,$str,$image,$imageNewName,$directory,$imageUrl,$update;


    public static function saveAuthor($request){
        self::$author = new Author();
        self::$author->author_name = $request->author_name;
        if ($request->file('image')) {
            self::$author->image       =self::saveImage($request);
        }
        else{
            self::$author->image='image';
        }

        self::$author->save();
    }

    private static function saveImage($request){
        self::$image= $request->file('image');
        self::$imageNewName='author-'.rand().'.'.self::$image->Extension();
        self::$directory='admin-assets/upload-image/author/';
        self::$imageUrl=self::$directory.self::$imageNewName;
        self::$image->move(self::$directory,self::$imageNewName);
        return self::$imageUrl;
    }





}
