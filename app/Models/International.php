<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class International extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'international';
    protected $fillable = ['id','title','description','date','attach'];
    protected $hidden = ['created_at', 'updated_at','deleted_at'];
}
