<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name', 'id', 'place_id'];

    public function place() {
        return $this->belongsTo(Place::class);
    }

    public function estimates() {
        return $this->morphToMany(Estimate::class, 'estimatesables');
    }
}
