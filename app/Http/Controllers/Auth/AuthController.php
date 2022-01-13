<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check())
            return redirect()->route('home');

        $data = ['html_title' => "Connexion"];
        return view('visitor.login', $data);
    }

    public function loginPost(Request $request)
    {
        $validaor = Validator::make($request->all(), ['matricule' => 'required|exists:users,matricule', 'password' => 'required']);

        if ($validaor->fails())
            return back()->withErrors($validaor)->withInput();
        else {
            $authenticate = Auth::attempt(['matricule' => $request->matricule, "password" => $request->password]);

            if ($authenticate) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Vous êtres connecté ! Bienvenue ...');
            }
        }
    }

    public function register()
    {
        $data = ['html_title' => "Devenir membre"];
        return view('visitor.register', $data);
    }

    public function registerPost(Request $request)
    {
        $validaor = Validator::make($request->all(), [
            "nomComplet"        => "required|string|max:255",
            "email"             => "required|unique:users,email",
            "telephone"         => "nullable",
            "matricule"         => "required|max:255",
            "password"          => "required",
            "confirm_password"  => "required|same:password",
            "dateNaissance"     => "nullable",
            "genre"             => "nullable",
            "typeEleve"         => "nullable",
            "niveauEtude"       => "nullable",
            "serie"             => "nullable",
            "promotion"         => "nullable",
            "diplome"           =>  "nullable"
        ]);

        if ($validaor->fails())
            return back()->withErrors($validaor)->withInput();
        else {
            $data = $validaor->validated();
            $data['role'] = $request->typeEleve;
            User::creerUtilisateur($data);
            return redirect()->to(route('login'))->with('success', 'Merci! Vous etres membres des TROYENS');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'vous êtres deconnecté, à bientot !');
    }
}
