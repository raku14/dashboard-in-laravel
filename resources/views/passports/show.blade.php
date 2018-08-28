<!-- app/views/passports/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('passports') }}">passport Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('passports') }}">View All passports</a></li>
        <li><a href="{{ URL::to('passports/create') }}">Create a passport</a>
    </ul>
</nav>

<h1>Showing {{ $passport->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $passport->name }}</h2>
        <p>
            <strong>Name :</string>{{ $passport->name }}<br>
            <strong>Email:</strong> {{ $passport->email }}<br>
            <strong>Mobile No:</strong> {{ $passport->number }}
        </p>
    </div>

</div>
</body>
</html>