<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;


    protected $table = 'Clients';

    protected $fillable  = ['name','age','gender','notes'];


    public $timestamps = true;

    public function events (){
        return $this->hasMany(
            Event::class,'client_id','id'
        );
    }
}
