<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
    */
    protected $guarded = [];

    public function environments() {
        return $this->hasMany(Environment::class);
    }

    public function workplaces() {
        return $this->hasMany(Workplace::class);
    }

    public function positions() {
        return $this->hasMany(Position::class);
    }

    public function personnels() {
        return $this->hasMany(Personnel::class);
    }
}
