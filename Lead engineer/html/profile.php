
<?php session_start();


$uid = $_SESSION['id'];

?>
 <?php
    include "db.php";
    //get all packages
					$sqlpack = "SELECT id,fullname,email,profileimg FROM lead where id=$uid";
					$stmtpack = $conn->prepare($sqlpack);
					$stmtpack->execute();
					$resultpack = $stmtpack->get_result();
					?>
					<?php
              while ($rowpack = $resultpack->fetch_assoc()) {
							$fullname = $rowpack['fullname'];
							$email = $rowpack['email'];
              $profileimg = $rowpack['profileimg'];
							$id = $rowpack['id'];}
							?>
<!DOCTYPE html>
<html lang="en">
<?php include("header.php"); ?>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="team.html" href="team.html">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/profile.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/updateprofile.css" rel="stylesheet">
	
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	
	<script src="index.html"></script>

<body>


	<!-- SIDEBAR -->
	<?php include("sidebar.php"); ?>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<!--<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>-->
			<a>
			<?php
			if($profileimg==NULL)
                      {
                      echo '<img alt="User Pic" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png" id="profile-image1" style="width: 36px;height: 36px;object-fit: cover; border-radius: 50%;"">';
                      }
                      else 
                      {
                      echo '<img alt="User Pic" src="uploads/'.$profileimg .'" id="profile-image1" style="width: 36px; height: 36px;object-fit: cover; border-radius: 50%;" \>';
                      // echo $profileimg;

                      }
                      ?> 
			</a>
		</nav>
		
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="./main.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
					
				</div>
				
			</div>
			<?php
    include "db.php";
    //get all packages
					$sqlpack = "SELECT id,fullname,email,profileimg FROM lead where id=$uid";
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
                        <input type="hidden" class="form-control" id="fullname" placeholder="Enter full name" name="userid" value=<?php echo $uid?> 
						{style="width: 36px;height: 36px;object-fit: cover; border-radius: 50%;text-allign:center;}">
                                             
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
                        <input type="varchar" class="form-control" id="email" placeholder="Enter Mail " name="mail" value=<?php echo $email?> {style="textallign:center; display: inline-block;
    padding: 6px 12px; "}>
                      </div>
					  <?php  } ?>
					  <input type="submit" class="btn btn-info" name="update" value="Update Profile" {style="textallign:center; display: inline-block;
    padding: 6px 12px; border-radius: 50%;border-radius:50%;"}> 
	<style>
		 body{
                              background-color:  #4F6072;
							  display: block;
                            }
							.profile-image1{
								border-radius: 50%;
							}
							a {
                               text-decoration: none;
                              }
							  .img-body{
								color: white;
							  }
                          </style>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<?php include('script.php');?>

	
</body>
</html>