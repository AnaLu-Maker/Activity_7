<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsToMany};

class Group extends Model
{
    protected $fillable = ['name', 'level', 'max_students'];

    // Un group tiene muchos students
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    // Un group tiene muchos courses (N:M)
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }
}

