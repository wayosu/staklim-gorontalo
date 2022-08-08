<?php

namespace App\Http\Controllers;

use App\Models\SliderPeta;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function indexAdmin()
    {
        $sliderpetas = SliderPeta::get();
        return view('admin.beranda', compact('sliderpetas'));
    }

    public function indexKepalaBidang()
    {
        $sliderpetas = SliderPeta::get();
        return view('kepalabidang.beranda', compact('sliderpetas'));
    }

    public function indexUser()
    {
        $sliderpetas = SliderPeta::get();
        return view('user.user-login.beranda', compact('sliderpetas'));
    }

    public function pengaturanAkun()
    {
        return view('auth.setting-akun');
    }

    public function updateAkun(Request $request, $id)
    {
        $user = User::findorfail($id);

        if ($user->hasRole('admin') || $user->hasRole('kepalabidang')) {
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'unique:users,email,'.$id]
            ]);
            
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else {            
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'unique:users,email,'.$id],
                'universitas' => ['required'],
                'prodi' => ['required'],
                'nim' => ['required'],
            ]);
            
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'universitas' => $request->universitas,
                'prodi' => $request->prodi,
                'nim' => $request->nim,
            ]);
        }

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.pengaturan.akun');
        } else if ($user->hasRole('kepalabidang')) {
            return redirect()->route('kepalabidang.pengaturan.akun');
        } else if ($user->hasRole('user')) {
            return redirect()->route('pengaturan.akun');
        }
    }

    public function updatePass(Request $request, $id)
    {
        $request->validate([
            'password_sekarang' => ['required', new MatchOldPassword],
            'password_baru' => ['required'],
            'konrimasi_password' => ['same:password_baru'],
        ]);

        $user = User::findorfail($id);
        $user->update([
            'password' => Hash::make($request->password_baru),
        ]);
        
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.pengaturan.akun');
        } else if ($user->hasRole('kepalabidang')) {
            return redirect()->route('kepalabidang.pengaturan.akun');
        } else if ($user->hasRole('user')) {
            return redirect()->route('pengaturan.akun');
        }
    }
}
