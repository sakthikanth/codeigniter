<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <?php
 
       
      $dir="";
      if($page_dir=='del'){
          $dir='../../';
      }elseif($page_dir=='upt'){
          $dir='../';
      }
      ?>
      <link rel="stylesheet" type="text/css" href="http://localhost/codeigniter/css/student_list_css.css" />
      <link rel="stylesheet" type="text/css" href="http://localhost/codeigniter/css/bootstrap.min.css" />

      <title>Students Example</title> 
   </head>
	
   <body> 
    
      <div class="pageHolder container">
          <div>
              <h2>
                  User List
              </h2>
          </div>
      

          <div class="tblHolder col-lg-12">
              <table class="table table-striped" > 
                  <thead>
         <?php 
            $i = 1; 
            echo ""; 
            echo "<th>S.No</th>"; 
            echo "<th>Username.</th>"; 
            echo "<th>Password</th>"; 
            echo "<th>Edit</th>"; 
            echo "<th>Delete</th>"; 
            echo ""; 
		?> </thead>
                  <tbody><?php		
            foreach($records as $r) {
				
               echo "<tr>"; 
               echo "<td>".$i++."</td>"; 
               echo "<td>".$r->u_name."</td>"; 
               echo "<td>".$r->u_pass."</td>"; 
               echo "<td><a href = 'http://localhost/codeigniter/stud/edit/"
                  .$r->id."'>Edit</a></td>"; 
                echo "<td><a href = 'http://localhost/codeigniter/stud/delete/"
                  .$r->id."'>Delete</a></td>";
               echo "<tr>"; 
            } 
         ?>
                  </tbody>
      </table> 
          </div>
                   <div>
                              <a href = "http://localhost/codeigniter/stud/add_view"> <button>Add User</button></a>

          </div>
      </div>	
     
     
	  <!--<a href="http://localhost/codeigniter/index.php/stud/exec/"><button >Execute</button></a>-->
		
   </body>
	
</html>