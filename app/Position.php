<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
    */
    protected $guarded = [];

    public function authority() {
        return $this->belongsTo(Authority::class);
    }

    public function environment() {
        return $this->belongsTo(Environment::class);
    }

    public function position() {
        return $this->belongsTo(Authority::class);
    }

    public function personnel() {
        return $this->belongsTo(Personnel::class);
    }
}
