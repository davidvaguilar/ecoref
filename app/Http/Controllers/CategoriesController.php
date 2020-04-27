<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category){
        
        //return $category;
        //return $category->load('posts');  como array
        $title = "Publicaciones de la categoria '{$category->name}'";
        $posts = $category->posts()->paginate(1);
        return view('pages.home', compact('title','posts'));
    }
}
