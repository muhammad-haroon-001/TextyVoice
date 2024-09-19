<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Emd\Blog;
use Illuminate\Http\Request;

class CustomArrayController extends Controller
{
    public function main_blog_page(){
        $blogs = Blog::with('image')->where('status', 1)->get();
        $blogsArray = $blogs->toArray();

        foreach ($blogs as $index => $blog) {
            $images = json_decode($blog->image->dimensions, true);
            $blogsArray[$index]['images'] = $images;
        }
        $params = [
            'blogs' => $blogsArray,
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
