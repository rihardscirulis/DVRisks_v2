@extends('application.app')

@section('content')
    <div class="container">
        <h1>Amatu saraksta labošana</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                {!! Form::open(['action' => ['PositionController@update', $environment->ID], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <label for="noteFactorLabel"><span id="noteForFactorFields">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                    <div class="row">
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Labojiet vidi:</label>
                            <input type="text" class="form-control" name="environmentGroupList" value="{{$environment->Nosaukums}}" required>
                            <div class="invalid-feedback">
                                Lūdzu, izvēlieties darba vidi!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Labojiet amatu(-us) vai pievienojiet jaunus:</label>
                            @foreach ($positionList as $position)
                                <div class="position-relative">
                                    <div id="inputPositionRow">
                                        <div class="input-group is-invalid">
                                            <input type="text" class="form-control" name="positions[]" value="{{$position->positionName}}" required>
                                            <div class="btn-group-append">
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-danger">
                                                        <input type="checkbox" type="checkbox" name="checkedPsositionIDs[]" value="{{$position->positionID}}" autocomplete="off"><i class="bi bi-trash-fill"></i>
                                                    </label>
                                                </div>    
                                            </div>
                                            <div class="invalid-feedback">
                                                Lūdzu, ievadiet darba amatu!
                                            </div>            
                                        </div>
                                    </div><br>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="NewPositionRow"></div>
                    <button id="addPositionRow" type="button" class="btn btn-info" >Pievienot rindu</button>        
                    <hr>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Apstiprināt', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @include('scripts.positionEditJavascript')
    @include('scripts.checkValidity')
@endsection  