<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    public function BlogAdd()
    {
        return view('frontend.blog.add_blog');
    }

    public function AllBlog()
    {
        $blogs = Blog::where('status', 1)->where('date', '<=', Carbon::now()->locale('en')->isoFormat('DD MMMM YYYY'))->orderBy('created_at', 'DESC')->get();
        return view('frontend.blog.all_blog', compact('blogs'));
    }

    public function BlogDetails($id)
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.blog.blog_details', compact('blog'));
    }

    public function BlogStore(Request $request)
    {

        if ($request->file('photo')) {


            if ($request->date != NULL) {

                $image = $request->file('photo');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

                Image::make($image)->resize(870, 450)->save('upload/blog/' . $name_gen);
                $save_url = 'upload/blog/' . $name_gen;

                Blog::insert([

                    'user_id' => $request->user_id,
                    'title' => $request->title,
                    'description' => $request->description,
                    'date' => Carbon::createFromFormat('Y-m-d', $request->input('date'))->format('d F Y'),
                    'photo' => $save_url,
                    'created_at' => Carbon::now(),
                ]);

                $notification = array(
                    'message' => 'Blog Eklendi',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            } else {
                $image = $request->file('photo');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

                Image::make($image)->resize(870, 450)->save('upload/blog/' . $name_gen);
                $save_url = 'upload/blog/' . $name_gen;

                Blog::insert([

                    'user_id' => $request->user_id,
                    'title' => $request->title,
                    'description' => $request->description,
                    'date' => Carbon::now()->locale('en')->isoFormat('DD MMMM YYYY'),
                    'photo' => $save_url,
                    'created_at' => Carbon::now(),
                ]);

                $notification = array(
                    'message' => 'Blog Eklendi',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            }
        } else {


            if ($request->date != NULL) {
                Blog::insert([

                    'user_id' => $request->user_id,
                    'title' => $request->title,
                    'description' => $request->description,
                    'date' => Carbon::createFromFormat('Y-m-d', $request->input('date'))->format('d F Y'),
                    'created_at' => Carbon::now(),
                ]);

                $notification = array(
                    'message' => 'Blog Eklendi',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            } else {
                Blog::insert([

                    'user_id' => $request->user_id,
                    'title' => $request->title,
                    'description' => $request->description,
                    'date' => Carbon::now()->locale('en')->isoFormat('DD MMMM YYYY'),
                    'created_at' => Carbon::now(),
                ]);

                $notification = array(
                    'message' => 'Blog Eklendi',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            }
        }
    }
}
