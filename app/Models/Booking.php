<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'to', 'from'
    ];
    public function bookable()
    {
        return $this->belongsTo(bookable::class);
    }

    public function scopeBetweenDates(Builder $query,$from,$to)
    {
        return $query->where('to','>=',$from)->where('from','<=',$to);
    }
}
