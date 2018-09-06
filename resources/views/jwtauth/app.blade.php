
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
            li{
                padding: 2px;
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

    @if(isset($page))
        @if($page == 'gallery')
                   
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" defer></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" defer></script>
            
            <link href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" rel="stylesheet">
            
            <link href="{{ asset('css/gallery.css') }}" rel="stylesheet" defer>

            <script src="{{ asset('js/gallery.js') }}" defer></script>
        @endif
        @if($page == 'friend')   
           
            <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" defer>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js" defer></script>  
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" defer></script>
            <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
        @endif
        
    @endif

</head>
<body style="background: #d4ecc4;">
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
                    @if(Session::has('admin'))
                        {{(Session('admin'))}}
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
                  
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                 <a href="{{url('auth')}}" id="profile" class="btn btn-success">Profile</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{url('auth/create')}}" id="create" class="btn btn-success">Edit Info</a>
                            </li> 
                            @if(Session::has('admin'))
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" href="" class="btn btn-success" data-toggle="dropdown" aria-expanded="false" v-pre >
                                        Notification
                                        <span class="badge badge-light" id="count"></span>
                                    </a>
                                     <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown" id="notify" style="background: #d4ecc4; width: 400px; word-wrap: break-word;">

                                    </div>
                                   
                                </li>
                            @endif 
                            <li class="nav-item dropdown">
                                <a href="{{url('auth/friend')}}" id="friend" class="btn btn-success">Find Friend</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ url('auth/gallery') }}" id="gly" class="btn btn-success">Gallery</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ url('auth/logout') }}" class="btn btn-success ">Logout</a>
                            </li>

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    
    </div><br><br><br><br>
    <footer >
        <div class="col-md-12 footer" style="background: #9bc67d; padding: 12px;">
        <center>
            <label>&copy; Copyright {{Date('Y')}}</label>
        </center>
        </div>  

        <script type="text/javascript">

        function notify()
        {
            $.ajax({   
               type:'GET',
               url:'/api/auth/notify',
               data:'_token = <?php echo csrf_token() ?>',
               dataType: 'json',
               success:function(data)
               {   
                    var str = '';
                    for (var i = data.length - 1; i >= 0; i--) 
                    {
                        str +='<div class="alert alert-danger"><a href="auth/notify/seen?id='+ data[i]["id"] +'"> '+ data[i]['title'] + ' post from ' + data[i]['firstname']  + '</a></div>';
                    }

                    $("#notify").html(str);

                    if( data.length == 0)
                    {
                        $('#notify').html('<div class="alert alert-danger">No new notification.</div>');
                        $('#count').html('');
                    }else{
                        $('#count').html(data.length); 
                    }
                            
                }
            });
        }
        setInterval(notify, 1000);

    </script> 
    </footer>
    
</body>
</html>
