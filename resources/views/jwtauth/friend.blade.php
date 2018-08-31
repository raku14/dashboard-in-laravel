<?php 
   $page = basename( $_SERVER['PHP_SELF'] );
?>

@extends('jwtauth.app')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-12" >
				<h1>Find Friends</h1>			
					<table class="" id="table" style="margin: auto; width: 60%;">
				
					</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		 
		$(function(){
			$('#table').DataTable({
				processing: true,
				serverSide: true,
				ajax: '{{ url('auth/friend/show') }}',
				columns: [
					{ data: 'photo', name:'photo',
						render: function(data, type, full, meta){
							return "<img src=\"/profile/" + data + "\" height=\"50\" />";

						}
					},
					{ data: 'mergeColumn', name: 'mergeColumn', searchable: false, sortable : false, visible:true, 
						render: function(data, type, full, meta){
							return '<a href="#">' + data +  "</a>";
						}
					},
					{ data: 'firstname', name: 'firstname', searchable: true, sortable : true, visible:false},
					{ data: 'lastname', name: 'lastname', searchable: true, sortable : true, visible:false},
					{ data: 'action', name: 'action', orderable: false},
				]
			});
		});   

		$('#friend').addClass('active');
	</script>

@endsection