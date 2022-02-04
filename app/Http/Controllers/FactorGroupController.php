<?php

namespace App\Http\Controllers;

use App\FactorGroup;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFactorGroupRequest;

class FactorGroupController extends Controller
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

    public function __construct(FactorGroup $factorGroupModel)
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->modelFactorGroup = $factorGroupModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factorGroupList = FactorGroup::all();
        return view('factorgroup.indexNew', compact('factorGroupList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFactorGroupRequest $request)
    {
        FactorGroup::create($request->validated());
        return redirect()->back()->with('message', 'Veiksmīgi pievienots datubāzē!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FactorGroup  $factorGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(FactorGroup $factorGroup)
    {
        return view('factorgroup.editNew', compact('factorGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FactorGroup  $factorGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FactorGroup $factorGroup)
    {
        $factorGroup->update($request->all());
        return redirect('/factorgroup')->with('success', 'Veiksmīgi tika atjaunots datubāzē!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FactorGroup  $factorGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactorGroup $factorGroup)
    {
        $factorGroup->delete();
        return redirect()->back()->with('success', 'Veiksmīgi tika dzēsts no datubāzes!');
    }
}
