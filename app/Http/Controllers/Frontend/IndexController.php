<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{

    public function Index()
    {
        return view('frontend.index');
    }

    public function Login()
    {
        return view('auth.login');
    }

    public function LoginStore(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['status'] = 1;

        if (Auth::attempt($credentials)) {
            // The user is active, and the credentials are valid...
            return redirect()->intended('/');
        }

        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Hesabınız Engellenmiş veya Böyle Bir Hesap Kayıtlı Değil.',
                
            ]);
    }

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfileEdit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile_edit', compact('user'));
    }

    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        // $data->phone = $request->phone;

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
        ], [
            'name.required' => 'Zorunlu Alan.',
            'surname.required' => 'Zorunlu Alan.',
            'username.required' => 'Zorunlu Alan.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'E-posta formatı hatalıdır.',
        ]);



        $data->save();

        return redirect()->back()->with('success', 'İşlem başarılı!');
    }


    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_password_edit', compact('user'));
    }

    public function UserPasswordUpdate(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:8',
        ], [
            'oldpassword.required' => 'Zorunlu Alan.',
            'password.required' => 'Zorunlu Alan.',
            'password.min' => 'Minimumm 8 Karakter',
            'password.confirmed' => 'Şifreler Uyuşmuyor.',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        } else {
            return redirect()->back();
        }
    }
}
