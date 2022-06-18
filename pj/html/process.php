<?php
require_once 'db.php';


$rpath =getcwd();

$siteid       = "";

$date   ="";
$sitename   = "";
$sitegps  = "";

   
    
$carriername  ="";
$towerheight  ="";
$sector       ="";
$typeofscope ="";
$message    ="";
$_filenamesjob   ="";
$_filenamesbarricading ="";
$_filenamesfirstaidbox ="";
$_filenamesfireextinguisher ="";
$_filenamestoolbox ="";
$_filenamesrubbishpoint ="";
$_filenamesenergizer ="";
$_filenameselectricfence ="";
$_filenamesgroundingtower ="";
$_filenamescentralsite ="";
$_filenamesteammembers  ="";
$userid ="";

$errors = [];
$max_file_size = 1024 * 1000 * 100; //100mb




// escape string
function escape($string)
{
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

//remove html entities from post request
function clean($string)
{
    return htmlentities($string);
}

//remove html entities from username solo,retain emoji request
function cleanusername($string)
{
    return htmlentities($string, ENT_HTML5);
}
//redirect funtion
function redirect($location)
{
    return header("Location: {$location}");
}

function set_message($message)
{


    if (!empty($message)) {


        $_SESSION['message'] = $message;
    } else {

        $message = "";
    }
}

function display_message()
{

    if (isset($_SESSION['message'])) {


        echo $_SESSION['message'];

        unset($_SESSION['message']);
    }
}

function validation_errors($error_message)
{

    $error_message = <<<DELIMITER
<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
									<div class="text-white">$error_message</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
DELIMITER;
    return $error_message;
}



function row_count($result)
{
    return mysqli_num_rows($result);
}

function confirm($result)
{
    global $conn;

    if (!$result) {

        die("QUERY FAILED" . mysqli_error($conn));
    }
}
// run query
function query($query)
{

    global $conn;
    $result =  mysqli_query($conn, $query);
    confirm($result);
    return $result;
}

// fetch asociative array
function fetch_array($result)
{
    global $conn;
    return mysqli_fetch_array($result);
}


// register user function 
function project_details(
    $siteid,
    $date,
    $sitename,
    $sitegps,
    $carriername,
    $towerheight,
    $sector,
    $typeofscope,
    $message ,
	$_filenamesjob ,
    $_filenamesbarricading,
    $_filenamesfirstaidbox,
    $_filenamesfireextinguisher,
    $_filenamestoolbox,
    $_filenamesrubbishpoint,
    $_filenamesenergizer,
    $_filenameselectricfence,
    $_filenamesgroundingtower,
    $_filenamescentralsite,
    $_filenamesteammembers,
	$userid
) {
    global $conn;

    $siteid    = $siteid;
    $date  = $date;
    $sitename       = $sitename;
    $sitegps  = $sitegps ;
    $carriername  =$carriername ;
    $towerheight =$towerheight ;
    $sector =$sector;
    $typeofscope =$typeofscope;
    $message   = $message ;
    $_filenamesjob  = $_filenamesjob ;
    $_filenamesbarricading =$_filenamesbarricading;
    $_filenamesfirstaidbox =$_filenamesfirstaidbox;
    $_filenamesfireextinguisher =$_filenamesfireextinguisher;
    $_filenamestoolbox =$_filenamestoolbox;
    $_filenamesrubbishpoint =$_filenamesrubbishpoint;
    $_filenamesenergizer =$_filenamesenergizer;
    $_filenameselectricfence =$_filenameselectricfence;
    $_filenamesgroundingtower =$_filenamesgroundingtower;
    $_filenamescentralsite =$_filenamescentralsite ;
    $_filenamesteammembers  =$_filenamesteammembers  ;
	$userid  =$userid  ;
   

   

    $sql = "INSERT INTO project_details(siteid,date,sitename,sitegps ,carriername, towerheight,sector,typeofscope,message,jha,barricading,firstaidbox,
    fireextinguisher,toolbox,rubbishpoint,energizer,electricfence,groundingtower,centralsite,teammembers,userid)";
    $sql .= " VALUES('$siteid','$date','$sitename','$sitegps','$carriername','$towerheight', '$sector','$typeofscope','$message',
    '$_filenamesjob','$_filenamesbarricading','$_filenamesfirstaidbox','$_filenamesfireextinguisher','$_filenamestoolbox',
    '$_filenamesrubbishpoint','$_filenamesenergizer','$_filenameselectricfence','$_filenamesgroundingtower','$_filenamescentralsite','$_filenamesteammembers','$userid')";

    // query('SET NAMES utf8mb4');
    $result = query($sql);
    confirm($result);
    return true;
}





