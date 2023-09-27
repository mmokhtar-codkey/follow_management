<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature_Priorty extends Model
{
    use HasFactory;

    protected $table  = 'signature_priority';

    protected $fillable = ['id','governor_signature_id','bosta_id','priority','created_at' , 'updated_at'];

    public function side_posta_prority(){

        return  $this->belongsTo(Bosta::class ,'bosta_id');
    }
}
