<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'image',
        'status',
        'department_id'

    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class,'question_subjects');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
