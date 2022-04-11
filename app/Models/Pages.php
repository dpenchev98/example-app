<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;

    protected $table = 'Pages';
    protected $fillable  = ['title','content','created_by','updated_by'];
    public $timestamps = true;

    public function createdby(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function updatedby(){
        return $this->belongsTo(User::class,'updated_by','id');
    }

}
