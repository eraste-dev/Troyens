<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function home()
    {
        $data = [
            'html_title'    => "Bienvenue Troyens",
            "partenaires"   => User::getPartenaires(),
            "posts"         => Post::where('media_type', 'blogs')->orderByDesc("created_at")->paginate(6),
            "posts_flash"   => Post::where('media_type', 'flash')->orderByDesc("created_at")->take(4)->get()
        ];
        return view('index', $data);
    }

    public function contact()
    {
        $data = ['html_title' => "Nous contacter"];
        return view('visitor.contact', $data);
    }


    public function contactPost(Request $request)
    {
        $validator = Validator::make($request->all(), ["fullName" => "required", "subject" => "required", "message" => "required"]);
        if ($validator->fails())
            return back()->withErrors($validator)->withInput();
        else {
            Mail::to($request->email)->send(new Contact($validator->validated()));
            return back()->with('success', "Message envoyé avec succès!");
        }
    }
}
