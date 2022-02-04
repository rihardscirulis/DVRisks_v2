@extends('application.index')

@section('content')
    <section class="form cid-sMmXCUDmHt" id="formbuilder-b">
            <!-- Messages bar -->
            @include('inc.messages')
            <!-- //////////// -->    
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                        {!! Form::open(['action' => ['EnvironmentController@update', $environment->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'mbr-form form-with-styler', 'data-form-title' => 'Form Name']) !!}
                            @csrf
                            <div class="dragArea form-row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4 class="mbr-fonts-style display-5">Darba vides un vietas labošana</h4>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <hr>
                                </div>
                                <div data-for="selectAuthority" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label for="name-formbuilder-5" class="form-control-label mbr-fonts-style display-7">* - obligātie aizpildāmie lauki</label><br><br>
                                    <label for="selectAuthority-formbuilder-b" class="form-control-label mbr-fonts-style display-7">* Izvēlieties iestādi:</label>
                                    <select name="authority_id" data-form-field="selectAuthority" required="required" class="form-control display-7" id="selectAuthority-formbuilder-b">
                                        <option selected value="{{$environment->authority->id}}">{{$environment->authority->name}}</option>
                                        @foreach ($authority_list as $authority)
                                            <option value="{{$authority->id}}">{{$authority->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div data-for="darbaVide" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label for="darbaVide-formbuilder-b" class="form-control-label mbr-fonts-style display-7">* Ievadiet iestādes darba vidi:</label>
                                    <input type="text" name="name" placeholder="- Ievadiet jaunu iestādes darba vidi -" data-form-field="darbaVide" class="form-control display-7" required="required" value="{{$environment->name}}" id="darbaVide-formbuilder-b">
                                </div>
                                <div data-for="darbaVieta" class="col-lg-12 col-md-12 col-sm-12 form-group" id="authorityCabinetName">
                                    <label for="darbaVieta-formbuilder-b" class="form-control-label mbr-fonts-style display-7">* Ievadiet iestādes darba vietu:</label>
                                    @foreach ($environment->workplaces as $workplace)
                                        <div class="form-row">
                                            <div class="form-group col-md-11">
                                                <input type="text" name="workplaces[]" placeholder="- Ievadiet jaunu iestādes darba vietu" data-form-field="darbaVieta" class="form-control display-7" required="required" value="{{$workplace->name}}" id="darbaVieta-formbuilder-b">
                                            </div>
                                            <div class="form-group col-md-1">
                                            <div class="btn-group-append">
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-danger">
                                                        <input type="checkbox" name="workplace_id[]" value="{{$workplace->id}}" autocomplete="off">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                        </svg>                                    
                                                    </label>
                                                </div>    
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach
                                </div>
                                <span id="newAuthorityCabinetRow" style="width: 100%;"></span>
                                <div data-for="darbaVieta" class="col-lg-12 col-md-12 col-sm-12 form-group" style="padding-left: 5px; padding-right: 5px;">
                                    <button id="addAuthorityCabinetRow" type="button" class="btn btn-secondary display-7">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>                                    
                                    </button>
                                </div> 
                                {{Form::hidden('_method', 'PUT')}}
                                {{Form::submit('Apstiprināt', ['class' => 'btn btn-primary display-7'])}}            
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
    </section>
    @include('scripts.checkValidity')
@endsection