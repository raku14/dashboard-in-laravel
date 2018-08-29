
@extends('jwtauth.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-thumbnail" src="/profile/{{session('photo') != '' ? session('photo') : 'user.png' }}" style="height: 250px; width: 250px; border: 3px double skyblue;">
                   
                </div>

                <div class="col-md-6" style="background: white;">
                       {{ Html::ul($errors->all()) }}
                    <form class="form-horizotal" method="post" action="{{url('auth/blog')}}">
                        @csrf
                        <div class="form-group">
                             {{ Form::label('title', 'Title : ') }}
                             {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('content', 'Write something here...', array('class' => 'form-control', 'rows' => '4', 'id' => 'content')) }}
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Post" class="btn btn-info">
                        </div>
                    </form>
                </div>

            </div>

        </div>
   
    </div>
     <hr>
     @if(Session::has('blog'))
        <center>
            <div class="col-sm-1 alert alert-success" id="blog">
                {{ Session('blog') }}
            </div>
        </center>
     @endif
     @foreach($blog as $key => $blog)
     <div class="row">
         <div class="col-md-12" style="padding: 20px;">
            <div class="row">
                <p>
                    <div class="col-md-6" >
                        <b>Title : {{$blog->title }}</b>
                        <div class="row">
                            <div class="col-sm-1" >
                                <input onclick="edit({{$key}})" id="edit{{$key}}" class="btn btn-sm btn-info" type="button" value="Edit">
                            </div>
                            <div class="col-lg-1">
                <form method="POST" action="{{url('auth/blog/update')}}">
                                @csrf
                                   <input id="update{{$key}}" class="btn btn-sm btn-warning" type="submit" value="Update">
                               
                            </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col-sm-1">
                               
                                   <input id="delete{{$key}}" class="btn btn-sm btn-danger" type="submit" value="Delete">    
                               
                            </div>
                        </div>
                    </div>
                 
                    <div class="col-md-10" style="padding: 10px;">
                        <textarea name="text{{$key}}" id="text{{$key}}" style="background: white;" class="form-control" rows="6" disabled cols="20">{{$blog->content}}</textarea>
                    </div> 
                </form>
                   
                </p>
            </div>
         </div>
     </div>
         
     @endforeach
</div>
<script type="text/javascript">
    jQuery(document).ready(function($){
          $('#home').addClass('active'); 
          $('#content').click(function(){
                $('#content').text('');
          });
          $('#blog').fadeOut(3000);
    });

    function edit(key)
    {
        var edit = 'edit' + key;
        document.getElementById(edit).classList.add('active');
        var text = 'text' + key;
        //console.log(id);
       document.getElementById(text).disabled = false;
    }
</script>
@endsection
