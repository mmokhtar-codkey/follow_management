<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature_detail extends Model
{
    use HasFactory;

    protected $table  = 'signature_details';

    protected $fillable = ['id','governor_signature_id','bosta_id','priority','vice_decision','follow_date','signature','created_at' , 'updated_at'];

    public function side_posta_name(){

        return  $this->belongsTo(Bosta::class ,'bosta_id');
    }

}
