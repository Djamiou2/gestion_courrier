<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profil;
use App\Models\Service;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // il faut spécifier les champs qui sont fillable pour pouvoir les envoyer via le formulaire
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];

    // un user appartient à un et un seul service
    public function services()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    // un user a un seul profil
    public function profil()
    {
        return $this->belongsTo(Profil::class, 'profil_id');
    }

     public function imputation()
    {
    return $this->belongsToMany(Imputation::class);
    }

     public function traitement()
    {
    return $this->belongsToMany(Traitement::class);
    }

    // verification du profil de l'User
    public function hasProfil($profil)
    {

        return $this->profil()->where('nom', $profil)->get()->isNotEmpty();

    }

     public function user() {
        return $this->hasMany(User::class,'user_id');
    } 


    // $user->hasProfil("administrateur");

    // fonction boot() : pour observer le changement
    /* public static function booted()
    {
        static::observe(new PasswordChangeObserver());
    } */

}
