
<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container">
    <header class="row">
        @include('includes.header')
    </header>
    <div id="main" class="row">
        <!-- main content -->
        <div id="content" class="col-md-12">
            @yield('content')
        </div>

    </div>
    <footer class="row">
        @include('includes.footer')
    </footer>
</div>
</body>
</html>

