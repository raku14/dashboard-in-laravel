<!DOCTYPE html>
<html>
<head>
   <title>Minjs validation</title>

<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

</head>
<body>
   <form class="cmxform" id="commentForm" method="post" action="{{url('/show')}}" >

      <input name="_token" value="{!! csrf_token() !!}" type="hidden">
     <fieldset>
       <legend>Please provide your name, email address (won't be published) and a comment</legend>
       <p>
         <label for="cname">Name</label>
         <input id="cname" name="name"  type="text" class="required">
       </p>
       <p>
         <label for="cemail">E-Mail (required)</label>
         <input id="cemail" type="email" name="email" >
       </p>
       <p>
          <label for="field">D.O.B</label>
          <input id="field" name="field">
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
         <textarea id="ccomment" name="comment"></textarea>
       </p>
       <p>
          <label for="crange">Range</label>
          <input type="number" id="crange" name="range">
       </p>
       <p>
          <lable for="new_password">New Password</lable>
          <input type="password" id="new_password" name="new_password">
       </p>
       <p>
          <lable for="c_password">Confirm Password</lable>
          <input type="password" id="c_password" name="c_password">
       </p>
        <p>
          <lable for="cimage">Image Upload</lable>
          <input type="file" id="cimage" name="image">
       </p>
       <p>
         <input class="submit" type="submit" value="Submit">
       </p>
     </fieldset>
     <p id="summary"></p>
   </form>
   
   <script>
      

//var template = jQuery.validator.format("{0} is not a valid value");
// later, results in 'abc is not a valid value'
//alert(template("abc"));

           var valid = jQuery('#commentForm').validate({
              invalidHandler: function() {
    $( "#summary" ).text( valid.numberOfInvalids() + " field(s) are invalid" );
  },

                                 rules:{
                                          name: {
                                             required: true,
                                             minlength: 4,
                                             maxlength: 10,
                                             customvalidation: true
                                          },
                                          email:{
                                             required: true,
                                             email: true
                                          },
                                          url:{
                                             required: true
                                          },
                                          phone:{
                                             required: true,
                                             maxlength: 10,
                                             minlength: 10
                                          },
                                          comment:{
                                             required: true
                                          },
                                          range:{
                                             required: true,
                                             rangelength: [3, 4],
                                             min: 150 

                                          },
                                          new_password: "required",
                                          c_password:{
                                             equalTo: "#new_password"
                                          },
                                          field:{
                                             required: true,
                                             date: true
                                          },
                                          image:{
                                             required: true,
                                             accept: "jpg|jpeg|png|gif"
                                          }
                                 },
                                 messages: {
                                     name: {
                                       required: "We need your name"

                                     }
                                   }


             });

            $.validator.addMethod("customvalidation",
                     function(value, element){
                        return /^[A-Za-z\d=#$%@_ -]+$/.test(value);
                  },
                  "sorry, no special character allowed."
               );
  
           
      
   </script>
</body>
</html>