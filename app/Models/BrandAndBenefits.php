<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandAndBenefits extends Model
{
    use HasFactory;

    protected $fillable = ["request_user_ip", "request_time" ,"date_time", "brands", "benefits"];

    protected $casts = [
        "brands" => "json",
        "benefits" => "json",
    ];
}
