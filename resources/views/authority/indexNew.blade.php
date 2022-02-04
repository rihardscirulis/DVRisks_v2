@extends('application.index')

@section('content')
    <section class="form cid-sLTypdCYlL" id="formbuilder-5">
        <!-- Messages bar -->
        @include('inc.messages')
        <!-- //////////// -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                    <form action="/authority" method="POST" class="mbr-form form-with-styler needs-validation" data-form-title="Form Name" novalidate>
                        @csrf
                        <div class="dragArea form-row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="mbr-fonts-style display-5">Iestādes pievienošana un tā saraksts</h4>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <div data-for="name" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="name-formbuilder-5" class="form-control-label mbr-fonts-style display-7">* - obligātie aizpildāmie lauki</label><br><br>
                                <label for="name-formbuilder-5" class="form-control-label mbr-fonts-style display-7">* Ievadiet jauno iestādes nosaukumu:</label>
                                <input type="text" name="name" placeholder="-- Ievadiet jauno iestādes nosaukumu --" data-form-field="name" class="form-control display-7" required value="" id="name-formbuilder-5">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label class="form-control-label mbr-fonts-style display-7">* E-pasts, tālruņa numurs:</label>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="email" name="email" placeholder="-- Ievadiet e-pastu --" data-form-field="email" required class="form-control text-multiple" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z0-9.-]{2,}[.]{1}[a-zA-Z]{2,}" value="" id="email-formbuilder-5">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="telephone_number" placeholder="-- Ievadiet tālruņa numuru --" pattern="[0-9]{8}" maxlength="8" minlength="8" data-form-field="telephoneNumber" required class="form-control text-multiple" value="" id="telephoneNumber-formbuilder-5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label class="form-control-label mbr-fonts-style display-7">Adrese, reģistrācijas numurs;</label>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" name="address" placeholder="-- Ievadiet adresi --" data-form-field="address" required class="form-control text-multiple" value="" id="address-formbuilder-5">
                                    </div>
                                    <div class="col">
                                        <input type="text" pattern="[0-9]{3-11}" maxlength="11" minlength="3" name="registration_number" placeholder="-- Ievadiet reģistrācijas numuru --" data-form-field="registrationNumber" required class="form-control text-multiple" value="" id="registrationNumber-formbuilder-5">
                                    </div>
                                </div>
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
    <section class="content17 cid-sLTGS9MbJr" id="content17-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="mbr-section-head align-center"></div>
                    @foreach ($authority_list as $authority)
                        <div id="bootstrap-toggle" class="toggle-panel accordionStyles tab-content mt-4">
                            <div class="card mb-3">
                                <div class="card-header" role="tab" id="heading{{$authority->authorityID}}">
                                    <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-core="" href="#collapse1_{{$authority->authorityID}}" aria-expanded="false" aria-controls="collapse1">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>
                                        <h6 class="mbr-fonts-style display-7">{{$authority->name}}</h6>
                                    </a>
                                </div>
                                <div id="collapse1_{{$authority->authorityID}}" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="heading{{$authority->authorityID}}">
                                    <div class="panel-body p-3">
                                        <p class="mbr-fonts-style panel-text display-7">
                                            <div class="row">
                                                <div class="col">
                                                    <strong>Tālrunis:</strong> {{$authority->telephone_number}} <br><br>
                                                    <strong>E-pasts:</strong> {{$authority->email}}
                                                </div>
                                                <div class="col">
                                                    <strong>Reģistrācijas numurs:</strong> {{$authority->registration_number}} <br><br>
                                                    <strong>Adrese:</strong> {{$authority->address}} <br>
                                                </div>
                                                <div class="col">
                                                    {!!Form::open(['action' => ['AuthorityController@destroy', $authority->id], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                                                        {{Form::hidden('method', 'DELETE')}}
                                                        {{Form::button('
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            </svg>', 
                                                            ['type' => 'submit', 'class' => 'btn btn-outline-danger', 'onclick' => 'return confirm("Dzešot iestādi, tiks arī dzēsti visi saistošie dati. Vai esat pārliecināts ka nepieciešams dzēst?")'])}}
                                                    {!!Form::close() !!}
                                                    <a href="/authority/edit/{{$authority->id}}" class="btn btn-outline-dark">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
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
@endsection
