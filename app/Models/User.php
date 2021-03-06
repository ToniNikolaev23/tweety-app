<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'avatar',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value){
       
        if(!$value){
            return 'images/green.png';
        }

        return asset('storage/'.$value);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function setUsernameAttribute($value){
        $this->attributes['username'] = '@'.$value;
    }

    public function timeline(){
        $friends = $this->follows()->pluck('id');
        $friends->push($this->id);
        return Tweet::whereIn('user_id', $friends)->withLikes()->latest()->get();
    }

    public function tweets(){
        return $this->hasMany(Tweet::class);
    }

    public function follow(User $user){
        return $this->follows()->save($user);
    }
    public function unfollow(User $user){
        return $this->follows()->detach($user);
    }

    public function follows(){
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function following(User $user){
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

}
