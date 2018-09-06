<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
	@foreach($blog as $blog)
	<div class="container">
		<br><br>
		<div class="row" style="padding: 40px;">
			<div class="col-md-12">
				<div class="col-md-1">
					<img src="/profile/{{($blog->photo != '' ? $blog->photo : 'user.png')}}" style="height: 50px; width: 50px;">
				</div>
				<div class="col-md-6">
					<a href="#"><span>{{$blog->firstname. ' '. $blog->lastname}}</span></a><br>
					<span>{{$blog->created_at}}</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-left: 50px;">
				<div class="col-md-12">
					<b>Title : {{$blog->title }}</b>
				</div>
				<div class="col-md-6">
					<textarea class="form-control" rows="4">{{$blog->content}}</textarea>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</body>
</html>