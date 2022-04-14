<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;

class LoginController extends Controller
{
    public function userLogin(){
        $credentials = request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $remember = false;
        if(request()->remember != null){
            $remember = true;
        }
        if(Auth::attempt($credentials,$remember)){
            request()->session()->regenerate();
            return redirect()->route('welcome');
        }else {
            return back()->withErrors(['message' => 'Email atau Password Salah !']);
        }
    }
    public function userlogout(){
        Auth::logout();
        //login dua user (admin dan user) pasti akan logout keduanya gara-gara ini fungsi
        //makannya jangan rangkap jabatan ye
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('user.login');
    }

    public function userRegister(){
        $credentials = request()->validate([
            'email'=>'required|unique:users|email',
            'name'=>'required',
            'password'=>'required',
            'password_confirmation'=>'confirmed'
        ]);
        $user = User::create([
            'email'=>request()->email,
            'name'=>request()->name,
            'status'=>"Aktif",
            'password'=>bcrypt(request()->password)
        ]);
        // langsung login setelah register untuk verifikasi
        $user->sendEmailVerificationNotification();
        Auth::attempt($credentials);
        request()->session()->regenerate();
        // redirect ke halaman verifikasi email
        return redirect()->route('user.profile');
    }
    // admin
    public function adminLogin(){
        $credentials = request()->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        if(Auth::guard('admin')->attempt($credentials)){
            request()->session()->regenerate();
            return redirect()->route('admin.home');
        }else {
            return back()->with('message','Username atau Password Salah');
        }
    }
    public function adminlogout(){
        Auth::guard('admin')->logout();
        //login dua user (admin dan user) pasti akan logout keduanya gara-gara ini fungsi
        //makannya jangan rangkap jabatan ye
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
    public function adminRegister(){
        $credentials = request()->validate([
            'username'=>'required|unique:admins|min:5|max:10',
            'name'=>'required',
            'phone'=>'required',
            'password'=>'required'
        ]);
        Admin::create([
            'username'=>request()->username,
            'name'=>request()->name,
            'phone'=>request()->phone,
            'profile_image'=>'/',
            'password'=>bcrypt(request()->password)
        ]);
        return redirect()
            ->route('admin.login')
            ->with('message','Signup Berhasil ! Silahkan Login Untuk Melanjutkan');
    }
}
