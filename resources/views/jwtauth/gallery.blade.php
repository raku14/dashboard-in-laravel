<?php 
   $page = basename( $_SERVER['PHP_SELF'] );
?>
@extends('jwtauth.app')
 
@section('content')
 
<div class="container">
   {{ Html::ul( $errors->all() ) }}
  <div class="row">

  <?php

    echo Form::open(array('url'=>'auth/upload', 'files'=>true));
    echo Form::file('image[]', array('multiple'=>true, 'accept'=>'image/*'));
    echo Form::submit('Upload', array('class' => 'btn btn-success'));
    echo Form::close();
  ?>
  </div>
  <div class="row">
      <div class="col-md-12">
        <center><h1>Gallery</h1></center>
        <hr><br>
      </div>
  </div>
  <div class="row">
        <div class="demo-gallery">
                <ul id="lightgallery" class="list-unstyled row">
                    @foreach($gallery as $gallery)
                    <li class="col-xs-6 col-sm-4 col-md-2 col-lg-2" data-responsive="/gallery/{{$gallery->image}}" data-src="/gallery/{{$gallery->image}}" data-sub-html="<h4></h4><p></p>">
                       
                        <a href="">
                            <img class="img-responsive" src="/gallery/{{$gallery->image}}">
                        </a>
                    </li>
                   @endforeach
                </ul>
            </div>
       
        <script>
            $(document).ready(function(){
                $('#lightgallery').lightGallery(); 
                 $('#gly').addClass('active');
            });
        </script>  
  </div>
</div>

@endsection


            