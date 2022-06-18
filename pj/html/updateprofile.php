<?php session_start();


$uid = $_SESSION['id'];

?>
 <?php
    include "db.php";
    //get all packages
					$sqlpack = "SELECT id,fullname,email,profileimg FROM users where id=$uid";
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
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="../html/pmanager.jpg" type="image/svg+xml">


	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="team.html" href="team.html">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/profile.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/updateprofile.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

	
	<script src="index.html"></script>


	<title>Team Leader</title>
	<include class="team html"></include>
</head>
<body>
	


	<!-- SIDEBAR -->
	<section id="sidebar">
	<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Team Leader</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
			<a href="../html/sitenames.php">
					<i class='bx bxs-rocket' ></i>
					<span class="text"> Site Names</span>
				</a>
			</li>
			<li>
			<a href="../html/project2.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text"> Projects</span>
				</a>
			</li>
			<li>
				<a href="../html/siteanalytics.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
		
		
			
			
			<br>
			
		
		</ul>
		<ul class="side-menu">
			<li>
			<a href="../html/updateprofile.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="../html/logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
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
			
			<?php
			if($profileimg==NULL)
                      {
                      echo '<img alt="User Pic" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png" id="profile-image1" style="width: 36px;height: 36px;object-fit: cover; border-radius: 50%;">';
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
							<a href="#">Update Profile</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../html/main.php">Home</a>
						</li>
					</ul>
				</div>
				
			</div>
		<div>
		<ul class="box-info">
						
						<li>
						<a href="../html/sitenames.php">
							<i class='bx bx-dumbbell' ></i>
						</a>
						<span class="text">
							<h3></h3>		
							<p>Site names</p>
						</span>
						</li>
						<li>
						<a href="../html/project2.php">
							<i class='bx bx-dumbbell' ></i>
						</a>
						<span class="text">
							<h3></h3>	
							<p>Projects</p>
						</span>
						</li>
					</ul>
			
				<div class="table-data">
				<div class="order">
					<section class="attendance">
						<div class="attendance-list">
							
						  <h1>Update Profile</h1>
						  

			
				
			<?php
    include "db.php";
    //get all packages
					$sqlpack = "SELECT id,fullname,email,profileimg FROM users where id=$uid";
					$stmtpack = $conn->prepare($sqlpack);
					$stmtpack->execute();
					$resultpack = $stmtpack->get_result();
					?>
          
              
    
       
							
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
						style="width: 36px;height: 36px;object-fit: cover; border-radius: 50%;">
                                             
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
    padding: 6px 12px; border-radius: 50%;"}> 
	<style>
		 body{
                              background-color:  #0C0C1E;
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
	

	<script src="../js/script.js"></script>
</body>
</html>