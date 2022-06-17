<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/survey.css">
    <script src="../js/survey.js"></script>
    <title>1</title>
</head>
<body>
    
</body>
</html>
<div class="container">
    <header class="text-center">
      <h1 id="title">Project Form</h1>
      <p id="description" class="description">
        <em>Thank you for taking the time to help us improve the platform</em>
      </p>
    </header>
    <?php include('db.php'); ?>

    <?php 
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
      
        $sql2 = "SELECT *
         FROM add_project WHERE id='$id'";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        while ($row2 = $result2->fetch_assoc()) {

      
          $projectname =$row2['projectname'];
          $siteid = $row2['siteid'];
          $sitename = $row2['sitename'];
          $sitegps = $row2['sitegps'];
          $typeofscoop = $row2['typeofscoop'];
          $selectteamleader = $row2['selectteamleader'];
          $dateofscoop = $row2['dateofscoop'];
          $additionalscoop = $row2['additionalscoop'];
          $teammembers = $row2['teammembers'];
          
        }
     
      }
    ?>
    <form 
    id="survey-form" class="form-label">
    <div class="form-group">
            <label for="name" id="name-label"> Project name</label>
            <input
              type="text"
              id="projectname"
              class="form-control"
            
              name="projectname"
              value="<?= $projectname; ?>"
              disabled
            />
          </div>
    
        <div class="form-group">
            <label for="name" id="name-label"> Site ID</label>
            <input
              type="text"
              id=" site ID"
              class="form-control"
              placeholder="Enter  Site ID"
              name="siteid"
              value="<?= $siteid; ?>"
              disabled
            />
          </div>

          <div class="form-group">
            <label for="name" id="name-label"> Site Name</label>
            <input
              type="text"
              id=" Site Name"
              class="form-control"
              placeholder="Enter  Site Name"
              name="sitename"
              value="<?= $sitename; ?>"
              disabled
            />
          </div>
          
    
    
      <div class="form-group">
        <label for="GPS" id="GPS-label">Site GPS</label>
        <input
          type="Site GPS"
          id="Site GPS"
          class="form-control"
          placeholder="Enter your Site GPS"
          name="sitegps"
          value="<?= $sitegps; ?>"
          disabled
        />
      </div>

     

      <div class="form-group">
        <label for="dropdown"
          >Type of Scoop</label
        >
        <select 
         id="dropdown" 
         class="form-control"
         name="typeofscoop"
          disabled>
          <option>Select Scoop</option>
          <option value="Swap">Swap</option>
          <option value="cutover">cut over</option>
          <option value="Installation">Installation</option>
          
          <option value="Other">Other</option>
        </select>
      </div>

      <div class="form-group">
        <label for="dropdown"
          >Team Leader</label
        >
        <select  id="dropdown" 
        class="form-control" name="selectteamleader" disabled>
          <option>Select Team Leader</option>
          <option value="Jesse">Jesse</option>
          <option value="jackso">jackso</option>
          <option value="Mike">Mike</option>
          
          <option value="Other">Other</option>
        </select>
      </div>


      <div class="form-group">
        <p>Date of Scoop</p>
        <p>
          <label>
            <input
            
            type="date"
            id="date"
            class="form-control"
            placeholder="Enter scoop date"
            name="dateofscoop"
            value="<?= $sitedateofscoop; ?>"
            disabled
          />
          </label>
        </p>
        <p>
       
        
      
        </p>
        <p>
          <label>
            <input
              type="checkbox"
              name="additionalscoop"       
              value="<?= $additionalscoop; ?>"       
            />Additional Scoop
          </label>
        </p>
      </div>
      <div class="form-group">
        <p>Add Team Members here...</p>
        <textarea
          name="teammembers"
          value=""
          id="comment"
          cols="50"
          rows="6"
          placeholder="Add Team Members here..." 
          value="<?= $teammembers; ?>"   
          disabled
        ></textarea>
      </div>

    </form>
  </div>