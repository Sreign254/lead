<?php session_start();


$uid = $_SESSION['id'];

?>
<html>
    <head>
          <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
          <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" type="text/css" href="../css/profile.css">
          <!-- <link rel="stylesheet" type="text/css" href="profile.css"> -->
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
                 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <!-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"> -->
      <!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    </head>
    <body>
    <?php
    include "db.php";
    //get all packages
					$sqlpack = "SELECT id,fullname,email,profileimg FROM users where id=$uid";
					$stmtpack = $conn->prepare($sqlpack);
					$stmtpack->execute();
					$resultpack = $stmtpack->get_result();
					?>
          
              
    
        <div class="container">
            <div class="row">
            <?php
              while ($rowpack = $resultpack->fetch_assoc()) {
							$fullname = $rowpack['fullname'];
							$email = $rowpack['email'];
              $profileimg = $rowpack['profileimg'];
							$id = $rowpack['id'];
							?>
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-xs-12 profile-badge">
                    <!-- <img src="https://dummyimage.com/600x400/000/"> -->
                    <br>
                    
                    <form method="post" enctype="multipart/form-data">
			           	<?php include('plogic.php'); ?>
                    
                    
                    <div class="form-group text-center"  > 
                      <?php 
                      if($profileimg==NULL)
                      {
                      echo '<img alt="User Pic" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png" id="profile-image1" height="200">';
                      }
                      else 
                      {
                      echo '<img alt="User Pic" src="uploads/'.$profileimg .'" id="profile-image1" height="200"\>';
                      // echo $profileimg;

                      }
                      ?> 
                      </div>

                    <div class="form-group">  
                        <label for="Fname">Profile Picture</label>
                        <input type="file" class="form-control"  name="profileimg[]" value=<?php echo $profileimg?> >
                      </div>
                    
                    <div class="user-detail text-center">
                        <input type="hidden" class="form-control" id="fullname" placeholder="Enter full name" name="userid" value=<?php echo $uid?> >
                                             
                      <div class="form-group">  
                        <label for="Fname">Full name</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Enter full name" name="fullname" value=<?php echo $fullname?> >
                      </div>
    
                     <!-- <div class="form-group">  
                        <label for="Lname">Last Name</label>
                        <input type="text" class="form-control" id="Lname" placeholder="Enter Last Name" name="name">
                      </div>
    
                      <div class="form-group">  
                        <label for="mobile">Mobile Number</label>
                        <input type="text" class="form-control" id="Mobile" placeholder="Enter Mobile Number" name="Mobile">
                      
                    </div>-->
                    
                    <div class="form-group">  
                        <label for="email">Mail ID</label>
                        <input type="varchar" class="form-control" id="email" placeholder="Enter Mail " name="mail" value=<?php echo $email?>>
                      </div>
                   <!-- <div class="form-group">
                        <label for="age"> Age</label>
                        <input type="int" class="form-control" id="age" placeholder="Enter Age" name="age">
                        </div>-->
                        <?php  } ?>
                        {
                          <style>
                            body{
                              background-color: black;
                            }
                          </style>
                        }
                        
    
                      
     <input type="submit" class="btn btn-info" name="update" value="Update Profile"> 
     </form>                                                              
     </div></div></div></div>

     <script src="../js/profile.js"></script>
                       
        
    </body>
    </html>
    