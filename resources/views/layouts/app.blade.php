<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm "
        style="border-bottom:1px rgb(68, 128, 207) solid">
            <div class="container ">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="home">
                                       Home
                                    </a>
                                    <a class="dropdown-item" href="selectplants">
                                        Select Plants
                                    </a>
                                    <a class="dropdown-item" href="myplants">
                                        My Plants
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>.


                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
          
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Gargen Coordinates</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
                <form action="addGragenLocation" method="post">
                    @csrf
                <div class="modal-body">
                  <p><b>Provide following locational info about your Garden</b> </p>
                  <label>Latitude</label>
                  <input name="lat" type="number" class="form-control" step="0.00000001">
                  <label>Longitude</label>
                  <input name="lng" type="number" class="form-control" step="0.00000001">
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-primary" type="submit">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
              </div>
          
            </div>
          </div>

          <div id="myModal2" class="modal fade" role="dialog">
            <div class="modal-dialog">
          
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sensor Configuration Info</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
              
                <div class="modal-body">
                
                  <label>ID</label>
                  <input  type="text" class="form-control" readonly value="{{ Auth()->user()->id }}">
                  <label>Url</label>
                  <input  type="text" class="form-control" readonly value="http://localhost/finalproject/public/collect/sensor/data">
                </div>
                <div class="modal-footer">
                  
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              
              </div>
          
            </div>
          </div>
    </div>
</body>
</html>
