<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
    ];
    
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
