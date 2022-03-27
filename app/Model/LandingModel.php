<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LandingModel extends Model
{
    protected $table = 'tbl_nilai';

    protected $fillable = [
        'id','nilai','created_at'
    ];
}
