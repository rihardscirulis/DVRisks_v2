@extends('application.app')

@section('content')
    <div class="container">
        <h1>Faktora grupas "{{$edit_factor->factor_group->name}}" labošana</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                {!! Form::open(['action' => ['FactorController@update', $edit_factor->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <label for="noteFactorLabel"><span id="noteForFactorFields">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                    <div class="row">
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Faktora grupa:</label>
                            <input type="text" name="factor_group_name" id="factorGroupTitle" class="form-control" value="{{$edit_factor->factor_group->name}}" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Lūdzu, izvēlies darba riska faktora grupu!
                            </div>
                            <div class="valid-feedback">
                                Izskatās labi!
                            </div>        
                        </div>
                        <div class="col">
                            <label for="writeFactorLabel"><span id="requiredText">* </span>Riska faktors:</label><br>
                            <div id="inputFactorRow">
                                <div class="input-group">
                                    <input type="text" name="factor_name" id="factorTitle" class="form-control" value="{{$edit_factor->name}}" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Lūdzu, aizpildi darba riska faktora lauku!
                                    </div>
                                    <div class="valid-feedback">
                                        Izskatās labi!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="writeFactorLabel">Riski:</label><br>
                            <div class="position-relative">
                                @foreach ($edit_factor->risk_causes as $risk_cause)
                                    <div id="inputRiskCauseRow">
                                        <div class="input-group is-invalid">
                                            <input type="text" name="risk_cause[]" id="riskCause[]" class="form-control" value="{{$risk_cause->name}}" autocomplete="off">
                                            <div class="btn-group-append">
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-danger">
                                                        <input type="checkbox" type="checkbox" name="risk_cause_id[]" value="{{$risk_cause->id}}" autocomplete="off"><i class="bi bi-trash-fill"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                Lūdzu, aizpildiiet laukus, kas rāda risku!
                                            </div>
                                            <div class="valid-feedback">
                                                Izskatās labi!
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div id="newRiskCauseRow"></div>
                            <button id="addRiskCauseRow" type="button" class="btn btn-info" >Pievienot rindu</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="writeFactorLabel">Riska kārtība:</label><br>
                            @foreach ($edit_factor->risk_procedures as $risk_procedure)
                                <input type="text" name="name" id="riskProcedure" class="form-control" value="{{$risk_procedure->name}}" autocomplete="off">
                                <div class="invalid-feedback">
                                    Lūdzu, aizpildiiet lauku par pastāvoši risku, kas jānovērtē!
                                </div>
                                <div class="valid-feedback">
                                    Izskatās labi!
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Apstiprināt', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @include('scripts.factorEditJavascript')
@endsection  