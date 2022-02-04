@extends('application.app')

@section('content')
    <div class="container">
        <h1>Jauna faktora pievienošana</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                <form method="POST" action="/faktors" class="needs-validation" novalidate>
                    @csrf
                    <label for="noteFactorLabel"><span id="noteForFactorFields">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                    <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Izvēlieties darba riska faktora grupu:</label>
                    <select class="form-control" id="factorGroupListItem" name="factorGroupListItem" required>
                        <option selected disabled hidden value="" >--- Izvēlieties faktora grupu ---</option>
                        @foreach ($factorGroupList as $factorGroup)
                            <option value="{{$factorGroup->factorGroupID}}">{{$factorGroup->factorGroupTitle}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Lūdzu, izvēlies darba riska faktora grupu!
                    </div>
                    <div class="valid-feedback">
                        Izskatās labi!
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="writeFactorLabel"><span id="requiredText">* </span>Ievadiet darba riska faktoru:</label><br>
                            <div id="inputFactorRow">
                                <div class="input-group">
                                    <input type="text" name="newFactorTitle" id="newFactorTitle" class="form-control" placeholder="--- Ievadiet darba riska faktoru ---" autocomplete="off" required>
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
                        <div class="col-lg-12">
                            <label for="writeFactorLabel">Kas rāda risku?:</label><br>
                            <div class="position-relative">
                                <div id="inputRiskCauseRow">
                                    <div class="input-group">
                                        <input type="text" name="newRiskCauseTitle[0]" id="newRiskCauseTitle[0]" class="form-control" placeholder="--- Ievadiet darba riska cēloni ---" autocomplete="off">
                                        <div class="input-group-append">
                                            <button id="removeRiskCauseRow" type="button" class="btn btn-danger">Noņemt</button>
                                        </div>
                                        <div class="invalid-feedback">
                                            Lūdzu, aizpildiiet laukus, kas rāda risku!
                                        </div>
                                        <div class="valid-feedback">
                                            Izskatās labi!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="newRiskCauseRow"></div>
                            <button id="addRiskCauseRow" type="button" class="btn btn-info" >Pievienot rindu</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="writeFactorLabel">Ievadiet pastāvošo risku, kas jānovērtē:</label><br>
                            <input type="text" name="newRiskProcedure" id="newRiskProcedure" class="form-control" placeholder="--- Ievadiet darba riska novērtēšanas kārtību ---" autocomplete="off">
                            <div class="invalid-feedback">
                                Lūdzu, aizpildiiet lauku par pastāvoši risku, kas jānovērtē!
                            </div>
                            <div class="valid-feedback">
                                Izskatās labi!
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Apstiprināt</button>
                </form>
            </div>
            <div class="container">
                <hr>
                @foreach ($factorGroupList as $factorGroup)
                    <div id="accordion">
                        <div class="card" id="cardMarginRemove">
                            <div class="card-header" id="headingOne#{{$factorGroup->factorGroupID}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-outline-secondary" style="width:100%" data-toggle="collapse" data-target="#collapseOne{{$factorGroup->factorGroupID}}" aria-expanded="false" aria-controls="collapseOne">
                                        <i class="bi bi-card-list"></i> {{$factorGroup->factorGroupTitle}}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne{{$factorGroup->factorGroupID}}" class="collapse" aria-labelledby="headingOne#{{$factorGroup->factorGroupID}}" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col text-center">
                                            <span id="boldFont">Faktors:</span>
                                        </div>
                                        <div class="col text-center">
                                            <span id="boldFont">Kas rada risku?</span>
                                        </div>
                                        <div class="col text-center">
                                            <span id="boldFont">Riska kārtība</span>
                                        </div>
                                        <div class="col text-center">
                                            <span id="boldFont">Darbības</span>
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach ($factorList as $factor)
                                        @if ($factorGroup->factorGroupID == $factor->factorGroup_ID)
                                            <div class="row">
                                                <div class="col">
                                                    @if ($factorGroup->factorGroupID == $factor->factorGroup_ID)
                                                        <i class="bi bi-cone-striped"></i> {{$factor->factorTitle}}<br>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @foreach ($factorRiskCauseList as $riskCause)
                                                        @if ($riskCause->riskCauseFactorID == $factor->factorID)
                                                            <i class="bi bi-exclamation-circle-fill"></i> {{$riskCause->riskCauseName}}<br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="col">
                                                    @foreach ($factorRiskProcedureList as $riskProcedure)
                                                        @if ($riskProcedure->riskProcedureFactorID == $factor->factorID)
                                                            @if ($riskProcedure->riskProcedureFactorID == $factor->factorID)
                                                                <i class="bi bi-hourglass-split"></i> {{$riskProcedure->riskProcedureName}}
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="col">
                                                    <div class="row justify-content-center">
                                                        {!!Form::open(['action' => ['FactorController@destroy', $factor->factorID], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                                                            {{Form::hidden('method', 'DELETE')}}
                                                            {{Form::button('<i class="bi bi-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-lg', 'onclick' => 'return confirm("Vai esat pārliecināts ka nepieciešams dzēst?")'])}}
                                                        {!!Form::close() !!}
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <a href="/faktors/{{$factor->factorID}}/edit" class="btn btn-outline-dark btn-lg"><i class="bi bi-pencil-square"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
    @include('scripts.factorJavascript')
@endsection  