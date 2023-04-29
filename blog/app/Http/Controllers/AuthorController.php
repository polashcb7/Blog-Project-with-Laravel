<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        return view('admin.author.add-author');
    }

    public function saveAuthor(Request $request){
        Author::saveAuthor($request);
        return back();
        //return back()->with('message','success');
    }
}
