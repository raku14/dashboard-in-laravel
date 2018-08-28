@extends('jwtauth.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-thumbnail" src="/profile/{{session('photo') != '' ? session('photo') : 'user.png' }}" style="height: 250px; width: 250px; border: 3px double skyblue;">
                   
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
