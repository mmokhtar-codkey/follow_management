<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nation_Category extends Model
{
    use HasFactory;

    protected $table = 'nation_category';
    protected $fillable = ['id','name'];
    protected $hidden = ['created_at', 'updated_at'];

    public function nation(){

        return  $this->hasMany(International::class ,'ncategory_id');
    }
}
