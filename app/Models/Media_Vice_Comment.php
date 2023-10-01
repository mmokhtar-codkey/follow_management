<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media_Vice_Comment extends Model
{
    use HasFactory;

    protected $table = 'media_vice_comment';
    protected $fillable = ['id','comment','other','media_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
