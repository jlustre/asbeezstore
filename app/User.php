<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sponsor', 'username', 'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relation of this model to question = Each user has many questions
    public function questions() {
     return $this->hasMany('App\Question');
    }

   //Relation of this model to answers = Each user has many answers
    public function answers() {
        return $this->hasMany('App\Answer');
    }

    public function getUrlAttribute() {
        // return route("questions.show", $this->id);
        return '#';
    }

    public function getAvatarAttribute() {
        $email = $this->email;
        $size = 32;
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))). "?size=".$size;
    }


}
