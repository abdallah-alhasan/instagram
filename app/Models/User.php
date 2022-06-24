<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'name',
        'email',
        'password',
        'username',
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

    //creating a profile when user register
    protected static function boot(){
        parent::boot();
        static::created(function ($user){
            $user->profile()->create([
                'title' => 'Instagram user',
                'image' => ''
            ]);
        });
    }

    //assign profile to a user
    public function profile(){
        return $this->hasOne(profile::class);
    }

    //many to many relation with following
    public function following(){
        return $this->belongsToMany(profile::class);
    }

    //assign posts to a user
    public function posts(){
        return $this->hasMany(post::class)->orderby('created_at' , 'DESC');
    }
}
