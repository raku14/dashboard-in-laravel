@extends('jwtauth.app')

@section('content')

@foreach($user as $key => $user)
       
    <div class="container">
      @if(Session::has('update'))
        <div class="alert alert-success">
            {{ Session('update') }}
        </div>
      @endif
      <div class="row">
        <div class="col-md-12">
          <h1 align="center">Update</h1>
          <hr style="border: 2px solid black;"><br>
            <div class="col-md-6" style="margin-left: 300px;">
                
                <!-- if there are creation errors, they will show here -->
              {{ Html::ul($errors->all()) }}
              
               {{ Form::model($user, array('route' => array('auth.update', $user->id), 'method' => 'PUT', 'files'=>true)) }}

                  <div class="form-group">
                      {{ Form::label('firstname', 'First Name') }}
                      {{ Form::text('firstname', value($user->firstname), array('class' => 'form-control')) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('lastname', 'Last Name') }}
                      {{ Form::text('lastname', value($user->lastname), array('class' => 'form-control')) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('gender', 'Gender') }}
                     <select class="form-control" name="gender">
                      @foreach($gender as $value)
                        <?php
                          $select = '';
                          if($value->id == $user->gender)
                              $select = 'selected';
                        ?>
                          <option value="{{$value->id}}" <?php echo $select;?> >
                            {{$value->gender}}
                          </option> 
                        @endforeach
                     </select>
                  </div><div class="form-group">
                      {{ Form::label('dob', 'Date of Birth') }}
                      {{ Form::date('dob', value($user->dob), array('class' => 'form-control')) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('mobile', 'Mobile No.') }}
                      {{ Form::number('mobile', value($user->mobile), array('class' => 'form-control')) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('role', 'Role') }}
                     <select class="form-control" name="role">
                        @foreach($role as $value)
                        <?php
                          $select = '';
                          if($value->id == $user->role)
                              $select = 'selected';
                        ?>
                          <option value="{{$value->id}}" <?php echo $select;?> >
                            {{$value->name}}
                          </option> 
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                      {{ Form::label('photo', 'Photo') }}
                      <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
                  </div>
                  <div class="form-group">
                      <img src="#" id="image"  style="height: 100px; width: 100px; display: none; position: relative; left: 400px;" />
                  </div>
                  {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

              {{ Form::close() }}

            </div>
          
        </div>
      </div>
    </div>
@endforeach
    <script>
      $(document).ready(function(){
          $("#photo").change(function(){
              
              $("#image").css('display', 'block');
          });
      });
          
          function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#photo").change(function(){
        readURL(this);
    });
    </script>
@endsection

 



 
