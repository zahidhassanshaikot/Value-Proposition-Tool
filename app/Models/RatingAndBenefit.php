<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingAndBenefit extends Model
{
    use HasFactory;

    protected $fillable = ["request_user_ip", "user_agent" ,"benefit", "type", "rating"];

}
