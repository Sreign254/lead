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
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/main.css">
	<link rel="team.html" href="team.html">
	<script src="index.html"></script>


	<title>Track</title>
	<include class="team html"></include>
</head>
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
					<div class="menu">
						
						
					</div>
				</div>
				<script>
					function menuToggle(){
						const toggleMenu = document.querySelector('.menu');
						toggleMenu.classList.toggle('active')
					}
				</script>
				
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
							<a href="#">Projects</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="./main.php">Home</a>
						</li>
					</ul>
				</div>
				
			</div>
			
			<ul class="box-info">	
			<li>
					<a href="./site.php">
                    <i class='bx bx-dumbbell' ></i>
				</a>
				<span class="text">
					<h3></h3>	
					<p>Add site</p>
				</span>
				</li>
						
				<li>
					<a href="./teamleader.php">
                    <i class='bx bx-dumbbell' ></i>
				</a>
				<span class="text">
					<h3></h3>		
					<p>Team Leader</p>
				</span>
				</li>
				<li>
					<a href="./project.php">
                    <i class='bx bx-rocket' ></i>
				</a>
				<span class="text">
					<h3></h3>		
					<p>Site names</p>
				</span>
				</li>
			</ul>
			
			<div class="table-data">
				<div class="order">
					<section class="attendance">
						<div class="attendance-list">
						  <h1>Project List</h1>
						  <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Projects</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<?php
					require_once 'db.php';

					 //get all packages
					 $sqlpack = "SELECT id,name,new_name FROM uploaded_files";
					 $stmtpack = $conn->prepare($sqlpack);
					 $stmtpack->execute();
					 $resultpack = $stmtpack->get_result();
					 ?>
					 <table>
						 <thead>
							 <tr>
								 <th>Project name</th>
								 
								 <th>View</th>
							 </tr>
						 </thead>
						 <tbody>
						 <?php
							 while ($rowpack = $resultpack->fetch_assoc()) {
							 $name = $rowpack['name'];
							 $mew_name = $rowpack['new_name'];
							 $id = $rowpack['id'];
							 ?>
							 <tr>
								 <td>
								 <?= $name; ?>
								 </td>
								 
								 <td><a class="status completed" >View</span></td>
							 </tr>
							 <?php  } ?>
 
						 </tbody>
					 </table>

						  
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<?php include('script.php');?>
</body>
</html>