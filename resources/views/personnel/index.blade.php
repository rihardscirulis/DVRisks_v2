@extends('application.app')

@section('content')
    <div class="container">
        <h1>Personāla pievienošana un saraksts</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                <label for="noteFactorLabel"><span id="noteForFactorFields">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                <form action="/personals" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="writeFactorLabel"><span id="requiredText">* </span>Ievadiet vārdu:</label><br>
                            <input type="text" class="form-control" placeholder="--- Ievadiet vārdu ---" name="staffName" id="staffName" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Lūdzu, aizpildi vārda lauku!
                            </div>
                        </div>
                        <div class="col">
                            <label for="writeFactorLabel"><span id="requiredText">* </span>Ievadiet uzvārdu:</label><br>
                            <input type="text" class="form-control" placeholder="--- Ievadiet uzvārdu ---" name="staffSurname" id="staffSurname" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Lūdzu, aizpildi uzvārda lauku!
                            </div>
                        </div>
                        <div class="col">
                            <label for="writeFactorLabel"><span id="requiredText">* </span>Ievadiet personas kodu:</label><br>
                            <input type="text" class="form-control" pattern="[0-9]{6}[-]{1}[0-9]{5}" minlength="12" maxlength="12" placeholder="--- Ievadiet personas kodu ---" name="staffPersonCode" id="staffPersonCode" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Lūdzu, aizpildi personas koda lauku!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="writeFactorLabel">Ievadiet telefona numuru:</label><br>
                            <input type="text" class="form-control" pattern="[0-9]{8}" minlength="8" maxlength="8" placeholder="--- Ievadiet telefona numuru ---" name="staffTelephoneNumber" id="staffTelephoneNumber" autocomplete="off">
                            <div class="invalid-feedback">
                                Lūdzu, aizpildi telefona numura lauku!
                            </div>
                        </div>
                        <div class="col">
                            <label for="writeFactorLabel">Ievadiet e-pastu:</label><br>
                            <input type="email" class="form-control" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" placeholder="--- Ievadiet e-pastu ---" name="staffEmail" id="staffEmail" autocomplete="off">
                            <div class="invalid-feedback">
                                Lūdzu, aizpildi e-pasta lauku!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="writeFactorLabel"><span id="requiredText">* </span>Izvēlieties iestādi:</label><br>
                            <select class="form-control" id="authorityListItem" name="authorityListItem" required>
                                <option selected disabled hidden value="" >--- Izvēlieties iestādi ---</option>
                                @foreach ($authorityList as $authority)
                                    <option value="{{$authority->authorityID}}">{{$authority->authorityName}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Lūdzu, izvēlies iestādi!
                            </div>        
                        </div>
                        <div class="col">
                            <label for="writeFactorLabel"><span id="requiredText">* </span>Izvēlieties amatu:</label><br>
                            <select class="form-control" id="positionListItem" name="positionListItem" required>
                                <option selected disabled hidden value="" >--- Izvēlieties amatu ---</option>
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
                            <label for="writeFactorLabel"><span id="requiredText">* </span>Izvēlieties darba vietu:</label><br>
                            <select class="form-control" id="workLocation" name="workLocation" required>
                                <option selected disabled hidden value="" >--- Izvēlieties darba vietu ---</option>
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
                    <hr>
                    <button type="submit" class="btn btn-primary">Apstiprināt</button>
                </form>
            </div>    
            <div class="container">
                <hr>
                @foreach ($authorityList as $authority)
                <div id="accordion">
                    <div class="card" id="cardMarginRemove">
                        <div class="card-header" id="headingOne#{{$authority->authorityID}}">
                            <h2 class="mb-0">
                                <button class="btn btn-outline-secondary" style="width:100%" data-toggle="collapse" data-target="#collapseOne{{$authority->authorityID}}" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="bi bi-building"></i>  {{$authority->authorityName}}
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne{{$authority->authorityID}}" class="collapse" aria-labelledby="headingOne#{{$authority->authorityID}}" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span id="boldFont">Darba vide:</span>
                                    </div>
                                    <div class="col">
                                        <span id="boldFont">Darba vieta - Personāls:</span>
                                    </div>
                                    <div class="col">
                                        <span id="boldFont">Darbības</span>
                                    </div>
                                </div>
                                <hr>    
                                @foreach ($environmentList as $environment)
                                    @if ($environment->authorityID == $authority->authorityID)
                                        <div class="row">
                                            <div class="col">
                                                {{$environment->environmentName}}
                                            </div>
                                            <div class="col">
                                                @foreach ($workLocationList as $workLocation)
                                                    @if ($environment->environmentID == $workLocation->workLocationEnvironmentID)
                                                        <i class="bi bi-tools"></i> <span id="boldFont">{{$workLocation->workLocationName}}:</span><br>
                                                        @foreach ($staffList as $staff)
                                                            @foreach ($getWorkLocationStaffList as $workLocationStaff)
                                                                @if ($staff->staffID == $workLocationStaff->staffID)
                                                                    @if ($workLocation->workLocationID == $workLocationStaff->workLocationID)
                                                                        {{$staff->staffName}} {{$staff->staffSurname}}<br>  
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                @endforeach        
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col col-lg-2">
                                                        {!!Form::open(['action' => ['StaffController@destroy', $environment->environmentID], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                                                            {{Form::hidden('method', 'DELETE')}}
                                                            {{Form::button('<i class="bi bi-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-lg', 'onclick' => 'return confirm("Vai esat pārliecināts ka nepieciešams dzēst?")'])}}
                                                        {!!Form::close() !!}
                                                    </div>
                                                    <div class="col col-lg-2">
                                                        <a href="/personals/{{$environment->environmentID}}/edit" class="btn btn-outline-dark btn-lg"><i class="bi bi-pencil-square"></i></a>
                                                    </div>
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
    @include('scripts.checkValidity')
@endsection  