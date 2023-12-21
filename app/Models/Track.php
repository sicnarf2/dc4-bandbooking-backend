<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    protected $fillable = [
        'album_id', 
        'title', 
        'duration', 
        'composer', 
        'track_number'
    ];
}
