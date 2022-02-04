@extends('application.app')

@section('content')
    <div class="container">
        <h1>Faktora grupas nosaukuma labošana</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                {!! Form::open(['action' => ['FactorGroupController@update', $factorGroup->ID], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <label for="noteFactorGroupLabel"><span id="noteForFactorGroupField">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                    <label for="writeFactorLabel"><span id="requiredText">* </span>Faktora grupas nosaukums:</label><br>
                    <input type="text" name="factorGroupTitle" id="factorGroupTitle" class="form-control" value="{{$factorGroup->Nosaukums}}" autocomplete="off" required>
                    <div class="invalid-feedback">
                        Lūdzu, aizpildi darba riska faktora grupas lauku!
                    </div>
                    <div class="valid-feedback">
                        Izskatās labi!
                    </div>
                    <hr>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Apstiprināt', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection  