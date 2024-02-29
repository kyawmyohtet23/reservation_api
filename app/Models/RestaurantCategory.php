<?php

namespace App\Models;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestaurantCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
    ];


    public function restaurant()
    {
        return $this->hasMany(Restaurant::class);
    }
}
