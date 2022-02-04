@extends('application.index')

@section('content')
    <section class="form cid-sPMnfvwAae" id="formbuilder-u">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                    {!! Form::open(['action' => ['FactorGroupController@update', $factorGroup->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'mbr-form form-with-styler', 'data-form-title' => 'Form Name']) !!}    
                        @csrf    
                        <div class="dragArea form-row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="mbr-fonts-style display-5">Riska faktora grupas "{{$factorGroup->name}}" rediģēšana</h4>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <div data-for="factorGroupName" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="factorGroupName-formbuilder-u" class="form-control-label mbr-fonts-style display-7">* Rediģēt faktora grupas nosaukumu:</label>
                                <input type="text" name="name" placeholder="-- Ievadiet faktora grupas nosaukumu --" data-form-field="factorGroupName" class="form-control display-7" required="required" value="{{$factorGroup->name}}" id="factorGroupName-formbuilder-u">
                            </div>
                            <div class="col-auto">
                                {{Form::hidden('_method', 'PUT')}}
                                {{Form::submit('Apstiprināt', ['class' => 'btn btn-primary display-7'])}}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection