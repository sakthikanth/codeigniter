<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <?php
      if($page_dir=='upt'){
          $dir="../../";
      }else{
          $dir="../";
      }
      ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>css/bootstrap.min.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>css/student_add_css.css" />

      <title>Add User</title> 
   </head> 
   <body> 
       
       <div class="pageHolder">
           <div class="add_user">
               <div>Edit User</div>
           </div>
           <form method="post" action="../update/<?php echo $records[0]->id ?>">
			<div class="inp_field">
                            <label>Username</label> <input type="text" value="<?php echo $records[0]->u_name; ?>" placeholder="Enter Name" name="user_name" />
			</div>
			<div class="inp_field">
                            <label>Password</label> <input type="password" value="<?php echo $records[0]->u_pass; ?>" placeholder="Enter Password" name="user_pass" />
			</div>
			<input type="submit" value="submit" />
			
		
           </form>
       </div>
		
		
   </body>
</html>