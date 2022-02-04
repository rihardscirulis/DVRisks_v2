<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\CreateDocument;
use App\Authority;
use App\Staff;
use App\riskLevel;
use App\Environment;
use App\Factor;
use App\FactorGroup;
use App\Position;
use App\riskCause;
use App\riskProcedures;
use App\Document;
use App\riskCause_Document;
use App\riskLevel_Document;
use App\environmentDescription;
use App\riskEvent;
use Validator;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class CreateDocumentController extends Controller
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

    public function __construct(CreateDocument $createDocumentModel)
    {
        $this->middleware('auth');
        $this->modelCreateDocument = $createDocumentModel;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factorList = $this->modelCreateDocument->getFactorList();
        $factorGroupList = $this->modelCreateDocument->getFactorGroupList();
        $riskLevel = $this->modelCreateDocument->getRiskLevelList();
        $authorityList = $this->modelCreateDocument->getAuthorityList();
        $environmentList = $this->modelCreateDocument->getEnvironmentList();
        $personList = $this->modelCreateDocument->getPersonList();
        $personAuthorityList = $this->modelCreateDocument->getPersonAuthorityList();
        $riskCauseList = $this->modelCreateDocument->getRiskCauseList();
        return view('createdocument.documentFormNew', compact(
            'factorList', 
            'factorGroupList', 
            'riskLevel', 
            'authorityList', 
            'environmentList', 
            'personList',
            'personAuthorityList',
            'riskCauseList'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Code to generate Word document with required variables */
            //accessing word template in public folder public/word-template/(document_name)
            $templateProcessor = new TemplateProcessor('word-template/darba_riska_anketa.docx');

            //accessing from form required variables
            $documentAuthorityName = $request->input('authorityListItem');
            $documentAuthorityDate = $request->input('documentDate');
            $documentAuthorityNumber = $request->input('documentNumber');
            $documentAppraiser = $request->input('appraiser');
            $documentWorkEnvironment = $request->input('workEnvironment');
            $documentRiskCondition = $request->input('riskCondition');
            $documentWorkDescription = $request->input('workDescription');
            $documentRiskFactorSelected = $request->input('riskFactorSelectMenu');
            $documentRiskLevelSelected = $request->input('riskLevelSelectMenu');
            $documentRiskEventText = $request->input('riskEventTextArea');

            //gets authority name by id using model
            $authority = Authority::findOrFail($documentAuthorityName);            

            //gets staff members name by id using model
            $staffPersonAppraiser = Staff::findOrFail($documentAppraiser);
            $staffPersonAppraiserPosition = Position::find($staffPersonAppraiser->AmatsID);
            //gets environment name by id using model
            $environment = Environment::findOrFail($documentWorkEnvironment);
            //add values in word template
            $templateProcessor->setValue('authorityName', $authority->Nosaukums);
            $templateProcessor->setValue('documentDate', $documentAuthorityDate);
            $templateProcessor->setValue('documentNumber', $documentAuthorityNumber);
            $templateProcessor->setValue('registrationNumber', $authority->Registracijas_numurs);
            $templateProcessor->setValue('authorityAddress', $authority->Adrese);
            $templateProcessor->setValue('authorityPhoneNumber', $authority->Talrunis);
            $templateProcessor->setValue('authorityEmail', $authority->Epasts);
            $templateProcessor->setValue('appraiserName', $staffPersonAppraiser->Vards);
            $templateProcessor->setValue('appraiserSurname', $staffPersonAppraiser->Uzvards);
            $templateProcessor->setValue('personPositionAppraiser', $staffPersonAppraiserPosition->Nosaukums);
            $templateProcessor->setValue('appraiserPosition', $staffPersonAppraiserPosition->Nosaukums);
            $templateProcessor->setValue('workEnvironment', $environment->Nosaukums);
            $templateProcessor->setValue('riskCondition', $documentRiskCondition);
            $templateProcessor->setValue('workDescription', $documentWorkDescription);
            //cloning table rows by array count
            $templateProcessor->cloneRow('rowIterator', count($documentRiskFactorSelected));
            //add values with for cycle on cloned rows
            for ($i=0; $i < count($documentRiskFactorSelected); $i++) { 
                //converts to string and finds factor group and factor by id
                $arraySymbols = str_split($documentRiskFactorSelected[$i]);
                for ($index1=0; $index1 < count($arraySymbols); $index1++) { 
                    if($arraySymbols[$index1] == '-') {
                        $lineIndex = $index1;
                        break;
                    }
                }
                for ($index2=0; $index2 < count($arraySymbols); $index2++) { 
                    if($arraySymbols[$index2] == '/') {
                        $slashIndex = $index2;
                        break;
                    }
                }
                //adds row numbers in table
                $templateProcessor->setValue('rowIterator#'.$i+1, $i+1);
                $containsFactorGroupID = substr($documentRiskFactorSelected[$i], 0, $lineIndex);
                $containsFactorID = substr($documentRiskFactorSelected[$i], $lineIndex+1, $slashIndex-$lineIndex-1);
                $containsRiskCauseID = substr($documentRiskFactorSelected[$i], $slashIndex+1, array_key_last($arraySymbols));
                $riskFactorGroup = FactorGroup::findOrFail($containsFactorGroupID);
                $riskFactor = Factor::findOrFail($containsFactorID);
                $riskCause = riskCause::findOrFail($containsRiskCauseID);
                $templateProcessor->setValue('riskFactorGroup#'.$i+1, $riskFactorGroup->Nosaukums);
                $templateProcessor->setValue('riskFactor#'.$i+1, $riskFactor->Nosaukums);
                $templateProcessor->setValue('riskCause#'.$i+1, $riskCause->Nosaukums);
                //add values in cloned rows without finding
                $findRiskProcedure = DB::table('riska_kartiba')->select('ID', 'Nosaukums')->where('Faktora_ID', '=', $containsFactorID)->get();
                foreach($findRiskProcedure as $risk) {
                    $templateProcessor->setValue('riskConditionList#'.$i+1, $risk->Nosaukums);
                    $arrayOfRiskProcedures[] = $risk->ID;
                }
                $riskLevel = riskLevel::find($documentRiskLevelSelected[$i]);
                $templateProcessor->setValue('riskLevelList#'.$i+1, $riskLevel->Nosaukums);
                $templateProcessor->setValue('riskEventList#'.$i+1, $documentRiskEventText[$i]);
                
                //adds additional info in array for creating new data models
                $arrayOfRiskLevels[] = $riskLevel->ID;
                $arrayOfRiskCauses[] = $containsRiskCauseID;
                $arrayOfRiskEvent[] = $documentRiskEventText[$i];
            }
            //get Environment ID assigned positions
            $positionEnvironmentID = DB::table('amats')->select('ID', 'Nosaukums', 'Vide_ID')->where('Vide_ID', $documentWorkEnvironment)->get();
            //get array of values by previous get ID who are assigned by this position ID value
            $personPositions = DB::table('persona')
                ->join('amats', 'persona.AmatsID', '=', 'amats.ID')
                ->select(
                    'persona.ID as personID',
                    'persona.vards as personName',
                    'persona.uzvards as personSurname',
                    'persona.AmatsID as personPositionID',
                    'amats.Nosaukums as positionName',
                    'amats.ID as positionID',
                    'amats.Vide_ID as positionEnvironmentID'
                )
                ->where('amats.Vide_ID', '=', $environment->ID)
                ->get();
                         
            $allPersons = array();
            for ($i=0; $i < count($personPositions); $i++) { 
                if ($staffPersonAppraiser->ID !== $personPositions[$i]->personID) {
                    $values = array(
                        array(
                            'personRowIterator' => $i+1,
                            'personName' => $personPositions[$i]->personName,
                            'personSurname' => $personPositions[$i]->personSurname,
                            'personPosition' => $personPositions[$i]->positionName
                        )
                    );
                    $allPersons = array_merge($allPersons, $values);    
                }
            }
            $templateProcessor->cloneRowAndSetValues('personRowIterator', $allPersons);
            //saves document name
            $fileName = $authority->Nosaukums.' '.$documentAuthorityDate;
            //add document name variable to save with it
            $templateProcessor->saveAs($fileName.'.docx');

            $document = new Document;
            $document->Dokumenta_numurs = $documentAuthorityNumber;
            $document->Datums = $documentAuthorityDate;
            $document->Iestade_ID = $documentAuthorityName;
            $document->Persona_ID = $documentAppraiser;
            $document->Vide_ID = $documentWorkEnvironment;
            $document->Nosaukums = $fileName;
            $document->save();

            $environmentDescription = new environmentDescription;
            $environmentDescription->Novertesanas_apstaklis = $documentRiskCondition;
            $environmentDescription->Darba_procesa_apraksts = $documentWorkDescription;
            $environmentDescription->Dokuments_ID = $document->ID;
            $environmentDescription->Vide_ID = $documentWorkEnvironment;
            $environmentDescription->save();

            for ($i=0; $i < count($arrayOfRiskEvent); $i++) {
                $riskEvent = new riskEvent;
                $riskEvent->Nosaukums = $arrayOfRiskEvent[$i];
                $riskEvent->RiskaKartiba_ID = $arrayOfRiskProcedures[$i];
                $riskEvent->save();
                $arrayOfRiskEventIDs[] = $riskEvent->ID;
            }
            for ($i=0; $i < count($arrayOfRiskLevels); $i++) { 
                $riskLevelDocument = new riskLevel_Document;
                $riskLevelDocument->RisksLimenis_ID = $arrayOfRiskLevels[$i];
                $riskLevelDocument->Dokuments_ID = $document->ID;
                $riskLevelDocument->RiskaPasakums_ID = $arrayOfRiskEventIDs[$i];
                $riskLevelDocument->save();
            }
            for ($i=0; $i < count($arrayOfRiskCauses); $i++) { 
                $riskCauseDocument = new riskCause_Document;
                $riskCauseDocument->RiskaCelonisID = $arrayOfRiskCauses[$i];
                $riskCauseDocument->Dokuments_ID = $document->ID;
                $riskCauseDocument->save();
            }

            return response()->download($fileName.'.docx')->deleteFileAfterSend(true);
        /* ====================================================================== */
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
