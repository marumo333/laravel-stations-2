<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_url',
        'published_year',
        'description',
        'is_showing',
        'genre_id'
    ];

    protected $casts = [
        'is_showing' => 'boolean',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    /**
     * 映画に関連する上映スケジュールを取得
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}