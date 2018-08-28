@extends('layouts.default')

@section('content')
	<div class="row">
    <div class="col-md-12">
      <h1 align="center">Registration</h1>
      <hr style="border: 2px solid black;"><br><br><br>
        <div class="col-md-6 col-md-offset-3">
            
            <!-- if there are creation errors, they will show here -->
          {{ Html::ul($errors->all()) }}
          
          {{ Form::open(array('url' => 'auth')) }}

              <div class="form-group">
                  {{ Form::label('name', 'Name') }}
                  {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
              </div>

              <div class="form-group">
                  {{ Form::label('email', 'Email') }}
                  {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
              </div>
              <div class="form-group">
                  {{ Form::label('password', 'Password') }}
                  {{ Form::password('password', array('class' => 'form-control')) }}
              </div>

              {{ Form::submit('Register', array('class' => 'btn btn-primary')) }}

          {{ Form::close() }}
       
        </div>
      
    </div>
  </div>
@stop