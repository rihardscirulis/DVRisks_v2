@extends('application.app')

@section('content')
    <div class="container">
        <h1>Jauna riska faktora grupas pievienošana</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                <form method="POST" action="/faktoragrupa" class="needs-validation" novalidate>
                    @csrf
                    <label for="noteFactorGroupLabel"><span id="noteForFactorGroupField">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                    <label for="writeFactorLabel"><span id="requiredText">* </span>Ievadiet faktora grupas nosaukumu:</label><br>
                    <input type="text" name="newFactorGroupTitle" id="newFactorGroupTitle" class="form-control" placeholder="--- Ievadiet faktora grupu ---" autocomplete="off" required>
                    <div class="invalid-feedback">
                        Lūdzu, aizpildi darba riska faktora grupas lauku!
                    </div>
                    <div class="valid-feedback">
                        Izskatās labi!
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Apstiprināt</button>
                </form>
            </div>
            <div class="container">
                <table class="table table-hover table-bordered table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Faktora grupas nosaukums</th>
                            <th scope="col" colspan="2">Darbības</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($factorGroupList as $factorGroup)
                            <tr class="table-light">
                                <th scope="row">{{$i++}}</th>
                                <td>{{$factorGroup->factorGroupTitle}}</td>
                                <td style="width: 120px">
                                    <div class="row justify-content-center align-items-center" style="margin-top: 0px">
                                        <a href="/faktoragrupa/{{$factorGroup->factorGroupID}}/edit" class="btn btn-outline-dark btn-lg"><i class="bi bi-pencil-square"></i></a>&nbsp;
                                        {!!Form::open(['action' => ['FactorGroupController@destroy', $factorGroup->factorGroupID], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                                            {{Form::hidden('method', 'DELETE')}}
                                            {{Form::button('<i class="bi bi-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-lg', 'onclick' => 'return confirm("Vai esat pārliecināts ka nepieciešams dzēst?")'])}}                                    {!!Form::close() !!}
                                        {!!Form::close() !!}    
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($factorGroupList as $factorGroup)
        <div class="modal fade" id="exampleModal{{$factorGroup->factorGroupID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$factorGroup->factorGroupTitle}} saraksts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @include('scripts.factorGroupJavascript')
@endsection  