<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function userLogin(){
        $credentials = request()->validate([
            'email'=>'required|email:rfc,dns',
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
            'email'=>['required',Rule::unique('users')->whereNull('deleted_at'),'email:rfc,dns'],
            'name'=>'required',
            'password'=>'required',
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
            'username'=>['required',Rule::unique('admins')->whereNull('deleted_at'),'min:5','max:10'],
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
