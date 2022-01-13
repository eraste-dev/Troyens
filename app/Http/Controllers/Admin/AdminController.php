<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{
    public function index()
    {
        $data = ['html_title' => "Tableau de bord"];
        return view('dashboard.index', $data);
    }

    public function membres(Request $request)
    {
        if (in_array($request->type, ['adherent', 'beneficiaire'])) {
            $data = [
                'html_title' => "Membres adhérents",
                "users" => User::listMembres($request->type),
                "total" => User::where('role', "adherent")->count()
            ];
            return view('dashboard.membres.membres', $data);
        } else {
            return redirect()->to(route('admin.dashboard'))->with('error', "Type de membre incorrect!");
        }
    }

    public function activites(Request $request)
    {
        if (in_array($request->type, ['activities', 'social_activities'])) {
            $data = [
                'html_title'    => $request->type === "social_activities" ? "Activitées sociales" : "Activitées menées",
                "posts"         => Post::where('media_type', $request->type)->orderByDesc("created_at")->paginate(12),
                "count_post"    => Post::where('media_type', $request->type)->count()
            ];
            return view('dashboard.posts.activites', $data);
        } else {
            return redirect()->to(route('admin.dashboard'))->with('error', "Type de membre incorrect!");
        }
    }

    // PARTENAIRES
    public function partenaires()
    {
        $data = ['html_title' => "Nos partenaires", "partenaires" => User::getPartenaires()];
        return view('dashboard.partenaires', $data);
    }

    public function partenairesStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "raisonSocial"  => "required|max:255",
            "email"         => "nullable|max:255",
            "telephone"     => "nullable|max:255",
            "site_web"      => "nullable|max:255",
            "siege"         => "nullable|max:255",
            "role"          => "nullable|in:ADMIN,SUPER_ADMIN,partenaire",
            "avatar"        => "nullable|file|mimes:jpg,jpeg,png,bmp,tiff,gif",
        ]);


        if ($validator->fails())
            return back()->withErrors($validator)->withInput();
        else {
            if (!is_null($request->partenaire_id)) {
                $partenaire = User::getAnyUser($request->partenaire_id);
                $partenaire->update([
                    "raisonSocial"  => $request->raisonSocial,
                    "email"         => $request->email,
                    "telephone"     => $request->telephone,
                    "site_web"      => $request->site_web,
                    "siege"         => $request->siege,
                    "avatar"        => !is_null($request->avatar) ? Storage::disk('public_uploads')->put('/users', $request->file("avatar")) : $partenaire->avatar
                ]);
            } else {
                $data = $validator->validated();
                $data['avatar'] = !is_null($request->avatar)
                    ? Storage::disk('public_uploads')->put('/users', $request->file("avatar"))
                    : null;
                User::create($data);
            }
            return back()->with("success", "Partenaire enregistré!");
        }
    }

    public function partenairesDelete(User $user)
    {
        if (is_null($user->avatar))
            Storage::disk('public_uploads')->delete($user->avatar);

        $user->delete();
        return back()->with("success", "Partenaire supprimé!");
    }

    //  BLOGS
    public function blogs()
    {
        $data = [
            'html_title' => "Articles",
            "posts" => Post::where('media_type', 'blogs')->orderByDesc("created_at")->paginate(12),
            "count_post" =>  Post::where('media_type', 'blogs')->count()
        ];
        return view('dashboard.posts.index', $data);
    }

    public function blogsPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "titre"         => "nullable|string|max:255",
            "contenu"       => "nullable",
            "categorie"     => "nullable|max:255",
            "lieu"          => "nullable|max:255",
            "date"          => "nullable|max:255",
            "media"         => "nullable|file|mimes:jpg,jpeg,png,bmp,tiff,gif",
            "media_url"     => "nullable|max:255",
            "media_type"    => "required|in:blogs,images,videos,flash,activities,social_activities",
        ]);

        if ($validator->fails())
            return back()->withErrors($validator)->withInput();
        else {
            if (!is_null($request->post_id))
                Post::updateDefaultPost($request->post_id);
            else
                Post::saveDefaultPost($validator->validated());

            return back()->with('success', 'Article enregistre avec succès!');
        }
    }

    public function blogsDelete(Post $post)
    {
        if (is_null($post->media))
            Storage::disk('public_uploads')->delete($post->media);

        $post->delete();
        return back()->with("success", "Article supprimé!");
    }

    public function flashInfo()
    {
        $data = [
            'html_title' => "Gestion des flash infos",
            "posts" => Post::where('media_type', 'flash')->orderByDesc("created_at")->paginate(12),
            "count_post" =>  Post::where('media_type', 'flash')->count()
        ];
        return view('dashboard.posts.flashInfo', $data);
    }
}
