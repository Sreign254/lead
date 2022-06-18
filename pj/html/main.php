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

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="team.html" href="team.html">
	
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
							<a href="../html/main.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../html/main.php">Home</a>
						</li>
					</ul>
				</div>
				<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Upload PDF</span>
				</a>-->
			</div>
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
				
			</ul>
			<div class="table-data">
				<div class="order">
					<section class="attendance">
						<div class="attendance-list">
						  <h1>My Projects</h1>
						  <?php
						  require_once 'db.php';
						  //get all packages
					$sqlpack = "SELECT id,siteid,sitename FROM project_details where userid=$uid ";
					$stmtpack = $conn->prepare($sqlpack);
					$stmtpack->execute();
					$resultpack = $stmtpack->get_result();
					?>
					<table>
						<thead>
							<tr>
								<th>Site Id</th>
								<th>Site Name</th>
								<th>details</th>
							</tr>
						</thead>
						<tbody>
						<?php
							while ($rowpack = $resultpack->fetch_assoc()) {
							$siteid = $rowpack['siteid'];
							$sitename = $rowpack['sitename'];
							$id = $rowpack['id'];
							?>
							<tr>
								<td>
								<?= $siteid; ?>
								</td>
								<td><?= $sitename; ?></td>
								<td><a  class="button" type="button" href="preview.php?edit=<?=$id; ?>">View</span></td>
							</tr>
							<?php  } ?>

						</tbody>

					</table>
					
						<style>
							.button{
								border: none;
								background-color: #008CBA;
								text-decoration: none;
								display: inline-block;
								font-size: 16px;
								
								cursor: pointer;
								color: blue;
  								border: 2px solid #4CAF50;
								  border-radius: 5px;
							}
							.button:hover {
							background-color: #4CAF50;
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