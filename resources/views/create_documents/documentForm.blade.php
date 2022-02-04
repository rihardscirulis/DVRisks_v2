@extends('application.app')

@section('content')
    <div class="container">
        <h1>Riska novērtēšanas anketa</h1>
        <hr>
        <div id="formField">
            <div class="form-group container form-horizontal">
                <form method="POST" action="/izveidotdokumentu" class="needs-validation" novalidate>
                    @csrf
                    <label for="noteAuthorityLabel"><span id="noteForFactorFields">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span id="requiredText">* </span>Izvēlies iestādi:</span>
                        </div>
                        <select class="form-control" name="authorityListItem" id="authorityListItem" required>
                            <option selected disabled hidden value="" >--- Izvēlieties iestādi ---</option>
                            @foreach ($authorityList as $authority)
                               <option value="{{$authority->authorityID}}" data-value="{{$authority->authorityTitle}}">{{$authority->authorityTitle}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Lūdzu, izvēlieties iestādi!
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span id="requiredText">* </span>Datums:</span>
                                    </div>
                                    <input type="date" class="form-control" name="documentDate" id="documentDate" required>
                                    <div class="invalid-feedback">
                                        Lūdzu, izvēlieties datumu!
                                    </div>                
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span id="requiredText">* </span>Dokumenta numurs:</span>
                                    </div>
                                    <input type="text" class="form-control" name="documentNumber" id="documentNumber" required>
                                    <div class="invalid-feedback">
                                        Lūdzu, ievadiet dokumenta numuru!
                                    </div>                
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span id="requiredText">* </span>Riska vērtējumā piedalās:</span>
                                    </div>
                                    <select class="form-control" name="appraiser" id="appraiser" required>
                                        <option selected disabled hidden value="">--- Riska vērtējumā piedalās ---</option>
                                        @foreach ($authorityList as $authority)
                                            <optgroup label="{{$authority->authorityTitle}}">
                                                @foreach ($personList as $person)
                                                    @foreach ($personAuthorityList as $personAuthority)
                                                            @if ($person->personID == $personAuthority->personID)
                                                                @if ($authority->authorityID == $personAuthority->personAuthorityID)
                                                                    <option value="{{$person->personID}}">{{$person->personName}} {{$person->personSurname}}</option>
                                                                @endif
                                                            @endif
                                                    @endforeach
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Lūdzu, izvēlieties aptaujas veiceju!
                                    </div>                  
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span id="requiredText">* </span> Darba vieta, iekārta, darba veids:</span>
                                    </div>
                                    <select class="form-control" name="workEnvironment" id="workEnvironment" required>
                                        <option selected disabled hidden value="" >--- -- Izvēlies darba vidi ---</option>
                                        @foreach ($authorityList as $authority)
                                            <optgroup label="{{$authority->authorityTitle}}">
                                                @foreach ($environmentList as $environment)
                                                    @if ($environment->authorityID == $authority->authorityID)
                                                        <option value="{{$environment->environmentID}}">{{$environment->environmentName}}</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Lūdzu, izvēlieties darba veidu, iekārtu, darba veidu!
                                    </div>                
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span id="requiredText">* </span> Riska faktoru novērtēšanas apstākļi:</span>
                                    </div>
                                    <textarea class="form-control" name="riskCondition" id="riskCondition" cols="1" rows="1" placeholder="-- Ievadiet riska faktoru novērtējumu apstākli --" required></textarea>
                                    <div class="invalid-feedback">
                                        Lūdzu, aizpildiet lauku!
                                    </div>                
                                </div><br>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span id="requiredText">* </span> Darba procesa apraksts:</span>
                                    </div>
                                    <textarea class="form-control" name="workDescription" id="workDescription" cols="1" rows="1" placeholder="-- Ievadiet ieteicamo riska pasākumu --" required></textarea>
                                    <div class="invalid-feedback">
                                        Lūdzu, aizpildiet lauku!
                                    </div>                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered border-primary" id="createDocumentTable">
                            <thead>
                                <tr class="align-middle">
                                    <th scope="col" class="align-middle">Darba vides riska faktori</th>
                                    <th scope="col" class="align-middle">Riska līmenis (I - V)</th>
                                    <th scope="col" class="align-middle">Ieteicamie riska novēršanas vai samazināšanas pasākumi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>
                                        <select class="form-control form-control-sm" name="riskFactorSelectMenu[0]" id="riskFactorSelectMenu[0]" required>
                                            <option selected disabled hidden value="" >-- Riska faktors --</option>
                                            @foreach ($factorGroupList as $factorGroup)
                                                <optgroup label="{{$factorGroup->factorGroupTitle}}">
                                                    @foreach ($factorList as $factor)
                                                        @if ($factorGroup->factorGroupID == $factor->factorGroup_ID)
                                                            @foreach ($riskCauseList as $riskCause)
                                                                @if ($riskCause->riskCauseFactorID == $factor->factorID)
                                                                    <option value="{{$factorGroup->factorGroupID}}-{{$factor->factorID}}/{{$riskCause->riskCauseID}}">{{$factorGroup->factorGroupTitle}} - {{$factor->factorTitle}} - {{$riskCause->riskCauseName}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-control form-control-sm" name="riskLevelSelectMenu[0]" id="riskLevelSelectMenu[0]" required>
                                            <option selected disabled hidden value="" >-- Riska līmenis --</option>
                                            @foreach ($riskLevel as $level)
                                                <option value="{{$level->riskLevelID}}">{{$level->riskLevelTitle}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th>
                                        <textarea class="form-control form-control-sm" name="riskEventTextArea[0]" id="riskEventTextArea[0]" cols="0" rows="0" required></textarea>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-outline-danger" id="removeTableRow">-</button>    
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <button type="button" class="btn btn-outline-info" id="addNewTableRow">Pievienot rindu</button>
                        </div>
                        <hr>
                        <div id="spaceForSelectFactors"></div>
                        <div>
                            <button type="submit" class="btn btn-primary">Ģenerēt dokumentu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('scripts.createDocumentJavascript')
@endsection  