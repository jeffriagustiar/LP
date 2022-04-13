<?php

namespace App\Model\Sp2d;

use Illuminate\Database\Eloquent\Model;

class PajakSp2dModel extends Model
{
    protected $table = 'SP2DPJK';

    protected $fillable = [
        'UNITKEY','NOSP2D','PJKKEY','NILAI','KETERANGAN'
    ];
    
    public $timestamps = false;
}
