<html>
         <head>
                <title> Login </title>
         </head>
       <body>

               <form method="post" action="#" name="formimg" id="formimg">
                   <input type="hidden" name="_token" value="{{ csrf_token()}}" >
                          <input type="text" name="nameLogin" id="nameLogin" >
                          <input type="password" name="passLogin" id="passLogin" >
                           <input type="submit" name="sendLogin" id="sendLogin">
               </form>



       </body>
</html>
