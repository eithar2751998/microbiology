<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'created_by',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
