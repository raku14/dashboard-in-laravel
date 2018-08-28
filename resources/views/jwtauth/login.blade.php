<!-- app/views/passports/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <style type="text/css">
      .full-height {
          height: 5vh;
      }
      .flex-center {
          align-items: center;
          display: flex;
          justify-content: center;
      }
     .position-ref {
          position: relative;
      }
      .top-right {
          position: absolute;
          right: 10px;
          top: 18px;
      }
      .links > a {
          color: #636b6f;
          padding: 0 25px;
          font-size: 12px;
          font-weight: 600;
          letter-spacing: .1rem;
          text-decoration: none;
          text-transform: uppercase;
      }
    </style>
</head>

<body>
<div class="container">
<div class="row">
         <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href="{{ url('/auth/login') }}" style="color: black;"><u>Login</u></a>
                <a href="{{ url('/auth/register') }}">Register</a>
            </div>
        </div>
    </div>


  <div class="row">
    <div class="col-md-12">
      <h1 align="center">LogIn</h1>
      <hr style="border: 2px solid black;"><br><br><br>
        <div class="col-md-6 col-md-offset-3">
            
          @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
          @endif
           @if(session('invalid'))
                <div class="alert alert-danger">
                    {{session('invalid')}}
                </div>
          @endif
          {{ Html::ul( $errors->all() ) }}
          {{ Form::open(array('url' => 'auth/login')) }}

              <div class="form-group">
                  {{ Form::label('email', 'Email') }}
                  {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
              </div>
              <div class="form-group">
                  {{ Form::label('password', 'Password') }}
                  {{ Form::password('password', array('class' => 'form-control')) }}
              </div>

              {{ Form::submit('Login', array('class' => 'btn btn-success')) }}

          {{ Form::close() }}
       
        </div>
      
    </div>
  </div>
</div>
</body>
</html>