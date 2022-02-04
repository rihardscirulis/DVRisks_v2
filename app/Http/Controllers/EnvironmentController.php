<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Environment;
use App\Authority;
use App\Workplace;
use App\Http\Requests\StoreEnvironmentRequest;
use DB;

class EnvironmentController extends Controller
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

    public function __construct(Environment $environmentModel)
    {
        $this->middleware('auth');
        $this->modelEnvironment = $environmentModel;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Authority::with('environments', 'workplaces')->get();
        return view("environment.indexNew", compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnvironmentRequest $request)
    {
        $environment = Environment::create([
            'name' => $request->name,
            'authority_id' => $request->authority_id,
        ]);
        for($i = 0; $i < count($request->workplaces); $i++) {
            Workplace::create([
                'name' => $request->workplaces[$i],
                'environment_id' => $environment->id,
                'authority_id' => $request->authority_id,
            ]);    
        }
        return redirect()->back()->with('success', 'Veiksmīgi pievienots datubāzē!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Environment $environment)
    {
        $authority_list = Authority::all();
        $environment = $environment->load('authority', 'workplaces');
        return view('environment.editNew', compact('environment', 'authority_list'));
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
        $update_environment = $environment->load('workplaces');
        $update_environment->update(['name' => $request->name, 'authority_id' => $request->authority_id]);
        if($request->workplace_id) {
            for($i = 0; $i < count($request->workplace_id); $i++) {
                $update_environment->workplaces->find($request->workplace_id[$i])->delete();
            }    
        }
        for($i = 0; $i < count($request->workplaces); $i++) {            
            if($i >= count($update_environment->workplaces)) {
                Workplace::create([
                    'name' => $request->workplaces[$i],
                    'environment_id' => $environment->id,
                    'authority_id' => $request->authority_id,
                ]);
            }
            else{
                $update_environment->workplaces[$i]->update(['name' => $request->workplaces[$i]]);
            }
        }
        return redirect('/environment')->with('success', 'Veiksmīgi tika atjaunots datubāzē!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Environment $environment)
    {
        $environment->workplaces()->delete();
        $environment->delete();
        return redirect()->back()->with('success', 'Veiksmīgi tika dzēsts no datubāzes!');
    }
}
