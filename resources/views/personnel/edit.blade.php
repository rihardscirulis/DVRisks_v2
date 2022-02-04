@extends('application.app')

@section('content')
    <div class="container">
        <h1>Personāla saraksta labošana</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                {!! Form::open(['action' => ['StaffController@update', $environment->ID], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="writeFactorLabel"><span id="requiredText">* </span>Darba vide:</label><br>
                            <select class="form-control" id="environmentItem" name="environmentItem" required>
                                <option selected hidden value="{{$environment->ID}}">{{$environment->Nosaukums}}</option>
                                @foreach ($environmentList as $environment)
                                    <option value="{{$environment->environmentID}}">{{$environment->environmentName}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Lūdzu, izvēlies iestādi!
                            </div>        
                        </div>
                    </div>
                    @php
                        $i = 1;
                        $authorityID = $authority->ID;
                        $authorityName = $authority->Nosaukums;
                    @endphp
                    @foreach ($personList as $person)
                        <hr>
                        <label for="personList"><span id="boldFont">Persona #{{$i++}} - {{$person->Vards}} {{$person->Uzvards}}</span></label>
                        <div class="row">
                            <div class="col">
                                <label for="writeFactorLabel"><span id="requiredText">* </span>Vārds:</label>
                                <input type="text" class="form-control" value="{{$person->Vards}}" name="staffName[]" id="staffName[]" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Lūdzu, aizpildi vārda lauku!
                                </div>
                            </div>
                            <div class="col">
                                <label for="writeFactorLabel"><span id="requiredText">* </span>Uzvārds:</label>
                                <input type="text" class="form-control" value="{{$person->Uzvards}}" name="staffSurname[]" id="staffSurname[]" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Lūdzu, aizpildi uzvārda lauku!
                                </div>
                            </div>
                            <div class="col">
                                <label for="writeFactorLabel"><span id="requiredText">* </span>Personas kods:</label>
                                <input type="text" class="form-control" pattern="[0-9]{6}[-]{1}[0-9]{5}" minlength="12" maxlength="12" value="{{$person->Personas_kods}}" name="staffPersonCode[]" id="staffPersonCode[]" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Lūdzu, aizpildi personas koda lauku!
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="writeFactorLabel">Telefona numurs:</label>
                                <input type="text" class="form-control" pattern="[0-9]{8}" minlength="8" maxlength="8" value="{{$person->Telefons}}" name="staffTelephoneNumber[]" id="staffTelephoneNumber[]" autocomplete="off">
                                <div class="invalid-feedback">
                                    Lūdzu, aizpildi telefona numura lauku!
                                </div>
                            </div>
                            <div class="col">
                                <label for="writeFactorLabel">E-pasts:</label>
                                <input type="email" class="form-control" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" value="{{$person->Epasts}}" name="staffEmail[]" id="staffEmail[]" autocomplete="off">
                                <div class="invalid-feedback">
                                    Lūdzu, aizpildi e-pasta lauku!
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="writeFactorLabel"><span id="requiredText">* </span>Iestade:</label><br>
                                <select class="form-control" id="authorityItem[]" name="authorityItem[]" required>
                                    <option selected disabled hidden value="{{$authorityID}}">{{$authorityName}}</option>
                                    <optgroup label="Iestādes">
                                        @foreach ($authorityList as $authority)
                                            <option value="{{$authority->authorityID}}">{{$authority->authorityName}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                <div class="invalid-feedback">
                                    Lūdzu, izvēlies iestādi!
                                </div>
                            </div>
                                <div class="col">
                                <label for="writeFactorLabel"><span id="requiredText">* </span>Amats:</label><br>
                                <select class="form-control" id="positionItem[]" name="positionItem[]" required>
                                    @foreach ($positionListForPerson as $positionPerson)
                                        @if ($person->AmatsID == $positionPerson->ID)
                                            <option selected hidden value="{{$positionPerson->ID}}">{{$positionPerson->Nosaukums}}</option>
                                        @endif
                                    @endforeach
                                    @foreach ($authorityList as $authority)
                                        <optgroup label="{{$authority->authorityName}}">
                                            @foreach ($environmentList as $environment)
                                                @if ($authority->authorityID == $environment->authorityID)
                                                    <optgroup label="&nbsp;&nbsp;{{$environment->environmentName}}"> 
                                                        @foreach ($positionList as $position)
                                                            @if ($environment->environmentID == $position->environmentID)
                                                                <option value="{{$position->positionID}}">{{$position->positionName}}</option>   
                                                            @endif
                                                        @endforeach
                                                @endif
                                                </optgroup>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Lūdzu, izvēlies amatu!
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="writeFactorLabel"><span id="requiredText">* </span>Darba vieta:</label><br>
                                <select class="form-control" id="workLocationItem[]" name="workLocationItem[]" required>
                                    @foreach ($workLocationDBList as $workLocationDB)
                                        @if ($person->ID == $workLocationDB->personID)
                                            <option selected hidden value="{{$workLocationDB->workLocationID}}">{{$workLocationDB->workLocationName}}</option>
                                        @endif
                                    @endforeach
                                    @foreach ($authorityList as $authority)
                                        <optgroup label="{{$authority->authorityName}}">
                                            @foreach ($environmentList as $environment)
                                                @if ($authority->authorityID == $environment->authorityID)
                                                    <optgroup label="&nbsp;&nbsp;{{$environment->environmentName}}"> 
                                                    @foreach ($workLocationList as $workLocation)
                                                        @if ($workLocation->workLocationEnvironmentID == $environment->environmentID)
                                                            <option value="{{$workLocation->workLocationID}}">{{$workLocation->workLocationName}}</option>   
                                                        @endif
                                                    @endforeach    
                                                @endif
                                                </optgroup>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Lūdzu, izvēlies amatu!
                                </div>        
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Apstiprināt', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>    
        </div>
    </div>
    @include('scripts.checkValidity')
@endsection  