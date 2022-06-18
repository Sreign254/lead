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
	
		
			
			
			<br>
			
		
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../html/profile2.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">profile</span>
				</a>
			</li>
			<li>
				<a href="../html/homepage.html" class="logout">
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
							<a href="#">Projects</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../html/main.php">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Upload PDF</span>
				</a>
			</div>

			
			
			<div class="table-data">
				<div class="order">
					<section class="attendance">
						<div class="attendance-list">
						  <h1>Project List</h1>
						  <?php
					require_once 'db.php';

					//get all packages
					$sqlpack = "SELECT id,siteid,sitename FROM project_details";
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
								<td><a class="button" type="button" href="preview.php?edit=<?=$id; ?>">View</span></td>
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
					
				
							<a href="download report"></a>
						  </table>
						  
						  
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	
	<script src="../js/script.js"></script>

	<script src="/js/script.js"></script>
	
</body>
</html>