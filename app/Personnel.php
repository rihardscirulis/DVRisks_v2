<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
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

    public function position() {
        return $this->hasOne(Position::class);
    }

    public function workplace() {
        return $this->hasOne(Workplace::class);
    }

    public function environment() {
        return $this->belongsTo(Environment::class);
    }
}
