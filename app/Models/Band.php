<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Band extends Model
{
    use HasFactory;
    protected $fillable = [
        'band_name',
        'genre',
        'year_started',
        'membersCount'
        
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public static function list()
    {
        $bands = Band::orderByRaw('band_name')->get();
        $list = [];
        foreach ($bands as $band) {
            $list[$band->id] = $band->band_name;
        }

        return $list;
    }
    
}
