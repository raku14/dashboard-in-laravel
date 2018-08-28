<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	@foreach ($data as $value)

		<h1>Post: {{ $value->topic}}</h1>
			<h3 style="color: red; position: relative; left: 50px;">By: {{ $value->auther }}</h3>
				<h4 style="">Comments: </h4>
				<p style="color: green; position: relative; left: 150px;">
					@foreach ($value->comments as $comment)
							{{ $comment->comment }}<br>

					@endforeach
				</p>
				<br>
	@endforeach

</body>
</html>