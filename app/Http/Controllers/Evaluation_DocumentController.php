<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation_Document;
use App\FactorGroup;
use App\Authority;
use App\Risk_level;
use App\Environment;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Auth;

class Evaluation_DocumentController extends Controller
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

    public function __construct(Evaluation_Document $evaluation_document)
    {
        $this->middleware('auth');
        $this->model_evaluation_document = $evaluation_document;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_factors = FactorGroup::all()->load('factors', 'risk_causes', 'risk_procedures');
        $all_authority = Authority::all()->load('environments', 'personnels', 'positions');
        $all_levels = Risk_level::all();
        return view('create_documents.documentFormNew', compact('all_factors', 'all_authority', 'all_levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $templateProcessor = new TemplateProcessor('word-template/darba_riska_anketa.docx');

        $authority = Authority::find($request->authority_id)->load('environments');

        $templateProcessor->setValue('authority_name', $authority->name);
        $templateProcessor->setValue('registration_number', $authority->registration_number);
        $templateProcessor->setValue('authority_address', $authority->address);
        $templateProcessor->setValue('authority_telephone_number', $authority->telephone_number);
        $templateProcessor->setValue('authority_email', $authority->email);
        $templateProcessor->setValue('document_date', $request->date);
        $templateProcessor->setValue('document_number', $request->document_number);
        $templateProcessor->setValue('appraiser_name', Auth::user()->name);
        $templateProcessor->setValue('work_environment', $authority->environments->find($request->environment_id)->name);
        $templateProcessor->setValue('evaluation_conditions', $request->evaluation_conditions);
        $templateProcessor->setValue('work_process', $request->work_process);

        //$templateProcessor->cloneRow('rowIterator', count($documentRiskFactorSelected));

        $fileName = $authority->name.' '.$request->date;
        $templateProcessor->saveAs($fileName.'.docx');
        return response()->download($fileName.'.docx')->deleteFileAfterSend(true);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
