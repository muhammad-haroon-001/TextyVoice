<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Emd\Blog;
use Illuminate\Http\Request;

class CustomArrayController extends Controller
{
    public function main_blog_page(){
        $blogs = Blog::where('status', 1)->get();
        $params = [
            'blogs' => $blogs
        ];
        return view('frontend.emd_blog_pages.blog',$params);
    }
    public function single_blog_page($slug){
        
        $blog = Blog::where('slug',$slug)->first();
        $params = [
            'blog' => $blog
        ];
        return view('frontend.emd_blog_pages.single_blog',$params);
    }
}
