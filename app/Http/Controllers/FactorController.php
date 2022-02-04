<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factor;
use App\RiskCause;
use App\FactorGroup;
use App\RiskProcedure;
use App\Http\Requests\StoreFactorRequest;

class FactorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }*/

    public function __construct(Factor $factorModel)
    {
        $this->middleware('auth');
        $this->modelFactor = $factorModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_factors = FactorGroup::with('factors', 'risk_causes', 'risk_procedures')->get();
        if($all_factors->isEmpty()) {
            return redirect('/')->with('error', 'Vispirms pievienojiet jaunu faktora grupu!');
        }
        else {
            return view('factor.indexNew', compact('all_factors'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFactorRequest $request)
    {
        $factor = Factor::create([
            'name' => $request->name,
            'factor_group_id' => $request->factor_group_id,
        ]);
        for($i = 0; $i < count($request->risk_causes); $i++) {
            RiskCause::create([
                'name' => $request->risk_causes[$i],
                'factor_id' => $factor->id,
                'factor_group_id' => $request->factor_group_id,
            ]);
        }    
        RiskProcedure::create([
            'name' => $request->risk_procedure,
            'factor_id' => $factor->id,
            'factor_group_id' => $request->factor_group_id,
        ]);

        return redirect()->back()->with('success', 'Veiksmīgi pievienots datubāzē!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Factor $factor)
    {
        $edit_factor = $factor->load('factor_group' ,'risk_causes', 'risk_procedures');
        return view('factor.edit', compact('edit_factor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factor $factor)
    {
        $update_factor = $factor->load('factor_group' ,'risk_causes', 'risk_procedures');
        $update_factor->factor_group->update(['name' => $request->factor_group_name]);
        $factor->update(['name' => $request->input('factor_name')]);
        if($request->risk_cause_id) {
            for($i = 0; $i < count($request->risk_cause_id); $i++) {
                $update_factor->risk_causes->find($request->risk_cause_id[$i])->delete();
            }    
        }
        for($i = 0; $i < count($request->risk_cause); $i++) {
            if($i >= count($update_factor->risk_causes)) {
                RiskCause::create([
                    'name' => $request->risk_cause[$i],
                    'factor_id' => $factor->id,
                    'factor_group_id' => $update_factor->factor_group->id,
                ]);
            }
            else {
                $update_factor->risk_causes[$i]->update(['name' => $request->risk_cause[$i]]);
            }
        }
        $update_factor->risk_procedures[0]->update(['name' => $request->name]);
        return redirect('/factor')->with('success', 'Veiksmīgi tika atjaunots datubāzē!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factor $factor)
    {
        $factor->risk_causes()->delete();
        $factor->risk_procedures()->delete();
        $factor->delete();
        return redirect()->back()->with('success', 'Veiksmīgi tika dzēsts no datubāzes!');
    }
}
