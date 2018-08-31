<!-- app/views/passports/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
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
<body>
   
<div class="container">
    <div class="row">
         <div class="flex-center position-ref full-height">
           
                <div class="top-right links">
                   
                        <a href="{{ url('/auth/login') }}">Login</a>
                        <a href="{{ url('/auth') }}" style="color: black;"><u>Register</u></a>
               
                </div>
         
        </div>
    </div>

  <div class="row">
    <div class="col-md-12">
      <h1 align="center">Registration</h1>
      <hr style="border: 2px solid black;"><br>
        <div class="col-md-6 col-md-offset-3">
            
            <!-- if there are creation errors, they will show here -->
          {{ Html::ul($errors->all()) }}
          
          {{ Form::open(array('url' => 'auth/register')) }}

              <div class="form-group">
                  {{ Form::label('firstname', 'First Name') }}
                  {{ Form::text('firstname', Input::old('firstname'), array('class' => 'form-control', 'id' => 'fname')) }}
              </div>
              <div class="form-group">
                  {{ Form::label('lastname', 'Last Name') }}
                  {{ Form::text('lastname', Input::old('lastname'), array('class' => 'form-control', 'id' => 'lname')) }}
              </div>
              <div class="form-group">
                  {{ Form::label('email', 'Email') }}
                  {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
              </div>
              <div class="form-group">
                  {{ Form::label('gender', 'Gender') }}
                 <select class="form-control" name="gender">
                   <option value="1">Male</option>
                   <option value="2">Female</option>
                 </select>
              </div><div class="form-group">
                  {{ Form::label('dob', 'Date of Birth') }}
                  {{ Form::date('dob', Input::old('dob'), array('class' => 'form-control fname')) }}
              </div>
              <div class="form-group">
                  {{ Form::label('mobile', 'Mobile No.') }}
                  {{ Form::number('mobile', Input::old('mobile'), array('class' => 'form-control')) }}
              </div>
              <div class="form-group">
                  {{ Form::label('role', 'Role') }}
                 <select class="form-control" name="role">
                   <option value="">Select</option>
                   <option value="1">Android Developer</option>
                   <option value="2">React JS Developer</option>
                   <option value="3"> PHP Developer</option>
                 </select>
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
</div>
<script type="text/javascript">
    $(document).ready(function($){
         $('#fname').keyup(function(){
             $('#fname').css('text-transform', 'capitalize');
         }); 
         $('#lname').keyup(function(){
             $('#lname').css('text-transform', 'capitalize');
         }); 
          

    });

    
</script>
</body>
</html>