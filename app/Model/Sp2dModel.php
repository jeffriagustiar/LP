<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sp2dModel extends Model
{
    protected $table = 'SP2DDETR';

    protected $fillable = [
        'KDKEGUNIT','MTGKEY','UNITKEY','NOSP2D','NOJETRA','KDDANA','NILAI'
    ];
    
    public $timestamps = false;
}
