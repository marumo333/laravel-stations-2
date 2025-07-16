<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'movie_id', 'sheet_id', 'schedule_id', 'name', 'email'];
}
