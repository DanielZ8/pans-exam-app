<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::user())
        {
          return redirect('pytania');
        }
        else
        {
            return view('admin.admin-login');
        }
        
    }

    public function login(Request $request){
        $this->validate($request, [
            'Login' => 'required',
            'Haslo' => 'required',
        ]);

        if (!auth()->attempt([
            'name' => $request->input('Login'),
            'password' => $request->input('Haslo')
        ]))
        {
            return back()->with('status', 'Błędny login lub hasło!');
        };

        return redirect()->route('pytania');
    }
}
