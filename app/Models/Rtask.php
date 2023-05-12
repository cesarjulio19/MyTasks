<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rtask extends Model
{
    use HasFactory;

    /**     
     */
    protected $table = "rtask" ;

    /**
     */
    protected $primaryKey = "idRta" ;

    /**
     */
    protected $fillable = ["idTta","title","description"] ;

    public $timestamps = false ;
    //to get the ttask from a rtask
    public function ttask()
    {
        return $this->belongsTo('App\Models\Ttask', 'idTta', 'idTta')
                    ->first() ;
    }
    //get the user
    public function user()
    {
        return $this->belongsToMany('App\Models\User',
                                    'users_rtask',
                                    'idRta', 'idUse')
                    ->get() ;
    }
}
