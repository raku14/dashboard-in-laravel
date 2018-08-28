<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- References: https://github.com/fancyapps/fancyBox -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


    <style type="text/css">

    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }

    .close-icon{
    	border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }

    .form-image-upload{
        background: #e8e8e8 none repeat scroll 0 0;
        padding: 15px;
    }

    </style>
</head>
<body>
	@if (count($errors) > 0)
         <div>
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif

	   	@if (session('success'))
		    <div class="alert alert-success">
		        {{ session('success') }}
		    </div>
		@endif
        @if (session('delete'))
        	 <div class="alert alert-danger">
		        {{ session('delete') }}
		    </div>
	    @endif
<div class="container">
		
	<?php

		echo Form::open(array('url'=>'image', 'files'=>true));
		echo Form::file('image');
		echo Form::submit('Upload');
		echo Form::close();
	?>
	
	<div class="row">

    <div class='list-group gallery'>


            @if($images->count())

                @foreach($images as $image)

                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>

                    <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">

                        <img class="img-responsive" alt="" src="/upload/{{ $image->image_name }}" />
                    </a>

                    <form action="{{ url('image',$image->id) }}" method="POST">

                    <input type="hidden" name="_method" value="delete">

                    {!! csrf_field() !!}

                    <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>

                    </form>

                </div> <!-- col-6 / end -->

                @endforeach

            @endif


        </div> <!-- list-group / end -->

    </div> <!-- row / end -->

</div> <!-- container / end -->



</body>
</html>