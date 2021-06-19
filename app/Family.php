<?php

namespace App;
use App\Family;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table = "family";
    protected $fillable = ['id', 'nkk', 'kepala_keluarga'];
}
