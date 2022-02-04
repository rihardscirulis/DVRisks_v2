<div id='navbarContent'>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" id="marginSize">
                    <a class="navbar-brand" href="{{ url('/sakums') }}">
                        {{ config('app.name') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            @if(!Auth::guest())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="/#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#administration">
                                        <i class="bi bi-check2-square"></i>  Administrēšana
                                    </a>
                                    
                                    <div id="administration" class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/iestade"> <i class="bi bi-building"></i>  Iestādes</a>
                                        <a class="dropdown-item" href="/vide"><i class="bi bi-hammer"></i>  Darba vietas/vides</a>
                                        <a class="dropdown-item" href="/amats"><i class="bi bi-briefcase-fill"></i>  Amati</a>
                                        <a class="dropdown-item" href="/personals"><i class="bi bi-people-fill"></i>  Personāls</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="/#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#documents">
                                        <i class="bi bi-file-earmark-text-fill"></i>  Dokumenti
                                    </a>
                                    <div id="documents" class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/izveidotdokumentu"><i class="bi bi-file-earmark-text-fill"></i>  Riska novērtēšanas anketa</a>
                                        <a class="dropdown-item" href="/pasakuma_plans"><i class="bi bi-file-earmark-bar-graph-fill"></i>  Pasākuma plāna dokumenti</a>
                                    </div>
                                </li>
                            @endif
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Add new data links -->
                            @if(!Auth::guest())
                                <li class="nav-item dropdown"> 
                                    <a class="nav-link dropdown-toggle" href="/#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#addData">
                                        Pievienošana  <i class="bi bi-diagram-2-fill"></i>
                                    </a>
                                    <div id="addData" class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/faktoragrupa">Faktora grupa  <i class="bi bi-node-plus-fill"></i></a>
                                        <a class="dropdown-item" href="/faktors">Faktors  <i class="bi bi-node-plus"></i></a>
                                    </div>
                                </li>
                            @endif
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Pierakstīties') }}</a>
                            </li>
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Reģistrēties') }}</a>
                                </form>
                            @endif-->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#userDashboard" v-pre>
                                    {{ Auth::user()->name }}  <i class="bi bi-file-person"></i>
                                </a>
                                <div id="userDashboard" div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item">
                                        Mani dati  <i class="bi bi-person-lines-fill"></i>
                                    </a>
                                    <a class="dropdown-item">
                                        Pievienot lietotāju  <i class="bi bi-person-plus-fill"></i>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Izrakstīties') }}  <i class="bi bi-power"></i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

