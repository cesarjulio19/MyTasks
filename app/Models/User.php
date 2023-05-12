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

    protected $table = "users" ;

    protected $primaryKey = "idUse" ;

    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'role',
        'date',
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
    //get the tasks from a user
    public function task()
    {
       return $this->hasMany('App\Models\Task', 'idUse', 'idUse') 
                   ->get() ;
    }
    //get the rtask
    public function rtask()
    {
        return $this->belongsToMany('App\Models\Rtask',
                                    'users_rtask', 
                                    'idUse', 'idRta') 
                                    ->get() ;
    }
    //get the stasks from a user
    public function stask()
    {
       return $this->hasMany('App\Models\Stask', 'idUse', 'idUse') 
                   ->get() ;
    }
}
