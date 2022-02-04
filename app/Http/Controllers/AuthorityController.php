<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Authority;
use App\Http\Requests\StoreAuthorityRequest;

class AuthorityController extends Controller
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

    public function __construct(Authority $authorityModel)
    {
        $this->middleware('auth');
        $this->modelAuthority = $authorityModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authority_list = Authority::all();
        return view('authority.indexNew', compact('authority_list'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorityRequest $request)
    {
        Authority::create($request->validated());
        return redirect()->back()->with('success', 'Veiksmīgi pievienots datubāzē!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Authority $authority)
    {
        //dd($authority);
        return view('authority.editNew', compact('authority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Authority $authority)
    {
        $authority->update($request->all());
        return redirect('/authority')->with('success', 'Veiksmīgi tika atjaunots datubāzē!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Authority $authority)
    {
        $authority->delete();
        return redirect()->back()->with('success', 'Veiksmīgi tika dzēsts no datubāzes!');
    }
}
