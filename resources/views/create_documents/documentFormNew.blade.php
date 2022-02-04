@extends('application.index')

@section('content')
    <section class="form cid-sQvZ5x5v4V" id="formbuilder-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                    <form action="/evaluation_document" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                        @csrf
                        <div class="dragArea form-row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="mbr-fonts-style display-5">Riska novērtēšanas anketa</h4>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <div data-for="selectAuthority" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="selectAuthority-formbuilder-12" class="form-control-label mbr-fonts-style display-7">* Izvēlieties iestādi:</label>
                                <select onchange="get_authority(this.value);" name="authority_id" data-form-field="selectAuthority" class="form-control display-7" id="selectAuthority-formbuilder-12">
                                    <option selected disabled hidden value="" >--- Izvēlieties iestādi ---</option>
                                    @foreach ($all_authority as $authority)
                                       <option value="{{$authority->id}}" data-value="{{$authority->name}}">{{$authority->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div data-for="date" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="date-formbuilder-12" class="form-control-label mbr-fonts-style display-7">* Izvēlieties datumu:</label>
                                        <input type="date" name="date" data-form-field="date" required="required" class="form-control display-7" value="" id="date-formbuilder-12">
                                    </div>
                                    <div class="col">
                                        <label for="documentNumber-formbuilder-12" class="form-control-label mbr-fonts-style display-7">* Ievadiet dokumenta numuru:</label>
                                        <input type="text" name="document_number" placeholder="- Ievadiet dokumenta numuru -" data-form-field="documentNumber" class="form-control display-7" required="required" value="" id="documentNumber-formbuilder-12">        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="selectMember">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="selectMember-formbuilder-12" class="form-control-label mbr-fonts-style display-7">* Riska vērtējumā piedālās:</label>
                                        <select name="personnel_id" data-form-field="selectMember" class="form-control display-7" id="selectMember-formbuilder-12">
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="selectEnvironment-formbuilder-12" class="form-control-label mbr-fonts-style display-7">* Darba vieta, iekārta, darba vide:</label>
                                        <select name="environment_id" data-form-field="selectEnvironment" class="form-control display-7" id="selectEnvironment-formbuilder-12">

                                        </select>        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="selectEnvironment" style="">
                            </div>
                            <div data-for="textarea" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="textarea-formbuilder-12" class="form-control-label mbr-fonts-style display-7">* Riska faktoru novērtēšanas apstākļi::</label>
                                <textarea name="evaluation_conditions" placeholder="- Ievadiet riska faktoru novērtējuma apstākli -" data-form-field="textarea" required="required" class="form-control display-7" id="textarea-formbuilder-12"></textarea>
                            </div>
                            <div data-for="workProcess" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="workProcess-formbuilder-12" class="form-control-label mbr-fonts-style display-7">*Darba procesa apraksts:</label>
                                <textarea name="work_process" placeholder="- Ievadiet ieteicamo riska pasākumu -" data-form-field="workProcess" required="required" class="form-control display-7" id="workProcess-formbuilder-12"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="mbr-fonts-style display-7">1. Rinda</p>
                            </div>
                            <div data-for="selectRiskFactor" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="selectRiskFactor-formbuilder-12" class="form-control-label mbr-fonts-style display-7">* Faktora grupa:</label>
                                        <select onchange="get_factor(this.value);" name="factor_group_id[]" data-form-field="selectRiskFactor" class="form-control display-7" id="selectRiskFactor-formbuilder-12">
                                            <option value="" selected>--- Izvēlieties faktora grupu ---</option>
                                            @foreach ($all_factors as $factor_group)
                                                <option value="{{$factor_group->id}}" data-value="{{$factor_group->name}}">{{$factor_group->name}}</option>
                                            @endforeach
                                        </select>        
                                    </div>
                                    <div class="col">
                                        <label for="selectRiskFactor-formbuilder-12" class="form-control-label mbr-fonts-style display-7">* Riska faktors:</label>
                                        <select onchange="get_risk_cause(this.value);" name="factor_id[]" data-form-field="select_factor" class="form-control display-7" id="select_factor-formbuilder-12">
                                            <option value="" selected>--- Izvēlieties faktoru ---</option>
                                        </select>        
                                    </div>
                                </div>
                            </div>
                            <div data-for="selectRiskLevel" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="selectRiskLevel-formbuilder-12" class="form-control-label mbr-fonts-style display-7">* Kas rada risku?:</label>
                                <select  name="risk_cause_id[]" data-form-field="select_risk_cause" class="form-control display-7" id="select_risk_cause-formbuilder-12">
                                    <option value="" selected>--- Izvēlieties, kas rada risku ---</option>
                                </select>
                            </div>
                            <div data-for="selectRiskLevel" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="selectRiskLevel-formbuilder-12" class="form-control-label mbr-fonts-style display-7">* Riska līmenis (I - V):</label>
                                <select name="risk_level_id[]" data-form-field="selectRiskLevel" class="form-control display-7" id="selectRiskLevel-formbuilder-12">
                                    <option value="" selected>--- Izvēlieties riska līmeni ---</option>
                                    @foreach ($all_levels as $risk_level)
                                       <option value="{{$risk_level->id}}" data-value="{{$risk_level->name}}">{{$risk_level->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="riskEvent">
                                <label for="riskEvent-formbuilder-12" class="form-control-label mbr-fonts-style display-7">Ieteicamie riska novēršanas vai samazināšanas pasākumi:</label>
                                <textarea name="risk_event[]" placeholder="- Ierakstiet nepieciešamos riska pasākumus -" data-form-field="riskEvent" required="required" class="form-control display-7" id="riskEvent-formbuilder-12"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <span id="create_new_row" style="width: 100%;">

                            </span>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" style="padding-left: 5px; padding-right: 5px;">
                                <button id="add_new_row" type="button" class="btn btn-secondary display-7">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>                                    
                                </button>
                            </div>    
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary display-7">Apstiprināt</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
