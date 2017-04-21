<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
            <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
            <link rel="stylesheet" type="text/css" href="../css/student_add_css.css" />

      <title>Add User</title> 
   </head> 
   <body> 
       
       <div class="pageHolder">
           <div class="add_user">
               <div>Add User</div>
           </div>
           <form method="post" action="http://localhost/codeigniter/stud/add">
			<div class="inp_field">
                            <label>Username</label> <input type="text" placeholder="Enter Name" name="user_name" />
			</div>
			<div class="inp_field">
                            <label>Password</label>	<input type="password" placeholder="Enter Password" name="user_pass" />
			</div>
               <div>
                   <?php echo validation_errors(); ?>
               </div>
			<input type="submit" value="submit" />
			
		
           </form>
       </div>
		
		
   </body>
</html>