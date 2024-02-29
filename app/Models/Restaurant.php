<?php

namespace App\Models;

use App\Models\City;
use App\Models\Menu;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Review;
use App\Models\Reservation;
use App\Models\RestaurantCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'admin_id',
        'category_id',
        'city_id',
        'name',
        'phone',
        'description',
        'image',
        'address',
        'type',
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset('/images/' . $this->image);
    }

    protected $casts = [
        'type' => 'array',
    ];


    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }


    public function restaurantCategory()
    {
        return $this->belongsTo(RestaurantCategory::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }


    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }


    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
