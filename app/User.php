<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);    //, 'user_id'
    }


    public function scopeAllowed($query)
    {
        if( auth()->user()->can('view', $this) ){   //if( auth()->user()->hasRole('Admin') ){
            return $query;
        } 
        return $query->where('id', auth()->id());
    }

    public function getRoleDisplayName()
    {
        return $this->roles->pluck('display_name')->implode(', ');
    }
}
