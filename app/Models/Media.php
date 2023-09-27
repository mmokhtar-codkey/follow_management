<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';
    protected $fillable = ['id','title','description','date','attach'];
    protected $hidden = ['created_at', 'updated_at','deleted_at'];
}
