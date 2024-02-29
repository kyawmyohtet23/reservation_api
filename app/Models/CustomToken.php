<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\PersonalAccessToken as SanctumToken;

class CustomToken extends SanctumToken
{
    // use HasFactory;
    protected $table = 'personal_access_tokens';

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
