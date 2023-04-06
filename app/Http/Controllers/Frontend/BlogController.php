<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function BlogAdd()
    {
        return view('frontend.blog.add_blog');
    }

    public function BlogStore() {
        
    }
}
