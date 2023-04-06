<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
