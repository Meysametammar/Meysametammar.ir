<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Students extends Model
{
    use HasFactory, Notifiable, Uuids, SoftDeletes;

    protected $dateFormat = "U";
}
