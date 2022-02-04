@extends('application.index')

@section('content')
    <section class="form cid-sQkANrOFza" id="formbuilder-z">
        <!-- Messages bar -->
        @include('inc.messages')
        <!-- //////////// -->            
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                    <form action="/personnel" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                        @csrf
                        <div class="dragArea form-row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="mbr-fonts-style display-5">Personāla pievienošana/saraksts</h4>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="name-formbuilder-5" class="form-control-label mbr-fonts-style display-7">* - obligātie aizpildāmie lauki</label><br><br>
                                <label class="form-control-label mbr-fonts-style display-7">* Personas vārds, uzvārds:</label>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" name="name" placeholder="- Ievadiet personas vārdu -" data-form-field="staffName" required="required" class="form-control text-multiple" value="" id="staffName-formbuilder-z">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="surname" placeholder="- Ievadiet personas uzvārdu -" data-form-field="staffSurname" required="required" class="form-control text-multiple" value="" id="staffSurname-formbuilder-z">
                                    </div>
                                </div>
                            </div>
                            <div data-for="staffPersonCode" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="staffPersonCode-formbuilder-z" class="form-control-label mbr-fonts-style display-7">* Personas kods:</label>
                                <input type="text" name="person_code" placeholder="- Ievadiet personas kodu -" data-form-field="staffPersonCode" class="form-control display-7" required="required" value="" id="staffPersonCode-formbuilder-z">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label class="form-control-label mbr-fonts-style display-7">Telefona numurs, e-pasts:</label>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" name="telephone_number" placeholder="- Ievadiet telefona numuru -" data-form-field="staffTelephoneNumber" required="required" class="form-control text-multiple" value="" id="staffTelephoneNumber-formbuilder-z">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="email" placeholder="- Ievadiet personas e-pastu -" data-form-field="staffEmail" required="required" class="form-control text-multiple" value="" id="staffEmail-formbuilder-z">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label class="form-control-label mbr-fonts-style display-7">Izvēlieties iestādi un darba vidi:</label>
                                <div class="form-row">
                                    <div class="col">
                                        <select name="authority_id" data-form-field="selectAuthority" class="form-control display-7" id="selectAuthority-formbuilder-z">
                                            <option selected disabled hidden value="">- Izvēlieties iestādi -</option>
                                            @foreach ($data as $authority)
                                                <option value="{{$authority->id}}">{{$authority->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="environment_id" data-form-field="selectPosition" class="form-control display-7" id="selectPosition-formbuilder-z">
                                            <option  selected disabled hidden value="">-- Izvēlieties darba vidi --</option>
                                            @foreach ($data as $authority)
                                                @foreach ($authority->environments as $environment)
                                                    <option value="{{$environment->id}}">{{$environment->name}}</option>   
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label class="form-control-label mbr-fonts-style display-7">Izvēlieties amatu un darba vietu:</label>
                                <div class="form-row">
                                    <div class="col">
                                        <select name="position_id" data-form-field="selectPosition" class="form-control display-7" id="selectPosition-formbuilder-z">
                                            <option  selected disabled hidden value="">-- Izvēlieties amatu --</option>
                                            @foreach ($data as $authority)
                                                <optgroup label="{{$authority->name}}">
                                                    @foreach ($authority->environments as $environment)
                                                        @if ($authority->id == $environment->authority_id)
                                                            <optgroup label="&nbsp;&nbsp;{{$environment->name}}"> 
                                                            @foreach ($authority->positions as $position)
                                                                @if ($environment->id == $position->environment_id)
                                                                    <option value="{{$position->id}}">{{$position->name}}</option>   
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        </optgroup>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="workplace_id" data-form-field="selectEnvironment" class="form-control display-7" id="selectEnvironment-formbuilder-z">
                                            <option selected disabled hidden value="">-- Izvēlieties darba vietu --</option>
                                            @foreach ($data as $authority)
                                                <optgroup label="{{$authority->name}}">
                                                    @foreach ($authority->environments as $environment)
                                                        @if ($authority->id == $environment->authority_id)
                                                            <optgroup label="&nbsp;&nbsp;{{$environment->name}}"> 
                                                            @foreach ($authority->workplaces as $workplace)
                                                                @if ($workplace->environment_id == $environment->id)
                                                                    <option value="{{$workplace->id}}">{{$workplace->name}}</option>   
                                                                @endif
                                                            @endforeach    
                                                        @endif
                                                        </optgroup>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
    
    <section class="content17 cid-sQkDimmEHi" id="content17-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="mbr-section-head align-center"></div>
                    <div id="bootstrap-toggle" class="toggle-panel accordionStyles tab-content mt-4">
                        @foreach ($data as $authority)
                            <div class="card mb-3">
                                <div class="card-header" role="tab" id="heading{{$authority->id}}">
                                    <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-core="" href="#collapse{{$authority->id}}" aria-expanded="false" aria-controls="collapse{{$authority->id}}">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>
                                        <h6 class="mbr-fonts-style display-7">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                                                <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                                            </svg>
                                            {{$authority->name}}  
                                        </h6>
                                    </a>
                                </div>
                                <div id="collapse{{$authority->id}}" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="heading{{$authority->id}}">
                                    <div class="panel-body p-3">
                                        <div class="row">
                                            <div class="col">
                                                <strong>Darba vide:</strong>
                                            </div>
                                            <div class="col">
                                                <strong>Darba vieta - Personāls:</strong>
                                            </div>
                                            <div class="col">
                                                <strong>Darbības</strong>
                                            </div>
                                        </div>
                                        <hr>
                                        @foreach ($authority->environments as $environment)
                                            @if ($environment->authority_id == $authority->id)
                                                <div class="row">
                                                    <div class="col">
                                                        {{$environment->name}}
                                                    </div>
                                                    <div class="col">
                                                        @foreach ($authority->workplaces as $workplace)
                                                            @if ($environment->id == $workplace->environment_id)
                                                                <strong>{{$workplace->name}}:</strong><br>
                                                                @foreach ($authority->personnels as $personnel)
                                                                    @if ($workplace->id == $personnel->workplace_id)
                                                                        <div class="row pl-4">
                                                                            {{$personnel->name}} {{$personnel->surname}}<br>
                                                                        </div>    
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach        
                                                    </div>
                                                    <div class="col">
                                                        <div class="row">
                                                            <a href="/personnel/destroy/{{$environment->id}}" class="btn btn-outline-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="row">
                                                            <a href="/personnel/edit/{{$environment->id}}" class="btn btn-outline-dark">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                                </svg>    
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection