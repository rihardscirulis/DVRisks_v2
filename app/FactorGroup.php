<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactorGroup extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
    */
    protected $guarded = [];

    /**
     * Get the employees from company.
    */
    public function factors()
    {
        return $this->hasMany(Factor::class);
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
