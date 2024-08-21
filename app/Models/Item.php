<?php

namespace App\Models;

use App\Model\SaleDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'items';
    protected $fillable = ['name', 'description', 'status'];

    // Relasi dengan Price
	public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }
}
