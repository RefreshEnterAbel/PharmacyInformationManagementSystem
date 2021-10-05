<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Medicines extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'generic_name',
        'med_company',
        'categories',
        'shelf_no',
        'dose_amount',
        'type_id',
        'no_items',
        'price',
        'manufacture_date',
        'exp_date',
    ];

    protected $appends = [
        'med_type'
    ];

    public function getMedTypeAttribute(): string
    {
        return MedicineTypes::where('id', $this['type_id'])->first()->name;
    }

    public function medicineType(): HasOne
    {
        return $this->hasOne(MedicineTypes::class, 'type_id');
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sales::class, 'med_id');
    }

}
