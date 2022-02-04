<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Authority;
use App\Position;
use App\Environment;
use App\Http\Requests\StorePositionRequest;

class PositionController extends Controller
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

    public function __construct(Position $positionModel)
    {
        $this->middleware('auth');
        $this->modelPosition = $positionModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Authority::with('environments', 'positions')->get();
        return view("position.indexNew", compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePositionRequest $request)
    {
        //dd($request->all());
        Position::create([            
            'name' => $request->name,
            'environment_id' => $request->environment_id,
            'authority_id' => Environment::find($request->environment_id)->authority_id,
        ]);
        return redirect('/position')->with('success', 'Dati veiksmīgi pievienoti datubāzē!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Environment $environment)
    {
        $environment_positions = $environment->load('positions');
        return view('position.editNew', compact('environment_positions'));
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
        $environment->update(['name' => $request->environment_name]);
        if($request->position_id) {
            for($i = 0; $i < count($request->position_id); $i++) {
                $environment->positions->find($request->position_id[$i])->delete();
            }    
        }
        if($request->position) {
            for($i = 0; $i < count($request->position); $i++) {
                if(($i <= count($environment->positions)) || (count($environment->positions) == 0)) {
                    Position::create([
                        'name' => $request->position[$i],
                        'environment_id' => $environment->id,
                        'authority_id' => $environment->authority_id,
                    ]);
                }
            }    
        }
        return redirect('/position')->with('success', 'Dati veiksmīgi tika mainīti datubāzē!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Environment $environment)
    {
        $environment->positions()->delete();
        return redirect('/position')->with('success', 'Dati veiksmīgi tika dzēsti datubāzē!');
    }
}
