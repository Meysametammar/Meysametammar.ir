<?php

namespace App\Models;

use App\Models\Model;

class Files extends Model
{
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
