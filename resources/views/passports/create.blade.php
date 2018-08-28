<!-- app/views/passports/create.blade.php -->

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
      <h1>Create a passport</h1>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::open(array('url' => 'passports')) }}

          <div class="form-group">
              {{ Form::label('name', 'Name') }}
              {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('email', 'Email') }}
              {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
          </div>
          <div class="form-group">
              {{ Form::label('number', 'Mobile No.') }}
              {{ Form::number('number', Input::old('number'), array('class' => 'form-control')) }}
          </div>
          <div class="form-group">
              {{ Form::label('date', 'Date of Birth') }}
              {{ Form::date('date', Input::old('date'), array('class' => 'form-control')) }}
          </div>

          {{ Form::submit('Create the passport!', array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
    </div>
  </div>
</div>
</body>
</html>