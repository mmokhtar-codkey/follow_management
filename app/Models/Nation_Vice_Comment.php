<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nation_Vice_Comment extends Model
{
    use HasFactory;

    protected $table = 'nation_vice_comment';
    protected $fillable = ['id','comment','other','nation_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
