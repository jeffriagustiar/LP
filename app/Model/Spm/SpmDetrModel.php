<?php

namespace App\Model\Spm;

use Illuminate\Database\Eloquent\Model;

class SpmDetrModel extends Model
{
    protected $table = 'SPMDETR';

    protected $fillable = [
        'MTGKEY','KDKEGUNIT','UNITKEY','NOSPM','NOJETRA','NILAI'
    ];
}
