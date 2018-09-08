<?php
// Include config file
include "conn.php";
 
// Define variables and initialize with empty values
$username = $realname = $company = $title = $phone = $password = $confirm_password = "";
$username_err = $realname_err = $company_err = $title_err = $phone_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate Name
    if(empty(trim($_POST["realname"]))){
        $realname_err = "Please enter your Name.";     
    } elseif(strlen(trim($_POST["realname"])) < 2){
        $realname_err = "Name must have at least 2 characters.";
    } else{
        $realname = trim($_POST["realname"]);
    }

    // Validate company
    if(empty(trim($_POST["company"]))){
        $company_err = "Please enter your Company Name.";     
    } elseif(strlen(trim($_POST["company"])) < 2){
        $company_err = "Company Name must have at least 2 characters.";
    } else{
        $company = trim($_POST["company"]);
    }

     // Validate Title (title)
     if(empty(trim($_POST["title"]))){
        $titleerr = "Please enter your Title.";     
    } elseif(strlen(trim($_POST["title"])) < 2){
        $title_err = "Title must have at least 2 characters.";
    } else{
        $title = trim($_POST["title"]);
    }

     // Validate PHone
     if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter your phone.";     
    } elseif(strlen(trim($_POST["phone"])) < 2){
        $phone_err = "phone must have at least 2 characters.";
    } else{
        $phone = trim($_POST["phone"]);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($realname_err) && empty($username_err) && empty($company_err) && empty($title_err) && empty($phone_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (realname, username, company, title, phone, password) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_realname, $param_username, $param_company, $param_title, $param_phone, $param_password);
            
            // Set parameters
            $param_realname = $realname;
            $param_username = $username;
            $param_company = $company;
            $param_title = $title;
            $param_phone = $phone;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
        <div class="ks-logo">Luminus</div>

        <div class="card panel panel-default ks-light ks-panel ks-signup">
            <div class="card-block">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h4 class="ks-header">Sign Up</h4>
                    <div class="form-group <?php echo (!empty($realname_err)) ? 'has-error' : ''; ?>">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <input type="text" name="realname" class="form-control" placeholder="Name" value="<?php echo $realname; ?>">
                            <span style="color:red" class="help-block"><?php echo $realname_err; ?></span>
                    <span class="icon-addon">
                        <span class="la la-at"></span>
                    </span>
                        </div>
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <input type="email" name="username" class="form-control" placeholder="Email Address" value="<?php echo $username; ?>">
                            <span style="color:red" class="help-block"><?php echo $username_err; ?></span>
                    <span class="icon-addon">
                        <span class="la la-at"></span>
                    </span>
                        </div>
                    </div>
                    <div class="form-group <?php echo (!empty($company_err)) ? 'has-error' : ''; ?>">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <input type="text" name="company" class="form-control" placeholder="Company" value="<?php echo $company; ?>">
                            <span style="color:red" class="help-block"><?php echo $company_err; ?></span>
                    <span class="icon-addon">
                        <span class="la la-at"></span>
                    </span>
                        </div>
                    </div>
                    <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo $title; ?>">
                            <span style="color:red" class="help-block"><?php echo $title_err; ?></span>
                    <span class="icon-addon">
                        <span class="la la-at"></span>
                    </span>
                        </div>
                    </div>
                    <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <input type="phone" name="phone" class="form-control" placeholder="Phone #" value="<?php echo $phone; ?>">
                            <span style="color:red" class="help-block"><?php echo $phone_err; ?></span>
                    <span class="icon-addon">
                        <span class="la la-at"></span>
                    </span>
                        </div>
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Password">
                        <span class="icon-addon">
                            <span class="la la-key"></span>
                        </span>
                        </div>
                        <span style="color:red" class="help-block"><?php echo $password_err; ?></span>
                    </div>

                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <div class="input-icon icon-left icon-lg icon-color-primary">
                
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password">
                <span class="icon-addon">
                            <span class="la la-key"></span>
                        </span>
                </div>
                <span style="color:red" class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Submit">
                    </div>
                    <!-- <div class="ks-text-center">
                        <span class="text-muted">By clicking "Sign Up" I agree the </span> <a href="pages-signup.html">Terms Of Service</a>
                    </div> -->
                    <div class="ks-text-center">
                        Already have an account? <a href="login.php">Login</a>
                    </div>

                    <!-- <div class="ks-social">
                        <div class="pull-lg-left">or Log In with social</div>
                        <div class="pull-lg-right">
                            <a href="#" class="google la la-google"></a>
                        </div>
                    </div> -->
                </form>

            </div>
        </div>
    </div>
    <!-- <div class="ks-footer">
        <span class="ks-copyright">&copy; 2016 Kosmo</span>
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
</body>
</html>