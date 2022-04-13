<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sp2diModel extends Model
{
    protected $table = 'SP2D';

    protected $fillable = [
        'UNITKEY','NOSP2D','KDSTATUS','NOSPM','KEYBEND','IDXSKO','IDXTTD','KDP3','IDXKODE','NOREG','KETOTOR','NOKONTRAK','KEPERLUAN','PENOLAKAN','TGLVALID','TGLSP2D','TGLSPM','NOBBANTU'
    ];

    public $timestamps = false;
}
