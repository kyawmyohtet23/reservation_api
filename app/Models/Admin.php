<?php

namespace App\Models;

use App\Models\Restaurant;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password'
    ];


    public function restaurant()
    {
        return $this->hasOne(Restaurant::class);
    }
}
