<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
        <link rel="stylesheet" type="text/css" href="../css/file_upload_css.css" />
        <?php  ?>
</head>
<body>


    <div>
        <h2>File Upload</h2>
    </div>
    <form action="../stud/upload" method="post" enctype="multipart/form-data" >

            <div class="form" >

                    <label>Upload File</label>
                    <input type="file" value="" name="userfile" placeholder="name" />

            </div>


                    <?php 

            foreach ($my as $key => $value) {
                            echo $value;
                    }	
                     ?>
            <div>
                     <input type="submit" value="Upload" />
            </div>
    </form>
        <div>
        <h2>File Details</h2>
    </div>
    <div class="fileDetailHOld">
        <div class="File_Inner" >
            
            <?php
                                 foreach ($upload_data as $key => $val) {
                                     ?>
            
                                    <div class="det_Item">
                                        <div class="det_ctgry">
                                           <?php echo $key; ?>
                                        </div>
                                        <div class="det_ctgry">
                                           <?php echo $val; ?>
                                        </div>

                                    </div>
                                         <?php
                                 }
            
            ?>
            
            
        </div>
    </div>
                        
   
</body>
</html>
