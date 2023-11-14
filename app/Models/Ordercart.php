<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordercart extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'product_id',
        'user_id',
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class,'product_id');
    }
}
