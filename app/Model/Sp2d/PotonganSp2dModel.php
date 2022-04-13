<?php

namespace App\Model\Sp2d;

use Illuminate\Database\Eloquent\Model;

class PotonganSp2dModel extends Model
{
    protected $table = 'SP2DDETB';

    protected $fillable = [
        'MTGKEY','UNITKEY','NOSP2D','NOJETRA','KDDANA','NILAI'
    ];
    
    public $timestamps = false;
}
