<?php

namespace App\Models;

use http\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','client_id','user_id', 'start', 'end'
    ];

    public function client (){
        return $this->belongsTo(
            Clients::class,'client_id','id'
        );
    }

    public function user (){
        return $this->belongsTo(
            User::class,'user_id','id'
        );
    }
}
