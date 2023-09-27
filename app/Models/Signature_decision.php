<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature_decision extends Model
{
    use HasFactory;

    protected $table  = 'signature_decision';

    protected $fillable = ['id','governor_signature_id','mgenral','mgenral_state','govice','govice_state','vice_decision','follow_date','signature','created_at' , 'updated_at'];

}
