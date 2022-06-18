
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
<link rel="stylesheet" href="../css/siteanalytics.css" >
<link rel="shortcut icon" href="../html/pmanager.jpg" type="image/svg+xml">


<head>
    <a href="payroll.html"></a>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/preview.css">

	<title>eng</title>
</head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
	title{
		text-decoration:underline;}
</style>
<link rel="shortcut icon" href="../html/pmanager.jpg" type="image/svg+xml">

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="team.html" href="team.html">
	
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
		<form method="post" enctype="multipart/form-data">
			
				<div class="table-data">
				<div class="order">
					<section class="attendance">
						<div class="attendance-list">
							
						 
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
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>
		<div>
		<?php include('db.php'); ?>
		<?php 
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
  
    $sql2 = "SELECT *
     FROM project_details WHERE id='$id'";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    while ($row2 = $result2->fetch_assoc()) {
  
  
      $siteid = $row2['siteid'];
      $date= $row2['date'];
      $sitename = $row2['sitename'];
      $sitegps = $row2['sitegps'];
      $carriername = $row2['carriername'];
      $towerheight = $row2['towerheight'];
      $sector = $row2['sector'];
      $typeofscope= $row2['typeofscope'];
      $message = $row2['message'];
      $_filenamesjob = $row2['jha'];
      $_filenamesbarricading  = $row2['barricading'];
      $_filenamesfirstaidbox  = $row2['firstaidbox'];
      $_filenamesfireextinguisher  = $row2['fireextinguisher'];
      $_filenamestoolbox  = $row2['toolbox'];
      $_filenamesrubbishpoint = $row2['rubbishpoint'];
      $_filenamesenergizer  = $row2['energizer'];
      $_filenameselectricfence = $row2['electricfence'];
      $_filenamesgroundingtower = $row2['groundingtower'];
      $_filenamescentralsite = $row2['centralsite'];
      $_filenamesteammembers  = $row2['teammembers'];
      
    }

  }
?>
<form method="post" enctype="multipart/form-data">
				<div class="table-data">
				<div class="order">
					<section class="attendance">
						<div class="attendance-list">
							

<div class="row col-md-12">
<div class="form-group col-md-6">
						<label for="first_name">Site ID</label>
						<input type="text" class="form-control" id="Site ID"value="<?= $siteid; ?>"
          disabled>
					</div>
          <div class="form-group col-md-6">
						<label for="date">Date </label>
						<input type="date" class="form-control" id="date" value="<?= $date; ?>" disabled /> 
					</div>



      <div class="col-md-6 form-group">
        <label for="name" id="name-label"> Site Name</label>
        <input
          type="text"  class="form-control"id=" Site Name" value="<?= $sitename; ?>"
          disabled
        />
      </div>
      <div class="form-group col-md-6">
						<label for="last_name">Site GPS</label>
						<input type="text" class="form-control" id="Site GPS" value="<?= $sitegps; ?>">
					</div>
      <div class="form-group col-md-6">
						<label for="last_name">Carrier Name</label>
						<input type="text" class="form-control" id="Carrier Name"  value="<?= $carriername; ?>" disabled/>
			</div>
      <div class="form-group col-md-6">
						<label for="last_name">Tower height</label>
						<input type="text" class="form-control" id="Tower height" value="<?= $towerheight; ?>" disabled/> 
			</div>
      <div class="form-group col-md-6">
						<label for="last_name">Sector</label>
						<input type="text" class="form-control" id="Sector"  value="<?= $sector; ?>" disabled/> 
			</div>
      <div class="row form-group col-md-12 ">
      <label for="dropdown">Type of scope</label>
      <select name="typeofscope" class="form-control"> 
      <style>
          body{
            padding: 1em;
            margin:auto;
          }
          </style>
          <?php
          if ($typeofscope==1) {
            $msg="Swap";
           }if ($typeofscope==2) {
            $msg="Cut over";
           }
           if ($typeofscope==3) {
            $msg="Installation";
           }
           if ($typeofscope==4) {
            $msg="Allignment";
           }
           if ($typeofscope==5) {
            $msg="Drive test";
           }
           if ($typeofscope==6) {
            $msg="Other";
           }
          $sql1 = "SELECT * FROM project_details where id=$id";
          $stmt1 = $conn->prepare($sql1);
          $stmt1->execute();
          $result1 =$stmt1->get_result();
          while ($row1 = $result1->fetch_assoc()) { ?>
            
          <?php
           if ($row1['typeofscope'] == $typeofscope) { ?>

             <option value="<?= $row1['typeofscope']; ?>" selected><?= $msg; ?> </option>

           <?php } else
           { ?>
           <option value="<?= $row1['typeofscope']; ?>"><?= $msg; ?> </option>
           <?php } ?>
           <?php } ?>
					</div>
          </div>
          <div class="form-outline">
        <label for="last_name" for="Message">Message</label>
        <textarea class="form-control" id="summernote" rows="8"><?php echo $message; ?> </textarea>
        <br>
         
        </div>
        <br>
       

</div>

  <div class="form-group">
      
  <img src="uploads/<?php echo $_filenamesjob;?>" class="rounded" alt="Cinque Terre" width="304" height="236">
  <img src="uploads/<?php echo $_filenamesbarricading;?>" class="rounded" alt="Cinque Terre" width="304" height="236"> 
  <img src="uploads/<?php echo $_filenamesfirstaidbox;?>" class="rounded" alt="Cinque Terre" width="304" height="236"> 
  <img src="uploads/<?php echo $_filenamesfireextinguisher;?>" class="rounded" alt="Cinque Terre" width="304" height="236">
  <img src="uploads/<?php echo $_filenamestoolbox;?>" class="rounded" alt="Cinque Terre" width="304" height="236">
  <img src="uploads/<?php echo $_filenamesrubbishpoint;?>" class="rounded" alt="Cinque Terre" width="304" height="236">
  <img src="uploads/<?php echo $_filenamesenergizer;?>" class="rounded" alt="Cinque Terre" width="304" height="236">
  <img src="uploads/<?php echo $_filenameselectricfence;?>" class="rounded" alt="Cinque Terre" width="304" height="236">
  <img src="uploads/<?php echo $_filenamesgroundingtower;?>" class="rounded" alt="Cinque Terre" width="304" height="236">
  <img src="uploads/<?php echo $_filenamescentralsite;?>" class="rounded" alt="Cinque Terre" width="304" height="236"> 
  <img src="uploads/<?php echo $_filenamesteammembers;?>" class="rounded" alt="Cinque Terre" width="304" height="236" title="abc">
  
  </div>
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
.table-data{
  background-color: #495057;
}

</style>

			
	<script src="../js/main.js"></script>
  
</body>
</html>