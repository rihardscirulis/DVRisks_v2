@extends('application.app')

@section('content')
    <div class="container">
        <h1>Darba vides un vietas labošana</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                {!! Form::open(['action' => ['EnvironmentController@update', $environment->ID], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <label for="noteFactorLabel"><span id="noteForFactorFields">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                    <div class="row">
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Izvēlieties iestādi:</label>
                            <select class="form-control" id="authorityGroupList" name="authorityGroupList" required>
                                <option selected value="{{$authority->ID}}" >{{$authority->Nosaukums}}</option>
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
                            <input type="text" class="form-control" name="newAuthorityEnvironment" id="newAuthorityEnvironment" value="{{$environment->Nosaukums}}" required>
                            <div class="invalid-feedback">
                                Lūdzu, ievadiet iestādes darba vidi!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="writeFactorLabel"><span id="requiredText">* </span>Ievadiet iestādes darba vietu:</label><br>
                            <div id="newAuthorityCabinetRow">
                                @foreach ($workLocationList as $workLocation)
                                    <div class="position-relative">
                                        <div id="inputAuthorityCabinetRow">
                                            <div class="input-group is-invalid">
                                                <input type="text" name="AuthorityCabinet[]" class="form-control" value="{{$workLocation->Nosaukums}}" autocomplete="off">
                                                <div class="input-group-append">
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-outline-danger">
                                                            <input type="checkbox" type="checkbox" name="workLocationIDs[]" value="{{$workLocation->ID}}" autocomplete="off"> <i class="bi bi-check-square"></i>
                                                        </label>
                                                    </div>    
                                                </div>
                                                <div class="invalid-feedback">
                                                    Lūdzu, ievadiet jauno iestādes darba vietu!
                                                </div>                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                           </div>
                            <button id="addAuthorityCabinetRow" type="button" class="btn btn-info" >Pievienot rindu</button>        
                        </div>
                    </div>
                    <hr>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Apstiprināt', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}    
            </div>
        </div>
    </div>
    @include('scripts.environmentEditJavascript')
    @include('scripts.checkValidity')
@endsection  