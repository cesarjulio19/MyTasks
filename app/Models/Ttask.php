<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ttask extends Model
{
    use HasFactory;

    /**     
     */
    protected $table = "ttask" ;

    /**
     */
    protected $primaryKey = "idTta" ;

    /**
     */
    protected $fillable = ["type"] ;

    public $timestamps = false ;
    //get the rtasks froma ttask
    public function rtask()
    {
       return $this->hasMany('App\Models\Rtask', 'idTta', 'idTta') 
                   ->get() ;
    }
}
