<!DOCTYPE html>
<html>
<head>
	<title>JQuery Validation</title>
	    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>




</head>
<body>
	<form class="cmxform" id="commentForm" method="post" action="{{url('/show')}}" >

		<input name="_token" value="{!! csrf_token() !!}" type="hidden">
	  <fieldset>
	    <legend>Please provide your name, email address (won't be published) and a comment</legend>
	    <p>
	      <label for="cname">Name</label>
	      <input id="cname" name="name"  type="text">
	    </p>
	    <p>
	      <label for="cemail">E-Mail (required)</label>
	      <input id="cemail" type="email" name="email" >
	    </p>
	    <p>
	      <label for="curl">URL (optional)</label>
	      <input id="curl" type="url" name="url">
	    </p>
	    <p>
	    	<label for="cphone">Contact</label>
	    	<input type="number" name="phone" id="cphone">
	    </p>
	    <p>
	      <label for="ccomment">Your comment (required)</label>
	      <textarea id="ccomment" name="comment" ></textarea>
	    </p>
	    <p>
	      <input class="submit" type="submit" value="Submit">
	    </p>
	  </fieldset>
	</form>
	
	<script>
		//$("#commentForm").validate();
		 $( "#commentForm" ).validate({
									rules: 
									{
										name: {
											required: true,
											
											alphanumeric: true	
										},
										email: {
											required: true
										},
										url: {
											required: true
										},
										phone: {
											required: true,
											maxlength: 10, minlength: 10
										},
										comment: {
											required: true
										}
									}
		});	
		 $.validator.addMethod( "alphanumeric", function( value, element ) {
					return this.optional( element ) || /^\w+$/i.test( value );
				}, "Letters, numbers, and underscores only please" );
	</script>
</body>
</html>