@extends('application.app')

@section('content')
    <div class="container">
        <h1>Darba vides un vietas saraksts/pievienošana</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                <form method="POST" action="/vide" class="needs-validation" novalidate>
                    @csrf
                    <label for="noteFactorLabel"><span id="noteForFactorFields">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                    <div class="row">
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Izvēlieties iestādi:</label>
                            <select class="form-control" id="authorityGroupList" name="authorityGroupList" required>
                                <option selected disabled hidden value="" >--- Izvēlieties iestādi ---</option>
                                @foreach ($authorityList as $authority)
                                    <option value="{{$authority->authorityID}}">{{$authority->authorityName}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Lūdzu, izvēlieties iestādi!
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">   
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Ievadiet iestades darba vidi:</label>
                            <input type="text" class="form-control" name="newAuthorityEnvironment" id="newAuthorityEnvironment" placeholder="--- Ievadiet jaunu iestādes darba vidi ---" required>
                            <div class="invalid-feedback">
                                Lūdzu, ievadiet iestādes darba vidi!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="writeFactorLabel"><span id="requiredText">* </span>Ievadiet iestādes darba vietu:</label><br>
                            <div class="position-relative">
                                <div id="inputAuthorityCabinetRow">
                                    <div class="input-group is-invalid">
                                        <input type="text" name="newAuthorityCabinet[0]" id="newAuthorityCabinet[0]" class="form-control" placeholder="--- Ievadiet jaunu iestādes darba vietu ---" autocomplete="off">
                                        <div class="input-group-append">
                                            <button id="removeAuthorityCabinetRow" type="button" class="btn btn-danger">Noņemt</button>
                                        </div>
                                        <div class="invalid-feedback">
                                            Lūdzu, ievadiet jauno iestādes darba vietu!
                                        </div>                
                                    </div>
                                </div>
                            </div>
                            <div id="newAuthorityCabinetRow"></div>
                            <button id="addAuthorityCabinetRow" type="button" class="btn btn-info" >Pievienot rindu</button>        
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Apstiprināt</button>
                </form>
            </div>
            <div class="container">
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
                                            <span id="boldFont">Darba vieta:</span>
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
                                                        @if ($workLocation->workLocationEnvironmentID == $environment->environmentID)
                                                            <i class="bi bi-geo-fill"></i> {{$workLocation->workLocationName}}<br>
                                                        @endif
                                                    @endforeach        
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col col-lg-2">
                                                            {!!Form::open(['action' => ['EnvironmentController@destroy', $environment->environmentID], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                                                                {{Form::hidden('method', 'DELETE')}}
                                                                {{Form::button('<i class="bi bi-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-lg', 'onclick' => 'return confirm("Vai esat pārliecināts ka nepieciešams dzēst?")'])}}
                                                            {!!Form::close() !!}
                                                        </div>
                                                        <div class="col col-lg-2">
                                                            <a href="/vide/{{$environment->environmentID}}/edit" class="btn btn-outline-dark btn-lg"><i class="bi bi-pencil-square"></i></a>
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
                @endforeach
            </div>    
        </div>
    </div>
    @include('scripts.environmentJavascript')
    @include('scripts.checkValidity')
@endsection  