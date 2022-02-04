@extends('application.index')

@section('content')
    <section class="form cid-sQkANrOFza" id="formbuilder-z" style="padding-bottom: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                    {!! Form::open(['action' => ['PersonnelController@update', $environment->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'mbr-form form-with-styler', 'data-form-title' => 'Form Name']) !!}
                        @csrf    
                        <div class="dragArea form-row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="mbr-fonts-style display-5">Personāla saraksta labošanas forma</h4>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <div data-for="environment" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="environment-formbuilder-z" class="form-control-label mbr-fonts-style display-7">* Rediģēt darba vidi:</label>
                                <select name="environment_id" data-form-field="selectEnvironment" class="form-control display-7" id="selectEnvironment-formbuilder-m">
                                    <option selected hidden value="{{$environment->id}}">{{$environment->name}}</option>
                                    @foreach ($authorities as $authority)
                                        @foreach ($authority->environments as $environments)
                                            <option value="{{$environments->id}}">{{$environments->name}}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($personnels as $personnel)
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <hr>
                                </div>
                                <label class="form-control-label mbr-fonts-style display-7"># {{$i++}}. persona - {{$personnel->name}} {{$personnel->surname}}:</label>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">* Rediģēt personas vārdu, uzvārdu:</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" name="name[]" placeholder="- Ievadiet personas vārdu -" data-form-field="staffName" required="required" class="form-control text-multiple" value="{{$personnel->name}}" id="staffName-formbuilder-z">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="surname[]" placeholder="- Ievadiet personas uzvārdu -" data-form-field="staffSurname" required="required" class="form-control text-multiple" value="{{$personnel->surname}}" id="staffSurname-formbuilder-z">
                                        </div>
                                    </div>
                                </div>
                                <div data-for="staffPersonCode" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label for="staffPersonCode-formbuilder-z" class="form-control-label mbr-fonts-style display-7">* Rediģēt personas kodu:</label>
                                    <input type="text" name="person_code[]" placeholder="- Ievadiet personas kodu -" data-form-field="staffPersonCode" class="form-control display-7" required="required" value="{{$personnel->person_code}}" id="staffPersonCode-formbuilder-z">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">* Rediģēt personas telefona numuru, e-pastu</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" name="telephone_number[]" placeholder="- Ievadiet telefona numuru -" data-form-field="staffTelephoneNumber" required="required" class="form-control text-multiple" value="{{$personnel->telephone_number}}" id="staffTelephoneNumber-formbuilder-z">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="email[]" placeholder="- Ievadiet personas e-pastu -" data-form-field="staffEmail" required="required" class="form-control text-multiple" value="{{$personnel->email}}" id="staffEmail-formbuilder-z">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="staffAuthority">
                                    <label for="staffAuthority-formbuilder-z" class="form-control-label mbr-fonts-style display-7">* Rediģēt piešķirto iestādi un amatu:</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <select name="authority_id[]" data-form-field="staffAuthority" class="form-control display-7" id="staffAuthority-formbuilder-z">
                                                    @if($authority->id == $personnel->authority_id)
                                                        <option selected value="{{$authority->id}}">{{$authority->name}}</option>
                                                    @endif
                                                <optgroup label="Iestādes">
                                                    @foreach ($authorities as $authority)
                                                        <option value="{{$authority->id}}">{{$authority->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>        
                                        </div>
                                        <div class="col">
                                            <select name="position_id[]" data-form-field="staffPosition" class="form-control display-7" id="staffPosition-formbuilder-z">
                                                @foreach ($authority->positions as $position)
                                                    @if ($personnel->position_id == $position->id)
                                                        <option selected hidden value="{{$position->id}}">{{$position->name}}</option>
                                                    @endif
                                                @endforeach
                                                @foreach ($authorities as $authority)
                                                    <optgroup label="{{$authority->name}}">
                                                        @foreach ($authority->environments as $environment)
                                                            @if ($authority->id == $environment->authority_id)
                                                                <optgroup label="{{$environment->name}}"> 
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
                                    </div>
                                </div>
                                <div data-for="staffEnvironment" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label for="staffEnvironment-formbuilder-z" class="form-control-label mbr-fonts-style display-7">* Rediģēt piešķirto darba vidi:</label>
                                    <select name="workplace_id[]" data-form-field="staffEnvironment" class="form-control display-7" id="staffEnvironment-formbuilder-z">
                                        @foreach ($authority->workplaces as $workplace)
                                            @if ($workplace->id == $personnel->workplace_id)
                                                <option selected value="{{$workplace->id}}">{{$workplace->name}}</option>
                                            @endif
                                        @endforeach
                                        @foreach ($authorities as $authority)
                                            <optgroup label="{{$authority->name}}">
                                                @foreach ($authority->environments as $environment)
                                                    @if ($authority->id == $environment->authority_id)
                                                        <optgroup label="{{$environment->name}}"> 
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
                            @endforeach 
                            <div class="col-auto">
                                {{Form::hidden('_method', 'PUT')}}
                                {{Form::submit('Apstiprināt', ['class' => 'btn btn-primary display-7'])}}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection