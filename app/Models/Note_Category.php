<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note_Category extends Model
{
    use HasFactory;
    protected $table = 'note_category';
    protected $fillable = ['id','name'];
    protected $hidden = ['created_at', 'updated_at'];

    public function notes(){

        return  $this->hasMany(Note::class ,'ncategory_id');
    }
}
