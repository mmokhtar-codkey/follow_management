<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note_Vice_Comment extends Model
{
    use HasFactory;


    protected $table = 'note_vice_comment';
    protected $fillable = ['id','comment','other','note_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
