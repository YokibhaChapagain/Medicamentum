<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $table = 'pharmacys';
    protected $fillable = [
        'registration',
        'license',
        'telephonenumber',
        'location',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class,'pharmacy_id');
    }
    public function pharmacyUser()
{
    return $this->belongsTo(User::class, 'user_id')->where('role', 'pharmacy');
}


}
