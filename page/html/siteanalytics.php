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
	<link rel="stylesheet" href="../css/siteanalytics.css" >
	<!-- include libraries(jQuery, bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
	title{
		text-decoration:underline;}
</style>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
							<a href="#">Site Analytics</a>
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
		<div>
		<form method="post" enctype="multipart/form-data">
				<?php include('process.php'); ?>
				<div class="table-data">
				<div class="order">
					<section class="attendance">
						<div class="attendance-list">
							
						  <h1>My Projects</h1>

						  <div class="row col-md-12">
				<input type="hidden" class="form-control"  name="userid" value=<?php echo $uid?> >
					<div class="form-group col-md-6">
						<label for="first_name">Site ID</label>
						<input type="text" class="form-control" id="Site ID" name="siteid" placeholder="Site ID">
					</div>
					<div class="form-group col-md-6">
						<label for="date">Date </label>
						<input type="date" class="form-control" id="date" name="date" placeholder="date">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">Site Name</label>
						<input type="text" class="form-control" id="Site Name" name="sitename" placeholder="Site Name">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">Site GPS</label>
						<input type="text" class="form-control" id="Site GPS" name="sitegps" placeholder="Site GPS">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">Carrier Name</label>
						<input type="text" class="form-control" id="Carrier Name" name="carriername" placeholder="Carrier Name">
					</div>

					<div class="form-group col-md-6">
						<label for="last_name">Tower height</label>
						<input type="text" class="form-control" id="Tower height" name="towerheight" placeholder="Tower height">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">Sector</label>
						<input type="text" class="form-control" id="Sector" name="sector" placeholder="Sector">
					</div>
					
					<div class="form-group col-md-6 ">
						<label for="dropdown">Type of scope</label>
						<select name="typeofscope" id="typeofscope" class="form-control" required>
							<option value="">Select scope</option>
							<option value="1">Swap</option>
							<option value="2">Cut over</option>
							<option value="3">Installation</option>
							<option value="4">Allignment</option>
							<option value="5">Other</option>
						</select>
					</div>

				</div>

				<div class="form-outline">

<label for="summernote" for="message">Message</label>
<textarea class="form-control" id="summernote" rows="10" name="message" placeholder="Message"></textarea>
<style>
	.note-editable {
	  background: white;
	}
	.form-control{
		background-color: white;
	}
	.message{
		background-color: white;
	}
</style>

				</div>
				<div class="row col-md-12">

					<div class="form-group col-md-6">
						<label for="first_name">JHA</label>
						<input type="file" class="form-control" id="Site ID" name="job[]" placeholder="JHA">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">BARRICADING</label>
						<input type="file" class="form-control" id="barricading" name="barricading[]" placeholder="barricadingName">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">First Aid Box</label>
						<input type="file" class="form-control" id="firstaidbox" name="firstaidbox[]" placeholder="firstaidbox">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">Fire Extinguisher</label>
						<input type="file" class="form-control" id="fireextinguisher" name="fireextinguisher[]" placeholder="fireextinguisher">
					</div>

					<div class="form-group col-md-6">
						<label for="last_name">Tool Box</label>
						<input type="file" class="form-control" id="toolbox" name="toolbox[]" placeholder="toolbox">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">Rubbish Point</label>
						<input type="file" class="form-control" id="rubbishpoint" name="rubbishpoint[]" placeholder="rubbishpoint">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">Energizer</label>
						<input type="file" class="form-control" id="energizer" name="energizer[]" placeholder="energizer">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">Electric Fence</label>
						<input type="file" class="form-control" id="electricfence" name="electricfence[]" placeholder="electricfence">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">Grounding tower</label>
						<input type="file" class="form-control" id="Sector" name="groundingtower[]" placeholder="Sector">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">Central site</label>
						<input type="file" class="form-control" id="centralsite" name="centralsite[]" placeholder="centralsite">
					</div>
					<div class="form-group col-md-6">
						<label for="last_name">Team members</label>
						<input type="file" class="form-control" id="teammembers" name="teammembers[]" placeholder="teammembers">
					</div>

				</div>
				<div class=" form-group text-center">
					<button type="submit" name="addrecord" class="btn btn-primary btn-lg">submit</button>

				</div>
			</form>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->



	<script src="../js/script.js"></script>
	<script type="text/javascript">
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 200,
      width: 1300,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen']]
      ]
    });
  });
</script>
					
					<style>
							
							.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	box-sizing: border-box;
}
.attendance-list .form-control {
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
}

.row{
	width: 100%;
	display: inline-flex;
	flex-wrap: wrap;
	align-items: center;
	justify-content: space-between;
}
.row .text{
	flex-basis: 50%;
}

</style>
					</div>


		</div>
					
						

						  
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../js/script.js"></script>
</body>
</html>