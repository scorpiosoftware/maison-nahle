<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $fillable = ['logo_url','is_enable'];

    public function images()
    {
        return $this->hasMany(CarouselImage::class);
    }
}
