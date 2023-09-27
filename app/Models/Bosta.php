<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bosta extends Model
{
    use HasFactory;

    protected $table = 'bosta';
    protected $fillable = ['id','side_mean','governor_signature_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function posta_state(){

        return  $this->hasMany(Signature_detail::class ,'bosta_id');
    }
    public function posta_prority(){

        return  $this->hasMany(Signature_Priorty::class ,'bosta_id');
    }
}
