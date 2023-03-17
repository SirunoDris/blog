<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; //Son clases que se pueden utilizar dentro de otras clases (transvensales)

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
    protected $casts = [ //campos que van a permanecer con otro tipo de dato diferente
        'email_verified_at' => 'datetime',
    ];

    /**
     * Summary of pios
     * return all pios collection by the user
     * 
     * @return void
     */
    public function pios(){
        return $this->hasMany(Pio::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    function role(){
        return $this->belongsTo(Role::class);
    }
}
