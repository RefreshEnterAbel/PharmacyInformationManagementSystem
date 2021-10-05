<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'patient_name',
        'staff_id',
        'bill_payment'
    ];

//    public function drug()
//    {
//        return $this->hasOne(Medicines.Class)
//
//    }
}
