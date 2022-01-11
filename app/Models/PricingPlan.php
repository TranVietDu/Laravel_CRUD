<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    use HasFactory;
    protected $fillable=[
        'price',
        'package',
        'content_1',
        'content_2',
        'content_3',
        'content_4',
        'content_5',
        'content_6',
    ];
}
