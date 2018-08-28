
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
        <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>
<body>	
	<div class="container">
		<h1>Albums</h1>
		<table class="table table-bordered" id="table">
			<thead>
				<tr>
					<th>Album id</th>
					<th>Album Name</th>
					<th>User</th>
					<th>Phone Number</th>
					<th>Photo count</th>
					
				</tr>
			</thead>
		</table>
	</div>
	<script type="text/javascript">
		$(function(){
			$('#table').DataTable({
				processing: true,
				serverSide: true,
				ajax: '{{ url('albums') }}',
				columns: [
				/*	{ data: 'id', name:'id' },
					{ data: 'album_name', name: 'album_name' },
					{ data: 'users.user_name', name: 'users.user_name' },
					{ data: 'users.phone', name: 'users.phone'},
					{ data: 'photos.0.count', name: 'photos.0.count' }, */
					
					{ data: 'id', name: 'id' },
					{ data: 'album_name', name:'album_name' },
					{ data: 'user_name', name: 'user_name' },
					{ data: 'phone' , name: 'phone'},
					{ data: 'count', name: 'count'},
				]
			});
		});
	</script>
</body>
</html>