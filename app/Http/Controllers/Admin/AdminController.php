<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Reviews;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.index');
    }

    public function AllUser()
    {
        $users = User::where('role', 1)->orderBy('created_at', 'ASC')->get();
        return view('admin.user.all_user', compact('users'));
    }

    public function UserInactive($id)
    {
        User::findOrFail($id)->update(['status' => 0]);

        return redirect()->back();
    }

    public function UserActive($id)
    {
        User::findOrFail($id)->update(['status' => 1]);

        return redirect()->back();
    }

    // Start Blog

    public function AllBlog()
    {
        $blogs = Blog::all();
        return view('admin.blog.all_blog', compact('blogs'));
    }

    public function EditBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        return view('admin.blog.edit_blog', compact('blogs'));
    }


    public function UpdateBlog(Request $request)
    {
        $blog_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('photo')) {


            if ($request->date != NULL) {


                if ($old_img != NULL) {
                    unlink($old_img);
                }

                $image = $request->file('photo');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

                Image::make($image)->resize(870, 450)->save('upload/blog/' . $name_gen);
                $save_url = 'upload/blog/' . $name_gen;

                Blog::findOrFail($blog_id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'date' => Carbon::createFromFormat('Y-m-d', $request->input('date'))->format('d F Y'),
                    'photo' => $save_url,
                ]);

                $notification = array(
                    'message' => 'Blog Güncellendi.',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            } else {
                if ($old_img != NULL) {
                    unlink($old_img);
                }

                $image = $request->file('photo');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

                Image::make($image)->resize(870, 450)->save('upload/blog/' . $name_gen);
                $save_url = 'upload/blog/' . $name_gen;

                Blog::findOrFail($blog_id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'date' => Carbon::now()->locale('en')->isoFormat('DD MMMM YYYY'),
                    'photo' => $save_url,
                ]);

                $notification = array(
                    'message' => 'Blog Güncellendi.',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            }
        } else {

            if ($request->date != NULL) {
                Blog::findOrFail($blog_id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'date' => Carbon::createFromFormat('Y-m-d', $request->input('date'))->format('d F Y'),
                ]);

                $notification = array(
                    'message' => 'Blog Güncellendi.',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            } else {
                Blog::findOrFail($blog_id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'date' => Carbon::now()->locale('en')->isoFormat('DD MMMM YYYY'),
                ]);

                $notification = array(
                    'message' => 'Blog Güncellendi.',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            }
        }
    }

    public function DeleteBlog($id)
    {
        $blogs = Blog::findorFail($id);
        $img = $blogs->photo;

        if ($img != NULL) {
            unlink($img);
        }

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Slindi.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function BlogInactive($id)
    {
        Blog::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Blog PAsif Edildi.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function BlogActive($id)
    {
        Blog::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Blog Aktif Edildi.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    // End Blog

    // Start Blog

    public function AllReview()
    {
        $reviews = Reviews::all();
        return view('admin.reviews.all_reviews', compact('reviews'));
    }

    public function EditReview($id)
    {
        $reviews = Reviews::findOrFail($id);
        return view('admin.reviews.edit_reviews', compact('reviews'));
    }


    public function UpdateReview(Request $request)
    {
        $review_id = $request->id;

        Reviews::findOrFail($review_id)->update([
            'comment' => $request->comment,
        ]);

        $notification = array(
            'message' => 'Yorum Güncellendi.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteReview($id)
    {
        
        Reviews::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Yorum Slindi.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ReviewInactive($id)
    {
        Reviews::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Yorum Pasif Edildi.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function ReviewActive($id)
    {
        Reviews::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Yorum Aktif Edildi.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    // End Blog
}
