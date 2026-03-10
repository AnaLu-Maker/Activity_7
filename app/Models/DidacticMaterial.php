<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class DidacticMaterial extends Model
{
    protected $fillable = ['course_id','title','file_url','type'];

    // Pertenece a un course
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
