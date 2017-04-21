<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
            <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
            <link rel="stylesheet" type="text/css" href="../css/student_add_css.css" />

      <title>Login User</title> 
   </head> 
   <body> 
       
       <div class="pageHolder">
           <div class="add_user">
               <div>Login User</div>
           </div>
           <form method="post" action="http://localhost/codeigniter/stud/login">
			<div class="inp_field">
                            <label>Username</label> <input type="text" placeholder="Enter Name" name="user_name" />
			</div>
			<div class="inp_field">
                            <label>Password</label>	<input type="password" placeholder="Enter Password" name="pass_word" />
			</div>
                        <div class="<?php echo $user_hint; ?>">
                            <?php echo validation_errors();;
                            if(isset($page_hint)){
                                echo $page_hint;
                            }
                            ?>
                        </div>
			<input type="submit" value="Login" />
			
		
           </form>
       </div>
		
		
   </body>
</html>