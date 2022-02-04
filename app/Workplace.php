<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workplace extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
    */
    protected $guarded = [];

    public function environment() {
        return $this->belongsTo(Environment::class);
    }

    public function authority() {
        return $this->belongsTo(Authority::class);
    }

    public function personnel() {
        return $this->belongsTo(Personnel::class);
    }
}
