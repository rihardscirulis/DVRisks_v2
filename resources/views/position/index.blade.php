@extends('application.app')

@section('content')
    <div class="container">
        <h1>Amatu pievienošana un saraksts</h1>
        <hr>
        <div id="formField">
            <div class="form-group container">
                <form method="POST" action="/amats" class="needs-validation" novalidate>
                    @csrf
                    <label for="noteFactorLabel"><span id="noteForFactorFields">Piezīme: Apzīmejums ar šadu simbolu <span id="requiredText">* </span> nozīmē, ka ir jāaizpilda</span></label><br><br>
                    <div class="row">
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Ievadiet amatu:</label>
                            <input type="text" class="form-control" name="newAuthorityPosition" id="newAuthorityPosition" placeholder="--- Ievadiet darba amatu ---" required>
                            <div class="invalid-feedback">
                                Lūdzu, ievadiet darba amatu!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="selectFactorGroupLabel"><span id="requiredText">* </span>Izvēlieties vidi:</label>
                            <select class="form-control" id="environmentGroupList" name="environmentGroupList" required>
                                <option selected disabled hidden value="" >--- Izvēlieties darba vidi ---</option>
                                @foreach ($authorityList as $authority)
                                    <optgroup label="{{$authority->authorityName}}">
                                        @foreach ($environmentList as $environment)
                                            @if ($environment->authorityID == $authority->authorityID)
                                                <option value="{{$environment->environmentID}}">{{$environment->environmentName}}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Lūdzu, izvēlieties darba vidi!
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Apstiprināt</button>
                </form>
            </div>
            <div class="container">
                @foreach ($authorityList as $authority)
                    <div id="accordion">
                        <div class="card" id="cardMarginRemove">
                            <div class="card-header" id="headingOne#{{$authority->authorityID}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-outline-secondary" style="width:100%" data-toggle="collapse" data-target="#collapseOne{{$authority->authorityID}}" aria-expanded="false" aria-controls="collapseOne">
                                        <i class="bi bi-building"></i>  {{$authority->authorityName}}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne{{$authority->authorityID}}" class="collapse" aria-labelledby="headingOne#{{$authority->authorityID}}" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span id="boldFont">Darba vide:</span>
                                        </div>
                                        <div class="col">
                                            <span id="boldFont">Amats:</span>
                                        </div>
                                        <div class="col">
                                            <span id="boldFont">Darbības</span>
                                        </div>
                                    </div>
                                    <hr>    
                                    @foreach ($environmentList as $environment)
                                        @if ($environment->authorityID == $authority->authorityID)
                                            <div class="row">
                                                <div class="col">
                                                    {{$environment->environmentName}}
                                                </div>
                                                <div class="col">
                                                    @foreach ($positionList as $position)
                                                        @if ($environment->environmentID == $position->environmentID)
                                                            <i class="bi bi-tools"></i> {{$position->positionName}}<br>
                                                        @endif
                                                    @endforeach        
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col col-lg-2">
                                                            {!!Form::open(['action' => ['PositionController@destroy', $environment->environmentID], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                                                                {{Form::hidden('method', 'DELETE')}}
                                                                {{Form::button('<i class="bi bi-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-lg', 'onclick' => 'return confirm("Vai esat pārliecināts ka nepieciešams dzēst?")'])}}
                                                            {!!Form::close() !!}
                                                        </div>
                                                        <div class="col col-lg-2">
                                                            <a href="/amats/{{$environment->environmentID}}/edit" class="btn btn-outline-dark btn-lg"><i class="bi bi-pencil-square"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <hr>
            </div>
        </div>
    </div>
    @include('scripts.checkValidity')
@endsection  