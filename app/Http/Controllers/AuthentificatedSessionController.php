<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthentificatedSessionController extends Controller
{
    public function showForm(){
        return view('Auth.loginForm');
    }


    //login
    public function login(Request $request){

        $request->validate([
            'login' => 'required|string',
            'mdp' => 'required|string'
            ]);

            
        $credentials = ['login' => $request->input('login'), 'password' => $request->input('mdp')];
       

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()-> IsAdmin()) {
                $request->session()->flash('etat','Connectés en tant que Admin');
                return redirect()->intended('/adminAccueil');
            }
            if (Auth::user()->IsEnseignant()) {
                $request->session()->flash('etat','Connectés en tant que Enseignant');
                return redirect()->intended('/enseignantAcceuil');
            }
            if (Auth::user()->IsGestionnaire()) {
                $request->session()->flash('etat','Connectés en tant que Gestionaire');
                return redirect()->intended('/gestionnaireAcceuil');
            }else{
                $request->session()->flash('etat','L admin ne vous a pas ajouter');
            }

            return redirect()->intended('/login');
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }

    // logout
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
