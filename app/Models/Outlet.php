<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $table = 'outlets';

    protected $fillable = ['name', 'description', 'location', 'status'];

    // Relasi dengan Price
    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
