<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="2">
		<tr>
			<th>Name</th>
			<th>Contact</th>
			<th>Phone Brand</th>
		</tr>
		
			@foreach($data as $data)
				<tr>
					<td>{{ $data->phone_user->user_name }}</td>
					<td>{{ $data->phone_user->phone }}</td>
					<td>{{ $data->brand }}</td>
				</tr>
				
			@endforeach
		
	</table>
</body>
</html>