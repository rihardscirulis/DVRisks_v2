@extends('application.app')

@section('content')
    <div class="container">
        <h1>Jauna riska pievienošana</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                <form method="POST" action="/risks" class="needs-validation" novalidate>
                    @csrf
                    <label for="noteFactorLabel"><span id="noteForFactorFields">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                    <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Izvēlieties faktoru:</label>
                    <div class="position-relative">
                        <select class="form-control custom-select" id="riskListItem" name="riskListItem" required>
                            <option selected disabled hidden value="">--- Izvēlieties faktoru ---</option>
                            @foreach($factorGroupList as $factorGroup)
                                <optgroup label="{{$factorGroup->title}}">
                                    @foreach ($factorList as $factor)
                                        @if ($factorGroup->id == $factor->factorTableGroupID)
                                            <option value="{{$factor->factorID}}">{{$factor->factorTitle}}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <div class="invalid-tooltip">
                            Lūdzu, izvēlies faktoru no izvēles lauka!
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="writeFactorLabel"><span id="requiredText">* </span>Ievadiet riska nosaukumu:</label><br>
                            <div class="position-relative">
                                <div id="inputFormRow">
                                    <div class="input-group">
                                        <input type="text" name="newFactorTitle[0]" id="newFactorTitle[0]" class="form-control" placeholder="--- Ievadiet darba risku ---" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <button id="removeRow" type="button" class="btn btn-danger" id="button-addon2">Noņemt</button>
                                        </div>
                                        <div class="invalid-tooltip">
                                            Lūdzu, aizpildi darba riska lauku
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="newRow"></div>
                            <button id="addRow" type="button" class="btn btn-info" >Pievienot rindu</button>
                        </div>
                    </div>
                    <hr>           
                    <button type="submit" class="btn btn-primary">Apstiprināt</button>
                </form>
            </div>
        </div>
    </div>
@endsection  