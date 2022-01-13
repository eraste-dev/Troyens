<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'contenu', 'categorie', 'lieu', 'date', 'media', 'media_url', 'media_type'];
    public $timestamps = true;
    # media_type [blogs, images, videos, flash, activities, social_activities]

    public function getFlashInfos($limit = 4)
    {
        return Post::where('media_type', 'flash')->orderByDesc("created_at")->take($limit)->get();
    }

    public static function saveDefaultPost($data)
    {
        $data = $data;
        $data['created_by'] = "ADMIN";
        if (request()->hasFile("media"))
            switch ($data['media_type']) {
                case 'images':
                    $data['media'] = Storage::disk('public_uploads')->put('/posts/galeries', request()->file("media"));
                    break;

                default:
                    $data['media'] = Storage::disk('public_uploads')->put('/posts', request()->file("media"));
                    break;
            }
        else
            $data['media'] = null;

        return Post::create($data);
    }

    public static function updateDefaultPost(int $id)
    {
        $post = Post::find($id);
        if ($post) {
            $folder = "/posts";
            switch ($post->media_type) {
                case 'images':
                    $folder = "/posts/galeries";
                    break;
                default:
                    break;
            }

            $post->update([
                "contenu"   => request()->contenu,
                "categorie" => request()->categorie,
                "lieu"      => request()->lieu,
                "date"      => request()->date,
                "media_url" => request()->media_url,
                "media"     => !is_null(request()->media)
                    ? Storage::disk('public_uploads')->put($folder, request()->file("media"))
                    : $post->media
            ]);

            return true;
        }

        return false;
    }
}
