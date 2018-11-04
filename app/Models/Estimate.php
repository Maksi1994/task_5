<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $fillable = ['name'];
    public $timestamps = true;

    public function images() {
        return $this->morphedByMany(Image::class, 'estimatesables');
    }

    public function places() {
        return $this->morphedByMany(Place::class, 'estimatesables');
    }
}
