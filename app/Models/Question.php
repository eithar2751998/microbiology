<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'image'
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
