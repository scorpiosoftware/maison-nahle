<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'url',
        'is_active',
    ];

    /**
     * Get the social's icon URL.
     *
     * @return string
     */
    public function getIconUrlAttribute()
    {
        return $this->icon ? asset('storage/' . $this->icon) : null;
    }
}
