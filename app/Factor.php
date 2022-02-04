<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
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
    public function factor_group()
    {
        return $this->belongsTo(FactorGroup::class);
    }


    /**
     * Get the risk causes from factor.
    */
    public function risk_causes()
    {
        return $this->hasMany(RiskCause::class);
    }

    /**
     * Get the risk procedures from factor.
    */
    public function risk_procedures()
    {
        return $this->hasMany(RiskProcedure::class);
    }


}
