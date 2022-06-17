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
    <form method="post" 
    id="survey-form" class="form-label">
    <?php include('survey2.php'); ?>
    
    <div class="form-group">
            <label for="name" id="name-label"> Project name</label>
            <input
              type="text"
              id="projectname"
              class="form-control"
              placeholder="Enter  Project name"
              name="projectname"
              required
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
              required
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
              required
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
          required
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
          required>
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
        class="form-control" name="selectteamleader" required>
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
            required
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
            />Additional Scoop
          </label>
        </p>
      </div>
      <div class="form-group">
        <p>Add Team Members here...</p>
        <textarea
          name="teammembers"
          id="comment"
          cols="50"
          rows="6"
          placeholder="Add Team Members here..."    
          required
        ></textarea>
      </div>

      <div class="form-group">
        <button type="submit"
         id="submit"
         name="submit"
         >Submit</button>
      </div>
    </form>
  </div>