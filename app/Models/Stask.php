<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stask extends Model
{
    use HasFactory;

    /**     
     */
    protected $table = "stask" ;

    /**
     */
    protected $primaryKey = "idSta" ;

    /**
     */
    protected $fillable = ["title","description"] ;

    public $timestamps = false ;
    //get the user
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'idUse', 'idUse')
                    ->first() ;
    }
    
    public function task()
    {
        return $this->belongsTo('App\Models\Task', 'idTas', 'idTas')
                    ->first() ;
    }
}
