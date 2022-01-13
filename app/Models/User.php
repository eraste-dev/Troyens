<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomComplet',
        'raisonSocial',
        'email',
        'password',
        'matricule',
        'telephone',
        'dateNaissance',
        'genre',
        'typeEleve',
        'niveauEtude',
        'serie',
        'diplome',
        'promotion',
        'siege',
        'adresse',
        'site_web',
        'avatar',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // role [ADMIN , SUPER_ADMIN, partenaire, adherent]

    public static function creerUtilisateur(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return  User::create($data);
    }

    public static function getAnyUser(int $id)
    {
        return User::find($id);
    }

    public static function getPartenaires()
    {
        return User::where('role', "partenaire")->orderByDesc('created_at')->get();
    }

    public static function listMembres($role)
    {
        return User::where('role', $role)->orderByDesc('created_at')->paginate(12);
    }
}
