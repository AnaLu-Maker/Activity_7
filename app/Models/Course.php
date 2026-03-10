<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, BelongsToMany};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course_key','title','cover','content','robotics_kit_id'];

    // Pertenece a un RoboticsKit
    public function roboticsKit(): BelongsTo
    {
        return $this->belongsTo(RoboticsKit::class);
    }

    // Tiene muchos materiales didácticos
    public function didacticMaterials(): HasMany
    {
        return $this->hasMany(DidacticMaterial::class);
    }

    // Pertenece a muchos grupos (N:M)
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }

}
