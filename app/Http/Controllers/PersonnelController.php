<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personnel;
use App\Authority;
use App\Environment;

class PersonnelController extends Controller
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

    public function __construct(Personnel $personnelModel)
    {
        $this->middleware('auth');
        $this->personnelModel = $personnelModel;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Authority::with('positions', 'environments', 'personnels', 'workplaces')->get();
        return view('personnel.indexNew', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Personnel::create($request->all());
        return redirect('/personnel')->with('success', 'Dati veiksmīgi pievienoti datubāzē!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Environment $environment)
    {
        $authorities = Authority::all()->load('positions', 'environments', 'personnels', 'workplaces');
        foreach ($authorities as $authority) {
            foreach ($authority->personnels as $personnel) {
                if ($personnel->environment_id == $environment->id) {
                    $personnels[] = $personnel;
                }
            }
        }
        return view('personnel.editNew', compact('authorities', 'environment', 'personnels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Environment $environment)
    {
        for ($i = 0; $i < count($request->authority_id); $i++) {
            $environment->personnels[$i]->update([
                'name' => $request->name[$i],
                'surname' => $request->surname[$i],
                'person_code' => $request->person_code[$i],
                'telephone_number' => $request->telephone_number[$i],
                'email' => $request->email[$i],
                'position_id' => $request->position_id[$i],
                'authority_id' => $request->authority_id[$i],
                'environment_id' => $request->environment_id,
                'workplace_id' => $request->workplace_id[$i],
            ]);
        }        
        return redirect('/personnel')->with('success', 'Dati veiksmīgi tika mainīti datubāzē!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Environment $environment)
    {
        $environment->personnels()->delete();
        return redirect()->back()->with('success', 'Veiksmīgi tika dzēsts no datubāzes!');
    }
}
