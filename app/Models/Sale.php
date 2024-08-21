<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'outlet_id', 'total', 'paid', 'paidoff', 'notes'];

    public function details()
    {
        return $this->hasMany(SaleDetail::class);
    }
    
    
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}

