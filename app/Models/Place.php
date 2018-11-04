<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['name', 'type_id'];


    public function images() {
        return $this->hasMany(Image::class);
    }

    public function estimates() {
        return $this->morphToMany(Estimate::class, 'estimatesables');
    }

}
