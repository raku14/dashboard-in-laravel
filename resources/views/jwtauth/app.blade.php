

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style type="text/css">
            html,body{
                height: 100%;
            }
            footer {
                    position: fixed;
                    left: 0;
                    bottom: 0;
                    width: 100%;
                }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script  src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   
    @if(isset($page))
        @if($page == 'gallery')
                   
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            
            <link href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" rel="stylesheet">
            
            <link href="{{ asset('css/gallery.css') }}" rel="stylesheet">

            <script src="{{ asset('js/gallery.js') }}" defer></script>
        @endif
    @endif

</head>
<body style="background: #d4ecc4";>
    <div id="">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background: #9bc67d">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/auth') }}">
                    @if(Session::has('first'))
                        {{ Session()->get('first') }}
                    @endif
                    @if(Session::has('last'))
                        {{ Session()->get('last') }}
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                  
                    <ul class="navbar-nav ml-auto" style="margin-right: 80px;" >
                        @if(session::has('email'))
                            <div id="link">
                                <a href="{{url('auth')}}"><button id="home" class="btn btn-success">Home</button></a>

                                <a href="{{url('auth/create')}}"><button id="create" class="btn btn-success">Profile</button></a>
                                
                                <a href="{{ url('auth/gallery') }}"><button id="gly" class="btn btn-success">Gallery</button></a>

                                <a href="{{ url('auth/logout') }}"><button class="btn btn-success ">Logout</button></a>
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    
    </div>
    <footer>
        <div class="col-md-12 footer" style="background: #9bc67d; padding: 12px;">
        <center>
            <label>&copy; Copyright {{Date('Y')}}</label>
        </center>
        </div>   
    </footer>
    
</body>
</html>
