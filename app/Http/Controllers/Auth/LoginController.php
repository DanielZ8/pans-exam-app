<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

    public function change_pswd_index(){
        return view('admin/admin-change-password');
    }

    public function change_pswd(Request $request){

        $this->validate($request, [
            'old_password' => 'required|max:255',
            'password' => 'required|confirmed',
        ]);

        if(Hash::check($request->old_password, auth()->user()->password))
        {

          User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
          ]);
          
            return redirect()->route('admin-password')->with("success", "Hasło zmienione pomyślnie!"); 
        }
        else
        {
          return redirect()->route('admin-password')->with("error", "Podane dane są nieprawidłowe, spróbuj ponownie!");
        }
    }
}
