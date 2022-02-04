@extends('application.app')

@section('content')
    <div class="container">
        <h1>Konkrētās iestādes labošana</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                {!! Form::open(['action' => ['AuthorityController@update', $authority->ID], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <label for="noteFactorLabel"><span id="noteForFactorFields">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                    <div class="row">
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Ievadiet jauno iestades nosaukumu:</label>
                            <input type="text" class="form-control" name="newAuthorityName" id="newAuthorityName" value="{{$authority->Nosaukums}}" required>
                            <div class="invalid-feedback">
                                Lūdzu, ievadiet iestādes nosaukumu!
                            </div>
                            <div class="valid-feedback">
                                Izskatās labi!
                            </div>      
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>E-pasts:</label>
                            <input type="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" class="form-control" name="newEmail" id="newEmail" value="{{$authority->Epasts}}" required>
                            <div class="invalid-feedback">
                                Lūdzu, ievadiet iestādes epasta adresi!
                            </div>  
                            <div class="valid-feedback">
                                Izskatās labi!
                            </div>      
                        </div>
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Tālruņa numurs:</label>
                            <input type="text" class="form-control" maxlength="8" minlength="8" name="newTelephoneNumber" id="newTelephoneNumber" value="{{$authority->Talrunis}}" required>
                            <div class="invalid-feedback">
                                Lūdzu, ievadiet iestādes tālruņa numuru!
                            </div>       
                            <div class="valid-feedback">
                                Izskatās labi!
                            </div>       
                        </div>
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Adrese:</label>
                            <input type="text" class="form-control" name="newAddress" id="newAddress" value="{{$authority->Adrese}}" required>
                            <div class="invalid-feedback">
                                Lūdzu, ievadiet iestādes adresi!
                            </div>
                            <div class="valid-feedback">
                                Izskatās labi!
                            </div>      
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Reģistrācijas numurs:</label>
                            <input type="text" class="form-control" pattern="[0-9]{11}" maxlength="11" minlength="11" name="newRegistrationNumber" id="newRegistrationNumber" value="{{$authority->Registracijas_numurs}}" required>
                            <div class="invalid-feedback">
                                Lūdzu, ievadiet iestādes reģistrācijas numuru!
                            </div>      
                            <div class="valid-feedback">
                                Izskatās labi!
                            </div>        
                        </div>
                    </div>
                    <hr>
                    
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Apstiprināt', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @include('scripts.checkValidity')
@endsection  