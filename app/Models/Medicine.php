<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
    'name',
    'description',
    'manufacture',
    'expiration',
    'price',
    'quantity',
    'prescription_required',
    'pharmacy_id'
];
    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }

    public function quotation()
    {
        return $this->hasMany(Quotation::class);
    }
}
