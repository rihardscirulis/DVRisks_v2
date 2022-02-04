<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskProcedure extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
    */
    protected $guarded = [];

    /**
     * Get the risk causes from factor.
    */
    public function factor()
    {
        return $this->belongsTo(Factor::class);
    }

}
