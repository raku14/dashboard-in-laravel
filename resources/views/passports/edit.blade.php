<!-- app/views/passports/edit.blade.php -->

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
    <div class="row">
        <div class="col-md-6">
            <h1>Edit {{ $passport->name }}</h1>

            <!-- if there are creation errors, they will show here -->
            {{ Html::ul($errors->all()) }}

            {{ Form::model($passport, array('route' => array('passports.update', $passport->id), 'method' => 'PUT')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('number', 'Mobile No.') }}
                    {{ Form::number('number', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('date', 'Date of Birth') }}
                    {{ Form::date('date', null, array('class' => 'form-control')) }}
                </div>

                {{ Form::submit('Edit the passport!', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>
</body>
</html>