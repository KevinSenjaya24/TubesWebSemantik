<?php

namespace App;
use App\Family;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    protected $table = "jemaat";
    // public $timestamps = false;
    protected $fillable = ['id',
     'family_id',
     'status_keanggotaan',
     'nama', 
     'tempat_lahir',
     'tanggal_lahir',
     'jenis_kelamin',
     'alamat',
     'no_telp', 
     'status',
     'pekerjaan',
     'hobi',
     'baptis',
    ];
    
    public function family()
    {
        return $this->hasOne('App\Family','id', 'family_id');
    }
}
