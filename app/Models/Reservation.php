<?php

namespace App\Models;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'name',
        'email',
        'total_person',
        'phone',
        'request',
        'occasion',
        'reserve_date',
        'reserve_time',
        'status',
    ];


    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
