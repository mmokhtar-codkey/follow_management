<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;


    protected $table = 'note';
    protected $fillable = ['id','title','description','date','attach','ncategory_id'];
    protected $hidden = ['created_at', 'updated_at','deleted_at'];
}
