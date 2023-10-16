<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public function plans()
    {
        return $this->belongsToMany(User::class,'subscriptions');
    }
    public function users()
    {
        return $this->belongsToMany(PricingPlan::class,'subscriptions');
    }
}
