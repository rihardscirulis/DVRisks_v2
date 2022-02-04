@extends('application.index')

@section('content')
    <section class="form cid-sMmXCUDmHt" id="formbuilder-b">
            <!-- Messages bar -->
            @include('inc.messages')
            <!-- //////////// -->    
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                        <form action="/environment" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                            @csrf
                            <div class="dragArea form-row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4 class="mbr-fonts-style display-5">Darba vides un vietas saraksts/pievienošana</h4>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <hr>
                                </div>
                                <div data-for="selectAuthority" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label for="name-formbuilder-5" class="form-control-label mbr-fonts-style display-7">* - obligātie aizpildāmie lauki</label><br><br>
                                    <label for="selectAuthority-formbuilder-b" class="form-control-label mbr-fonts-style display-7">* Izvēlieties iestādi:</label>
                                    <select name="authority_id" data-form-field="selectAuthority" required="required" class="form-control display-7" id="selectAuthority-formbuilder-b">
                                        <option selected disabled hidden value="" >- Izvēlieties iestādi -</option>
                                        @foreach ($data as $authority)
                                            <option value="{{$authority->id}}">{{$authority->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div data-for="darbaVide" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label for="darbaVide-formbuilder-b" class="form-control-label mbr-fonts-style display-7">* Ievadiet iestādes darba vidi:</label>
                                    <input type="text" name="name" placeholder="- Ievadiet jaunu iestādes darba vidi -" data-form-field="darbaVide" class="form-control display-7" required="required" value="" id="darbaVide-formbuilder-b">
                                </div>
                                <div data-for="darbaVieta" class="col-lg-12 col-md-12 col-sm-12 form-group" id="authorityCabinetName">
                                    <label for="darbaVieta-formbuilder-b" class="form-control-label mbr-fonts-style display-7">* Ievadiet iestādes darba vietu:</label>
                                    <input type="text" name="workplaces[]" placeholder="- Ievadiet jaunu iestādes darba vietu" data-form-field="darbaVieta" class="form-control display-7" required="required" value="" id="darbaVieta-formbuilder-b">
                                </div>
                                <span id="newAuthorityCabinetRow" style="width: 100%;">
                                
                                </span>

                                <div data-for="darbaVieta" class="col-lg-12 col-md-12 col-sm-12 form-group" style="padding-left: 5px; padding-right: 5px;">
                                    <button id="addAuthorityCabinetRow" type="button" class="btn btn-secondary display-7">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>                                    
                                    </button>
                                </div>    
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary display-7">Apstiprināt</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

    <section class="content17 cid-sMmYXXRhIL" id="content17-c">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="mbr-section-head align-center"></div>
                    @foreach ($data as $authority)
                        <div id="bootstrap-toggle" class="toggle-panel accordionStyles tab-content mt-4">
                            <div class="card mb-3">
                                <div class="card-header" role="tab" id="heading{{$authority->id}}">
                                    <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-core="" href="#collapse1_{{$authority->id}}" aria-expanded="false" aria-controls="collapse1">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>
                                        <h6 class="mbr-fonts-style display-7">{{$authority->name}}</h6>
                                    </a>
                                </div>
                                <div id="collapse1_{{$authority->id}}" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="heading{{$authority->id}}">
                                    <div class="panel-body p-3">
                                        <p class="mbr-fonts-style panel-text display-7">
                                            <div class="row">
                                                <div class="col">
                                                    <strong>Darba vide:</strong>
                                                </div>
                                                <div class="col">
                                                    <strong>Darba vieta:</strong>
                                                </div>
                                                <div class="col">
                                                    <strong>Darbības</strong>
                                                </div>
                                            </div>
                                            <hr>
                                            @foreach ($authority->environments as $environment)
                                                @if($environment->authority_id == $authority->id) 
                                                    <div class="row">
                                                        <div class="col">
                                                            {{$environment->name}}
                                                        </div>
                                                        <div class="col">
                                                            @foreach ($authority->workplaces as $workplace)
                                                                @if ($workplace->environment_id == $environment->id)
                                                                    <i class="bi bi-geo-fill"></i> {{$workplace->name}}<br>
                                                                @endif
                                                            @endforeach        
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <a href="/environment/destroy/{{$environment->id}}" class="btn btn-outline-danger">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                            <div class="row">
                                                                <a href="/environment/edit/{{$environment->id}}" class="btn btn-outline-dark">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @include('scripts.checkValidity')
@endsection