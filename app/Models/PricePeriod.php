<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PricePeriod extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'price_per_day',
        'start_date',
        'end_date'
    ];

}
