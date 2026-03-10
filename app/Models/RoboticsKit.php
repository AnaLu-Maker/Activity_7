<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoboticsKit extends Model
{
    protected $fillable = ['name', 'description'];

    // Un kit puede estar en muchos courses
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
