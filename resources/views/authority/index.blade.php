@extends('application.app')

@section('content')
    <div class="container">
        <h1>Iestādes saraksts un pievienošana</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                <form method="POST" action="/iestade" class="needs-validation" novalidate>
                    @csrf
                    <label for="noteFactorLabel"><span id="noteForFactorFields">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                    <div class="row">
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Ievadiet jauno iestades nosaukumu:</label>
                            <input type="text" class="form-control" name="newAuthorityName" id="newAuthorityName" placeholder="-- Ievadiet jauno iestādes nosaukumu --" required>
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
                            <input type="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z0-9.-]{2,}[.]{1}[a-zA-Z]{2,}" class="form-control" name="newEmail" id="newEmail" placeholder="-- Ievadiet iestādes e-pasta adresi --" required>
                            <div class="invalid-feedback">
                                Lūdzu, ievadiet iestādes epasta adresi!
                            </div>  
                            <div class="valid-feedback">
                                Izskatās labi!
                            </div>      
                        </div>
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Tālruņa numurs:</label>
                            <input type="text" class="form-control" pattern="[0-9]{8}" maxlength="8" minlength="8" name="newTelephoneNumber" id="newTelephoneNumber" placeholder="-- Ievadiet iestādes tālruņa numuru" required>
                            <div class="invalid-feedback">
                                Lūdzu, ievadiet iestādes tālruņa numuru!
                            </div>       
                            <div class="valid-feedback">
                                Izskatās labi!
                            </div>       
                        </div>
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Adrese:</label>
                            <input type="text" class="form-control" name="newAddress" id="newAddress" placeholder="-- Ievadiet jaunās iestādes adresi --" required>
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
                            <input type="text" class="form-control" pattern="[0-9]{3-11}" maxlength="11" minlength="3" name="newRegistrationNumber" id="newRegistrationNumber" placeholder="-- Ievadiet iestādes reģistrācijas numuru --" required>
                            <div class="invalid-feedback">
                                Lūdzu, ievadiet iestādes reģistrācijas numuru!
                            </div>      
                            <div class="valid-feedback">
                                Izskatās labi!
                            </div>        
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Apstiprināt</button>
                </form>
            </div>
            <div class="container">
                @foreach ($authorityList as $authority)
                @endforeach
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-sm ">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Iestādes nosaukums</th>
                                <th scope="col">Reģistrācijas numurs</th>
                                <th scope="col">Tālrunis</th>
                                <th scope="col">E-pasts</th>
                                <th scope="col">Adrese</th>
                                <th scope="col" colspan="2">Darbības</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($authorityList as $authority)
                                <tr class="table-light">
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$authority->authorityName}}</td>
                                    <td>{{$authority->authorityRegistrationNumber}}</td>
                                    <td>{{$authority->authorityPhoneNumber}}</td>
                                    <td>{{$authority->authorityEmail}}</td>
                                    <td>{{$authority->authorityAddress}}</td>
                                    <td>
                                        {!!Form::open(['action' => ['AuthorityController@destroy', $authority->authorityID], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                                            {{Form::hidden('method', 'DELETE')}}
                                            {{Form::button('<i class="bi bi-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger', 'onclick' => 'return confirm("Dzešot iestādi, tiks arī dzēsti visi saistošie dati. Vai esat pārliecināts ka nepieciešams dzēst?")'])}}
                                        {!!Form::close() !!}
                                    </td>
                                    <td>
                                        <a href="/iestade/{{$authority->authorityID}}/edit" class="btn btn-outline-dark"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>    
                </div>
            </div>            
        </div>
    </div>
    @include('scripts.checkValidity')
@endsection  