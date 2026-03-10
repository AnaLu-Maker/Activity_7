<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasOne};

class Student extends Model
{
        protected $fillable = ['user_id','group_id','enrollment_date'];

    // Pertenece a un user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Pertenece a un group
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
