<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class User extends Authenticatable
{
    // Dentro de la clase User:
    protected $fillable = ['name', 'email', 'password', 'role_id'];

    // Un user pertenece a un role
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    // Un user puede ser un student
    public function student(): HasOne
    {
        return $this->hasOne(Student::class);

    }
}