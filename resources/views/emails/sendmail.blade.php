<!DOCTYPE html>
<html>
<head>
	<title>Send Mail</title>
</head>

<style>
	.mail{
		width: 350px;
	}
</style>
<body>
	<center>
		<h2>Mail</h2>
		@if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                 	<li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
     	@endif
     	@if(session('mail'))
     		{{ session('mail') }}
     	@endif
		{{ Form::open(array('url' => 'mail')) }}
		<table>
			<tr>
				<td>TO</td><td>{{ Form::email('email', Input::old('email'), array('class' => 'mail')) }}</td>
			</tr>
			<tr>
				<td>Subject</td><td>{{ Form::text('subject', Input::old('subject'), array('class'=> 'mail')) }}</td>
			</tr>
			<tr>
				<td>Body</td><td>{{ Form::textarea('body') }}</td>
			</tr>
			<tr>
				<td></td>
				<td>{{ Form::submit('Send') }}</td>
			</tr>
		</table>
		{{ Form::close() }}
	</center>
</body>
</html>