<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /** 
     * Table Name    
     */
    protected $table = "task" ;

    /**
     * primary key name
     */
    protected $primaryKey = "idTas" ;

    /**
     */
    protected $fillable = ["title", "description", "date", "status"] ;

    public $timestamps = false ;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'idUse', 'idUse')
                    ->first() ;
    }

    public function stask()
    {
       return $this->hasOne('App\Models\Stask', 'idTas', 'idTas') 
                   ->get() ;
    }
}
