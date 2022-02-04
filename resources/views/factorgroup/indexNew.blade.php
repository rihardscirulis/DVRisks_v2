@extends('application.index')

@section('content')
<section class="form cid-sPMnfvwAae" id="formbuilder-u">
    <!-- Messages bar -->
    @include('inc.messages')
    <!-- //////////// -->    
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="/factorgroup" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                    @csrf
                    <div class="dragArea form-row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="mbr-fonts-style display-5">Jauna riska faktora grupas pievienošana</h4>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <hr>
                        </div>
                        <div data-for="factorGroupName" class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <label for="factorGroupName-formbuilder-u" class="form-control-label mbr-fonts-style display-7">* Ievadiet jauno faktora grupas nosaukumu:</label>
                            <input type="text" name="name" placeholder="-- Ievadiet jauno faktora grupas nosaukumu --" data-fom-field="factorGroupName" class="form-control display-7" value="" id="factorGroupName-formbuilder-u">
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

<section class="content17 cid-sPMrZOQzkS" id="content17-v">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <table class="table table-hover table-bordered table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="text-align: center;">#</th>
                            <th scope="col" style="text-align: center;">Faktora grupas nosaukums</th>
                            <th scope="col" colspan="2" style="text-align: center;">Darbības</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($factorGroupList as $factorGroup)
                            <tr class="table-light">
                                <th scope="row" style="text-align: center;">{{$i++}}</th>
                                <td>{{$factorGroup->name}}</td>
                                <td style="width: 145px">
                                    <div class="row justify-content-center" style="margin-top: 0px">
                                        <a href="/factorgroup/edit/{{$factorGroup->id}}" class="btn btn-outline-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>
                                        <a href="/factorgroup/destroy/{{$factorGroup->id}}/" class="btn btn-outline-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection