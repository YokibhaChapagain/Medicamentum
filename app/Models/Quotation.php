<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'drugs', 'id');
    }
    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'order_id', 'id');
    }
}
