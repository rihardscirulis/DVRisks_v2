@extends('application.index')
@section('content')
    <section class="form cid-sLTypdCYlL" id="formbuilder-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                    {!! Form::open(['action' => ['AuthorityController@update', $authority->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'mbr-form form-with-styler needs-validation', 'data-form-title' => 'Form name']) !!}
                        @csrf
                        <div class="dragArea form-row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="mbr-fonts-style display-5">Iestādes "{{$authority->name}}" rediģēšana</h4>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <div data-for="name" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="name-formbuilder-5" class="form-control-label mbr-fonts-style display-7">* Ievadiet jauno iestādes nosaukumu:</label>
                                <input type="text" name="name" placeholder="-- Ievadiet jauno iestādes nosaukumu --" data-form-field="name" class="form-control display-7" required value="{{$authority->name}}" id="name-formbuilder-5">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label class="form-control-label mbr-fonts-style display-7">* E-pasts, tālruņa numurs:</label>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="email" name="email" placeholder="-- Ievadiet e-pastu --" data-form-field="email" required class="form-control text-multiple" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z0-9.-]{2,}[.]{1}[a-zA-Z]{2,}" value="{{$authority->email}}" id="email-formbuilder-5">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="telephone_number" placeholder="-- Ievadiet tālruņa numuru --" pattern="[0-9]{8}" maxlength="8" minlength="8" data-form-field="telephoneNumber" required class="form-control text-multiple" value="{{$authority->telephone_number}}" id="telephoneNumber-formbuilder-5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label class="form-control-label mbr-fonts-style display-7">Adrese, reģistrācijas numurs;</label>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" name="address" placeholder="-- Ievadiet adresi --" data-form-field="address" required class="form-control text-multiple" value="{{$authority->address}}" id="address-formbuilder-5">
                                    </div>
                                    <div class="col">
                                        <input type="text" pattern="[0-9]{3-11}" maxlength="11" minlength="3" name="registration_number" placeholder="-- Ievadiet reģistrācijas numuru --" data-form-field="registrationNumber" required class="form-control text-multiple" value="{{$authority->registration_number}}" id="registrationNumber-formbuilder-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Apstiprināt', ['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection