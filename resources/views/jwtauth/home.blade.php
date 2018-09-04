
@extends('jwtauth.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6" style="padding: 8px;">
                    <img class="img-thumbnail" src="/profile/{{session::has('photo') ? session('photo') : 'user.png' }}" style="height: 250px; width: 250px; border: 3px double skyblue;">
                   
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
                            {{ Form::textarea('content', '', array('class' => 'form-control', 'rows' => '4', 'id' => 'content', 'placeholder' => 'Write Something here...')) }}
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Post" class="btn btn-success">
                        </div>
                    </form>
                </div>

            </div>

        </div>
   
    </div>
     <hr>
     <div style="height: 30px;" >
         @if(Session::has('blog'))
        <center>
            <div class="col-sm-1 alert alert-primary" id="blog">
                {{ Session('blog') }}
            </div>
        </center>
         @endif
         @if(Session::has('post_update'))
            <center>
                <div class="col-sm-2 alert alert-primary" id="blog">
                    {{ Session('post_update') }}
                </div>
            </center>
         @endif
         @if(Session::has('post_delete'))
            <center>
                <div class="col-sm-1 alert alert-danger" id="blog">
                    {{ Session('post_delete') }}
                </div>
            </center>
         @endif
     </div>
     
     @foreach($blog as $key => $blog)

    <form method="POST" action="{{url('auth/blog/update')}}">  
             @csrf 
        <input type="hidden" name="post_id" value="{{$blog->id}}">
     <div class="row">
         <div class="col-md-12" style="padding: 20px;">
            <div class="row">
                <p>
                    <div class="col-md-10" style="position: relative; top: 70px; ">
                        
                        <textarea  name="text{{$key}}" id="text{{$key}}" style="background: white; pointer-events: none; "  class="form-control" rows="6"  cols="20">{{$blog->content}}</textarea>
                    <br><br>
                    </div> 
                       
                    <div class="col-md-6" style="position: relative; top: -225px;" >
                        <b>Title : {{$blog->title }}</b> <br>
                        <b>Date : </b>@php echo strstr($blog->created_at, ' ', true); @endphp
                    
                        <div class="row" style="margin-left: 2px;" >
                          
                            <input onclick="edit({{$key}})" id="edit{{$key}}" class="btn btn-sm btn-info" type="button" value="Edit" >
                            &nbsp;
                            <div class="col-md-2" style="display: none; position: relative;" id="btn{{$key}}">
                                <input type="hidden" value="{{$key}}" name="txt_key">
                               <input id="update{{$key}}" class="btn btn-sm btn-warning" type="submit" value="Update">
                            </div> 
                            &nbsp;
                            <a href="{{url( 'auth/blog/delete', $blog->id )}}"><input id="delete{{$key}}" class="btn btn-sm btn-danger" type="button" value="Delete"></a>    
                            
                        </div>
                    </div>  
                </p>
            </div>
         </div>
     </div>
    </form>    
     @endforeach

</div>
<script type="text/javascript">
    jQuery(document).ready(function($){
          $('#profile').addClass('active'); 
          $('#blog').fadeOut(4000);

    });

    function edit(key)
    {
        var edit = 'edit' + key;
        document.getElementById(edit).classList.add('active');

        var btn = 'btn' + key;
        var x = document.getElementById(btn);
        if (x.style.display === "none") {
            x.style.display = "block";   
        } 
        else {
            x.style.display = "none";
        }

        var text = 'text' + key;
        var edt = document.getElementById(text);
        if( edt.style.pointerEvents === "none" ){
            edt.style.pointerEvents = "auto";
        } else{
            edt.style.pointerEvents = "none";
        }    
    }
    
</script>

@endsection
