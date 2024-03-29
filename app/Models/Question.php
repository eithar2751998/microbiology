<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory,SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'image',
        'free',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'question_subjects');
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
