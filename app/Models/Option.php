<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['show_popup','label_messages'];

    protected $casts = [
        'label_messages' => 'array', // Cast the JSON column to an array
    ];
}
