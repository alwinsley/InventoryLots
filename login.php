<?php
// Initialize the session

// Initialize the session
session_start();
 
ini_set('display_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Check if the user is already logged in, if yes then redirect him to welcome page

// Include config file
include "conn.php";
 
// Define variables and initialize with empty values
$username = $realname = $userImg = $usertype = $password = "";
$username_err = $realname_err = $userImg_err = $usertype_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }


    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err) && empty($realname_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, realname, userImg, usertype, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $realname, $userImg, $usertype, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username; 
                            $_SESSION["realname"] = $realname;
                            $_SESSION["userImg"] = $userImg;
                            $_SESSION["usertype"] = $usertype;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>Luminous</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/line-awesome/css/line-awesome.min.css">
    <!--<link rel="stylesheet" type="text/css" href="assets/fonts/open-sans/styles.css">-->

    <link rel="stylesheet" type="text/css" href="assets/fonts/montserrat/styles.css">

    <link rel="stylesheet" type="text/css" href="libs/tether/css/tether.min.css">
    <link rel="stylesheet" type="text/css" href="libs/jscrollpane/jquery.jscrollpane.css">
    <link rel="stylesheet" type="text/css" href="libs/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="libs/tether/css/tether.min.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/common.min.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/pages/auth.min.css">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/styles/themes/primary.min.css">
    <link class="ks-sidebar-dark-style" rel="stylesheet" type="text/css" href="assets/styles/themes/sidebar-black.min.css">
    <!-- END THEME STYLES -->

<link rel="stylesheet" type="text/css" href="libs/bootstrap-table/bootstrap-table.min.css"> <!-- Original -->
<link rel="stylesheet" type="text/css" href="assets/styles/libs/bootstrap-table/bootstrap-table.min.css"> <!-- Customization -->

<link rel="stylesheet" type="text/css" href="libs/prism/prism.css"> <!-- original -->
<link rel="stylesheet" type="text/css" href="libs/flatpickr/flatpickr.min.css"> <!-- original -->
<link rel="stylesheet" type="text/css" href="assets/styles/libs/flatpickr/flatpickr.min.css"> <!-- customization -->




<style>
   
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }

    .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
    </style>

</head>

<body>

<div class="ks-page">
   
    <div class="ks-page-content">
        <div class="ks-logo">Luminous</div>

        <div class="card panel panel-default ks-light ks-panel ks-login">
            <div class="card-block">


                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h4 class="ks-header">Login</h4>
                    <div class="form-group" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <input type="text" name="username" class="form-control" placeholder="Email Address" value="<?php echo $username; ?>">
                           
                            <span class="icon-addon">
                                <span class="la la-at"></span>
                            </span>
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                    </div>
                    <div class="form-group" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <input id="password-field" type="password" class="form-control" name="password" placeholder="Password">
                            
                            <span class="icon-addon">
                                <span class="la la-key"></span>
                            </span>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <input type="submit" class="btn btn-primary btn-block" value="Login">
                    </div>
                    <!-- <div class="ks-text-center">
                        Don't have an account. <a href="signup.php">Sign Up</a>
                    </div>
                    <div class="ks-text-center">
                        <a href="forgotPassword.php">Forgot your password?</a>
                    </div> -->

                    <!-- <div class="ks-social">
                        <div>or Log In with social</div>
                        <div>
                          
                            <a href="#" class="google la la-google"></a>
                        </div>
                    </div> -->


                </form>
            </div>
        </div>
    </div>
    <!-- <div class="ks-footer">
        <span class="ks-copyright">&copy; 2016 Brite Group Holdings</span>
        <ul>
            <li>
                <a href="#">Privacy Policy</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </div> -->
</div>

<script src="libs/jquery/jquery.min.js"></script>
<script src="libs/tether/js/tether.min.js"></script>
<script src="libs/bootstrap/js/bootstrap.min.js"></script>

<script>
$(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
</script>

</body>
</html>
