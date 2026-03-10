<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $fillable = ['name', 'description'];

    // Un role puede tener muchos usuarios
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
