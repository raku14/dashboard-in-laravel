<html>
   <head>
      <title>Ajax Example</title>
      
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      </script>
      
      <script>
         function getMessage(){

            $.ajax({
               type:'POST',
               url:'/api/getmsg',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data){
                  console.log(data);
                 $("#msg").html(data);
               }
            });
         }
      </script>
   </head>
   
   <body>

      
      <?php
         echo Form::button('Replace Message',['onClick'=>'getMessage()']);
      ?>
      <div id = 'msg'>This message will be replaced using Ajax. 
         Click the button to replace the message.</div>
   </body>

</html>