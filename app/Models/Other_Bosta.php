<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Other_Bosta extends Model
{
    use HasFactory;

    protected $table = 'other_bosta';
    protected $fillable = ['id','side_mean','state','prority','governor_signature_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
