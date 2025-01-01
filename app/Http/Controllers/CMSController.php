<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CMSController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(5);
        return view('home', compact('blogs'));
    }

    public function getBlog($id)
    {
        $blog = Blog::with('comments')->findOrFail($id);
        // dd ($blog);
        // exit;
        preg_match('/<img[^>]+src="([^">]+)"/', $blog->content, $matches);

        $backgroundImageUrl = $matches[1] ?? asset('assets/blogs/img/post-bg.jpg');
        return view('blog_detail', compact('blog', 'backgroundImageUrl'));
    }

    public function about()
    {
        return view('about');
    }
    public function test()
    {
        return view('test');
    }


  

}