function validateEmail($sitename)
{
    // SET INITIAL RETURN VARIABLES

    $sitenameIsValid = FALSE;

    // MAKE SURE AN EMPTY STRING WASN'T PASSED

    if (!empty($sitename)) {
        // GET EMAIL PARTS

        $domain = ltrim(stristr($sitename, '@'), '@') . '.';
        $user   = stristr($sitename, '@', TRUE);

        // VALIDATE EMAIL ADDRESS

        if (
            !empty($user) &&
            !empty($domain) &&
            checkdnsrr($domain)
        ) {
            $sitenameIsValid = TRUE;
        }
    }

    // RETURN RESULT

    return $sitenameIsValid;
};

// Add leave request
if (isset($_POST['addrecord'])) {

    $siteid             = clean($_POST['siteid']);

    $sitename                  = clean(strtolower($_POST['sitename']));
    $sitegps             = clean($_POST['sitegps']);
    $carriername             = clean($_POST['carriername']);
    $towerheight           = clean($_POST['towerheight']);
    $sector       = clean($_POST['sector']);
    $message       = clean($_POST['message']);
    $date               = clean(strtolower($_POST['date']));
    $typeofscope               = clean(strtolower($_POST['typeofscope']));
	$userid               = clean($_POST['userid']);
 


    $min = 3;
    $max = 100;
    $maxmail = 100;
    $phone = 15;

	if (file_exists($_FILES['job']['tmp_name'][0])) {

		//job upload
		$job = $_FILES['job']['name'];
		//$upload="../uploads/".$attachs;
		define('SITE_ROOT', realpath(dirname(__FILE__)));
		//define("ROOT", __DIR__ ."/");
		$_job = array();
		$searcharray  = array(" ", "#");
		$replacearray = array("_", "_");
		for ($i = 0; $i < count($_FILES['job']['name']); $i++) {
		  $_job[] = str_replace($searcharray, $replacearray, $_FILES['job']['name'][$i]);
		  $job = str_replace($searcharray, $replacearray, $_FILES['job']['name'][$i]);
	
		  if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
			//echo 'This is a server using Windows!';
			//for windows server
			$target_dir = $rpath . "\uploads\\";
		  } else {
			//echo 'This is a server not using Windows!';
			//for linux or other server
			$target_dir = $rpath . "/uploads/";
		  }
		  $target_file = $target_dir . basename($_FILES["job"]["name"][$i]);
	
		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
		  // Valid file extensions
		  $extensions_arr = array("jpg", "jpeg", "png");
	
		  // Check extension
		  if (in_array($imageFileType, $extensions_arr)) {
			// Upload file
	
			move_uploaded_file($_FILES['job']['tmp_name'][$i],  $target_dir . str_replace($searcharray, $replacearray, $job));
		  } else {
			echo "Invalid file type";
		  }
		}
	
		$_filenamesjob = implode(', ', $_job);
		// var_dump($_filenamesjob);
	  }
      //


      if (file_exists($_FILES['barricading']['tmp_name'][0])) {

		//barricading upload
		$barricading = $_FILES['barricading']['name'];
		//$upload="../uploads/".$attachs;
		//define('SITE_ROOT', realpath(dirname(__FILE__)));
		//define("ROOT", __DIR__ ."/");
		$_barricading = array();
		$searcharray  = array(" ", "#");
		$replacearray = array("_", "_");
		for ($i = 0; $i < count($_FILES['barricading']['name']); $i++) {
		  $_barricading[] = str_replace($searcharray, $replacearray, $_FILES['barricading']['name'][$i]);
		  $barricading = str_replace($searcharray, $replacearray, $_FILES['barricading']['name'][$i]);
	
		  if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
			//echo 'This is a server using Windows!';
			//for windows server
			$target_dir = $rpath . "\uploads\\";
		  } else {
			//echo 'This is a server not using Windows!';
			//for linux or other server
			$target_dir = $rpath . "/uploads/";
		  }
		  $target_file = $target_dir . basename($_FILES["barricading"]["name"][$i]);
	
		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
		  // Valid file extensions
		  $extensions_arr = array("jpg", "jpeg", "png");
	
		  // Check extension
		  if (in_array($imageFileType, $extensions_arr)) {
			// Upload file
	
			move_uploaded_file($_FILES['barricading']['tmp_name'][$i],  $target_dir . str_replace($searcharray, $replacearray, $barricading));
		  } else {
			echo "Invalid file type";
		  }
		}
	
		$_filenamesbarricading = implode(', ', $_barricading);
		// var_dump($_filenamesbarricading);
	  }
      //


      if (file_exists($_FILES['firstaidbox']['tmp_name'][0])) {

		//firstaidbox upload
		$firstaidbox = $_FILES['firstaidbox']['name'];
		//$upload="../uploads/".$attachs;
		///define('SITE_ROOT', realpath(dirname(__FILE__)));
		//define("ROOT", __DIR__ ."/");
		$_firstaidbox = array();
		$searcharray  = array(" ", "#");
		$replacearray = array("_", "_");
		for ($i = 0; $i < count($_FILES['firstaidbox']['name']); $i++) {
		  $_firstaidbox[] = str_replace($searcharray, $replacearray, $_FILES['firstaidbox']['name'][$i]);
		  $firstaidbox = str_replace($searcharray, $replacearray, $_FILES['firstaidbox']['name'][$i]);
	
		  if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
			//echo 'This is a server using Windows!';
			//for windows server
			$target_dir = $rpath . "\uploads\\";
		  } else {
			//echo 'This is a server not using Windows!';
			//for linux or other server
			$target_dir = $rpath . "/uploads/";
		  }
		  $target_file = $target_dir . basename($_FILES["firstaidbox"]["name"][$i]);
	
		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
		  // Valid file extensions
		  $extensions_arr = array("jpg", "jpeg", "png");
	
		  // Check extension
		  if (in_array($imageFileType, $extensions_arr)) {
			// Upload file
	
			move_uploaded_file($_FILES['firstaidbox']['tmp_name'][$i],  $target_dir . str_replace($searcharray, $replacearray, $firstaidbox));
		  } else {
			echo "Invalid file type";
		  }
		}
	
		$_filenamesfirstaidbox = implode(', ', $_firstaidbox);
		// var_dump($_filenamesfirstaidbox);
	  }
      //

      if (file_exists($_FILES['fireextinguisher']['tmp_name'][0])) {

		//fireextinguisher upload
		$fireextinguisher = $_FILES['fireextinguisher']['name'];
		//$upload="../uploads/".$attachs;
		//define('SITE_ROOT', realpath(dirname(__FILE__)));
		//define("ROOT", __DIR__ ."/");
		$_fireextinguisher = array();
		$searcharray  = array(" ", "#");
		$replacearray = array("_", "_");
		for ($i = 0; $i < count($_FILES['fireextinguisher']['name']); $i++) {
		  $_fireextinguisher[] = str_replace($searcharray, $replacearray, $_FILES['fireextinguisher']['name'][$i]);
		  $fireextinguisher = str_replace($searcharray, $replacearray, $_FILES['fireextinguisher']['name'][$i]);
	
		  if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
			//echo 'This is a server using Windows!';
			//for windows server
			$target_dir = $rpath . "\uploads\\";
		  } else {
			//echo 'This is a server not using Windows!';
			//for linux or other server
			$target_dir = $rpath . "/uploads/";
		  }
		  $target_file = $target_dir . basename($_FILES["fireextinguisher"]["name"][$i]);
	
		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
		  // Valid file extensions
		  $extensions_arr = array("jpg", "jpeg", "png");
	
		  // Check extension
		  if (in_array($imageFileType, $extensions_arr)) {
			// Upload file
	
			move_uploaded_file($_FILES['fireextinguisher']['tmp_name'][$i],  $target_dir . str_replace($searcharray, $replacearray, $fireextinguisher));
		  } else {
			echo "Invalid file type";
		  }
		}
	
		$_filenamesfireextinguisher = implode(', ', $_fireextinguisher);
		// var_dump($_filenamesfireextinguisher);
	  }
      //

      if (file_exists($_FILES['toolbox']['tmp_name'][0])) {

		//toolbox upload
		$toolbox = $_FILES['toolbox']['name'];
		//$upload="../uploads/".$attachs;
		//define('SITE_ROOT', realpath(dirname(__FILE__)));
		//define("ROOT", __DIR__ ."/");
		$_toolbox = array();
		$searcharray  = array(" ", "#");
		$replacearray = array("_", "_");
		for ($i = 0; $i < count($_FILES['toolbox']['name']); $i++) {
		  $_toolbox[] = str_replace($searcharray, $replacearray, $_FILES['toolbox']['name'][$i]);
		  $toolbox = str_replace($searcharray, $replacearray, $_FILES['toolbox']['name'][$i]);
	
		  if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
			//echo 'This is a server using Windows!';
			//for windows server
			$target_dir = $rpath . "\uploads\\";
		  } else {
			//echo 'This is a server not using Windows!';
			//for linux or other server
			$target_dir = $rpath . "/uploads/";
		  }
		  $target_file = $target_dir . basename($_FILES["toolbox"]["name"][$i]);
	
		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
		  // Valid file extensions
		  $extensions_arr = array("jpg", "jpeg", "png");
	
		  // Check extension
		  if (in_array($imageFileType, $extensions_arr)) {
			// Upload file
	
			move_uploaded_file($_FILES['toolbox']['tmp_name'][$i],  $target_dir . str_replace($searcharray, $replacearray, $toolbox));
		  } else {
			echo "Invalid file type";
		  }
		}
	
		$_filenamestoolbox = implode(', ', $_toolbox);
		// var_dump($_filenamestoolbox);
	  }
      //

      if (file_exists($_FILES['rubbishpoint']['tmp_name'][0])) {

		//rubbishpoint upload
		$rubbishpoint = $_FILES['rubbishpoint']['name'];
		//$upload="../uploads/".$attachs;
		//define('SITE_ROOT', realpath(dirname(__FILE__)));
		//define("ROOT", __DIR__ ."/");
		$_rubbishpoint = array();
		$searcharray  = array(" ", "#");
		$replacearray = array("_", "_");
		for ($i = 0; $i < count($_FILES['rubbishpoint']['name']); $i++) {
		  $_rubbishpoint[] = str_replace($searcharray, $replacearray, $_FILES['rubbishpoint']['name'][$i]);
		  $rubbishpoint = str_replace($searcharray, $replacearray, $_FILES['rubbishpoint']['name'][$i]);
	
		  if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
			//echo 'This is a server using Windows!';
			//for windows server
			$target_dir = $rpath . "\uploads\\";
		  } else {
			//echo 'This is a server not using Windows!';
			//for linux or other server
			$target_dir = $rpath . "/uploads/";
		  }
		  $target_file = $target_dir . basename($_FILES["rubbishpoint"]["name"][$i]);
	
		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
		  // Valid file extensions
		  $extensions_arr = array("jpg", "jpeg", "png");
	
		  // Check extension
		  if (in_array($imageFileType, $extensions_arr)) {
			// Upload file
	
			move_uploaded_file($_FILES['rubbishpoint']['tmp_name'][$i],  $target_dir . str_replace($searcharray, $replacearray, $rubbishpoint));
		  } else {
			echo "Invalid file type";
		  }
		}
	
		$_filenamesrubbishpoint = implode(', ', $_rubbishpoint);
		// var_dump($_filenamesrubbishpoint);
	  }
      //

      if (file_exists($_FILES['energizer']['tmp_name'][0])) {

		//energizer upload
		$energizer = $_FILES['energizer']['name'];
		//$upload="../uploads/".$attachs;
		//define('SITE_ROOT', realpath(dirname(__FILE__)));
		//define("ROOT", __DIR__ ."/");
		$_energizer = array();
		$searcharray  = array(" ", "#");
		$replacearray = array("_", "_");
		for ($i = 0; $i < count($_FILES['energizer']['name']); $i++) {
		  $_energizer[] = str_replace($searcharray, $replacearray, $_FILES['energizer']['name'][$i]);
		  $energizer = str_replace($searcharray, $replacearray, $_FILES['energizer']['name'][$i]);
	
		  if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
			//echo 'This is a server using Windows!';
			//for windows server
			$target_dir = $rpath . "\uploads\\";
		  } else {
			//echo 'This is a server not using Windows!';
			//for linux or other server
			$target_dir = $rpath . "/uploads/";
		  }
		  $target_file = $target_dir . basename($_FILES["energizer"]["name"][$i]);
	
		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
		  // Valid file extensions
		  $extensions_arr = array("jpg", "jpeg", "png");
	
		  // Check extension
		  if (in_array($imageFileType, $extensions_arr)) {
			// Upload file
	
			move_uploaded_file($_FILES['energizer']['tmp_name'][$i],  $target_dir . str_replace($searcharray, $replacearray, $energizer));
		  } else {
			echo "Invalid file type";
		  }
		}
	
		$_filenamesenergizer = implode(', ', $_energizer);
		// var_dump($_filenamesenergizer);
	  }
      //

      if (file_exists($_FILES['electricfence']['tmp_name'][0])) {

		//electricfence upload
		$electricfence = $_FILES['electricfence']['name'];
		//$upload="../uploads/".$attachs;
		//define('SITE_ROOT', realpath(dirname(__FILE__)));
		//define("ROOT", __DIR__ ."/");
		$_electricfence = array();
		$searcharray  = array(" ", "#");
		$replacearray = array("_", "_");
		for ($i = 0; $i < count($_FILES['electricfence']['name']); $i++) {
		  $_electricfence[] = str_replace($searcharray, $replacearray, $_FILES['electricfence']['name'][$i]);
		  $electricfence = str_replace($searcharray, $replacearray, $_FILES['electricfence']['name'][$i]);
	
		  if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
			//echo 'This is a server using Windows!';
			//for windows server
			$target_dir = $rpath . "\uploads\\";
		  } else {
			//echo 'This is a server not using Windows!';
			//for linux or other server
			$target_dir = $rpath . "/uploads/";
		  }
		  $target_file = $target_dir . basename($_FILES["electricfence"]["name"][$i]);
	
		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
		  // Valid file extensions
		  $extensions_arr = array("jpg", "jpeg", "png");
	
		  // Check extension
		  if (in_array($imageFileType, $extensions_arr)) {
			// Upload file
	
			move_uploaded_file($_FILES['electricfence']['tmp_name'][$i],  $target_dir . str_replace($searcharray, $replacearray, $electricfence));
		  } else {
			echo "Invalid file type";
		  }
		}
	
		$_filenameselectricfence = implode(', ', $_electricfence);
		// var_dump($_filenameselectricfence);
	  }
      //

      if (file_exists($_FILES['groundingtower']['tmp_name'][0])) {

		//groundingtower upload
		$groundingtower = $_FILES['groundingtower']['name'];
		//$upload="../uploads/".$attachs;
		//define('SITE_ROOT', realpath(dirname(__FILE__)));
		//define("ROOT", __DIR__ ."/");
		$_groundingtower = array();
		$searcharray  = array(" ", "#");
		$replacearray = array("_", "_");
		for ($i = 0; $i < count($_FILES['groundingtower']['name']); $i++) {
		  $_groundingtower[] = str_replace($searcharray, $replacearray, $_FILES['groundingtower']['name'][$i]);
		  $groundingtower = str_replace($searcharray, $replacearray, $_FILES['groundingtower']['name'][$i]);
	
		  if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
			//echo 'This is a server using Windows!';
			//for windows server
			$target_dir = $rpath . "\uploads\\";
		  } else {
			//echo 'This is a server not using Windows!';
			//for linux or other server
			$target_dir = $rpath . "/uploads/";
		  }
		  $target_file = $target_dir . basename($_FILES["groundingtower"]["name"][$i]);
	
		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
		  // Valid file extensions
		  $extensions_arr = array("jpg", "jpeg", "png");
	
		  // Check extension
		  if (in_array($imageFileType, $extensions_arr)) {
			// Upload file
	
			move_uploaded_file($_FILES['groundingtower']['tmp_name'][$i],  $target_dir . str_replace($searcharray, $replacearray, $groundingtower));
		  } else {
			echo "Invalid file type";
		  }
		}
	
		$_filenamesgroundingtower = implode(', ', $_groundingtower);
		// var_dump($_filenamesgroundingtower);
	  }
      //

      if (file_exists($_FILES['centralsite']['tmp_name'][0])) {

		//centralsite upload
		$centralsite = $_FILES['centralsite']['name'];
		//$upload="../uploads/".$attachs;
		//define('SITE_ROOT', realpath(dirname(__FILE__)));
		//define("ROOT", __DIR__ ."/");
		$_centralsite = array();
		$searcharray  = array(" ", "#");
		$replacearray = array("_", "_");
		for ($i = 0; $i < count($_FILES['centralsite']['name']); $i++) {
		  $_centralsite[] = str_replace($searcharray, $replacearray, $_FILES['centralsite']['name'][$i]);
		  $centralsite = str_replace($searcharray, $replacearray, $_FILES['centralsite']['name'][$i]);
	
		  if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
			//echo 'This is a server using Windows!';
			//for windows server
			$target_dir = $rpath . "\uploads\\";
		  } else {
			//echo 'This is a server not using Windows!';
			//for linux or other server
			$target_dir = $rpath . "/uploads/";
		  }
		  $target_file = $target_dir . basename($_FILES["centralsite"]["name"][$i]);
	
		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
		  // Valid file extensions
		  $extensions_arr = array("jpg", "jpeg", "png");
	
		  // Check extension
		  if (in_array($imageFileType, $extensions_arr)) {
			// Upload file
	
			move_uploaded_file($_FILES['centralsite']['tmp_name'][$i],  $target_dir . str_replace($searcharray, $replacearray, $centralsite));
		  } else {
			echo "Invalid file type";
		  }
		}
	
		$_filenamescentralsite = implode(', ', $_centralsite);
		// var_dump($_filenamescentralsite);
	  }
      //

      if (file_exists($_FILES['teammembers']['tmp_name'][0])) {

		//teammembers upload
		$teammembers = $_FILES['teammembers']['name'];
		//$upload="../uploads/".$attachs;
		//define('SITE_ROOT', realpath(dirname(__FILE__)));
		//define("ROOT", __DIR__ ."/");
		$_teammembers = array();
		$searcharray  = array(" ", "#");
		$replacearray = array("_", "_");
		for ($i = 0; $i < count($_FILES['teammembers']['name']); $i++) {
		  $_teammembers[] = str_replace($searcharray, $replacearray, $_FILES['teammembers']['name'][$i]);
		  $teammembers = str_replace($searcharray, $replacearray, $_FILES['teammembers']['name'][$i]);
	
		  if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
			//echo 'This is a server using Windows!';
			//for windows server
			$target_dir = $rpath . "\uploads\\";
		  } else {
			//echo 'This is a server not using Windows!';
			//for linux or other server
			$target_dir = $rpath . "/uploads/";
		  }
		  $target_file = $target_dir . basename($_FILES["teammembers"]["name"][$i]);
	
		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
		  // Valid file extensions
		  $extensions_arr = array("jpg", "jpeg", "png");
	
		  // Check extension
		  if (in_array($imageFileType, $extensions_arr)) {
			// Upload file
	
			move_uploaded_file($_FILES['teammembers']['tmp_name'][$i],  $target_dir . str_replace($searcharray, $replacearray, $teammembers));
		  } else {
			echo "Invalid file type";
		  }
		}
	
		$_filenamesteammembers = implode(', ', $_teammembers);
		// var_dump($_filenamesteammembers);
	  }
      //



      



    if (empty($sitename)) {
        $errors['SiteName'] = 'Site Name required';
    }
    if (empty($sitegps )) {

        $errors[] = "Your sitegps cannot be empty";
    }


    if (count($errors) === 0) {
        // register  user in db
        if (project_details(
            $siteid,
            $date,
            $sitename,
            $sitegps,
            $carriername,
            $towerheight,
            $sector,
            $typeofscope,
            $message ,
            $_filenamesjob,
            $_filenamesbarricading,
            $_filenamesfirstaidbox,
            $_filenamesfireextinguisher,
            $_filenamestoolbox,
            $_filenamesrubbishpoint,
            $_filenamesenergizer,
		    $_filenameselectricfence,
            $_filenamesgroundingtower,
            $_filenamescentralsite,
            $_filenamesteammembers,
			$userid


            
            
        )) {

            set_message('<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                            <div class="text-white">
                            Leave request sent successfully.
                            Or click <a href="login.php">here to login</a>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>');

            redirect("main.php");
        } else {


            // set_message('<div class="alert alert-danger bg-danger border-0 alert-dismissible text-center fade show">
            // <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            // Sorry we could not register the user
            // </div>');
            set_message('<div class="alert alert-info border-0 bg-info alert-dismissible fade show">
                            <div class="text-white">
                                Sorry we could not register the user
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>');

            redirect("register.php");
        }



        //old register start
        /* $query = "INSERT INTO users SET username=?, email=?, password=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $username, $sitename, $password);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            //sendVerificationEmail($sitename, $token);

            $_SESSION['username'] = $username;
            $_SESSION['email'] = $sitename;
            $_SESSION['verified'] = false;
            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';
            redirect('index.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        } */ //old register end
    } else {
        foreach ($errors as $error) {

            echo validation_errors($error);
        }
    }
}

/* // LOGIN user using email or username 
if (isset($_POST['login-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                header('location: index.php');
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
} */

//multiauth login
$msg = [];

if (isset($_POST['login-submit'])) {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check if ip is pass from proxy
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $dtime = date("Y-m-d H:i:s");

    $username = strtolower($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT id,username,password,role,active,disabled,createdat FROM users WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['role'] == "admin" || $row['role'] == "client") {
        //session_start();
        session_regenerate_id();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['userid'] = $row['id'];
        $_SESSION['disabled'] = $row['disabled'];
        $_SESSION['active'] = $row['active'];
        // if ($row['createdat'] < '2022-03-02 20:00:00') {
        if ($row['createdat'] < '2022-12-12 20:00:00') {
            $_SESSION['active'] = 1;
        }
        session_write_close();
        //$msg[] = "Incorrect username or password";
    }


    $queryua = "INSERT INTO ua(username,role,ip,useragent,dtime)VALUES(?,?,?,?,?)";
    $stmtua = $conn->prepare($queryua);
    $stmtua->bind_param("sssss", $_SESSION['username'], $_SESSION['role'], $ip, $user_agent, $dtime);
    $stmtua->execute();

    if ($result->num_rows == 1 && $_SESSION['role'] == "client" && $_SESSION['disabled'] == 0 && $_SESSION['active'] == 1) {
        header("location:dashboard.php");
    } else if ($result->num_rows == 1 && $_SESSION['role'] == "client" && $_SESSION['disabled'] == 0 && $_SESSION['active'] == 0) {
        $msg[] = "Clink the link sent your email account to activate your account";
    } else if ($result->num_rows == 1 && $_SESSION['role'] == "admin" && $_SESSION['disabled'] == 0 && $_SESSION['active'] == 0) {
        header("location:dashboard_admin.php");
    } else if ($result->num_rows == 1 && $_SESSION['role'] == "admin" && $_SESSION['disabled'] == 0 && $_SESSION['active'] == 1) {
        header("location:dashboard_admin.php");
    } else if ($result->num_rows == 1 && $_SESSION['role'] == "client" && $_SESSION['disabled'] == 1 && $_SESSION['active'] == 0) {
        $msg[] = "Account Disabled Contact Administrator For Assistance";
    } else if ($result->num_rows == 1 && $_SESSION['role'] == "client" && $_SESSION['disabled'] == 1 && $_SESSION['active'] == 1) {
        $msg[] = "Account Disabled Contact Administrator For Assistance";
    } else {
        //validation_errors($msg);
        $msg[] = "Incorrect username or password";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verify']);
    header("location: login.php");
    exit(0);
}
