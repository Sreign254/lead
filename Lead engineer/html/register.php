
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{   max-width: 500px;
            margin: auto;
            align-items: center;
            padding: 20px;
         padding: 20px;
         }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form method="post">
            <?php include ("logic.php"); ?>
            <div class="form-group">
                <label>Full name</label>
                <input type="text"
                 name="fullname"
                 class="form-control
                  <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" 
                  value="<?php echo $fullname; ?>">
                <span class="invalid-feedback"><?php echo $fullname_err; ?></span>
            </div>  
            
            <div class="form-group">
                <label>email</label>
                <input type="text"
                 name="email"
                 class="form-control
                  <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" 
                  value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name ="submit" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>