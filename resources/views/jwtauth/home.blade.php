
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
                    <form class="form-horizotal">
                        <div class="form-group">
                            <label class="control-label"><b>Title :</b> </label>
                           <div class="form-group">
                                <input type="text" name="title" class="form-control">
                           </div>
                        </div>
                        <div class="form-group">
                            <textarea rows="4" class="form-control" >Write something here...</textarea>
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
</div>
<script type="text/javascript">
    jQuery(document).ready(function($){
          $('#home').addClass('active');       
    });
</script>
@endsection
