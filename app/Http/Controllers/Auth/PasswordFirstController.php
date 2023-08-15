<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordFirstController extends Controller
{
    use AuthorizesRequests;

    public function showChangeForm()
    {
        return view('auth.password.change');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user->update([
            'password' => bcrypt($request->password),
            'password_changed_at' => now(),
        ]);

        // if(auth()->user()->role == 'admin'){
        //     return redirect()->route('admin.home');
        // }
        if(auth()->user()->role == 'docteur'){
            return redirect()->route('docteur.home');
        }
        if(auth()->user()->role == 'secretaire'){
            return redirect()->route('secretaire.home');
        }
    }
}
