<?php
session_start();
// Include config file
include 'conn.php';


 
// Define variables and initialize with empty values
$lotstatus = $streetnumber = $streetname = $city = $parcelid = $citywater = $citysewer = $listprice = $purchaseprice = $counteroffer = $mls = $seller = $offersubmitteddate = $contractsigneddate = $escrowdue = $escrowsubmitted = $vetted = $feasibilitydays = $feasibilityduedate = $closingdate = $notes  = "";
$lotstatus_err = $streetnumber_err = $streetname_err = $city_err = $parcelid_err = $citywater_err = $citysewer_err = $listpriceerr = $purchaseprice_err = $counteroffer_err = $mls_err = $seller_err = $offersubmitteddate_err = $contractsigneddate_err = $escrowdue_err = $escrowsubmitted_err = $vetted_err = $feasibilitydays_err = $feasibilityduedate_err = $closingdate_err = $notes_err  = "";


    
if(isset($_FILES) & !empty($_FILES)){
  $surveyname = $_FILES['survey']['name'];
  $surveysize = $_FILES['survey']['size'];
  $surveytype = $_FILES['survey']['type'];
  $surveytmp_name = $_FILES['survey']['tmp_name'];
 
}
  $surveylocation = "uploads/";
  $maxsize = 10000000;
  


// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    
   
    // Validate salary
    // $input_salary = trim($_POST["salary"]);
    // if(empty($input_salary)){
    //     $salary_err = "Please enter the salary amount.";     
    // } elseif(!ctype_digit($input_salary)){
    //     $salary_err = "Please enter a positive integer value.";
    // } else{
    //     $salary = $input_salary;
    // }
    
    // Check input errors before inserting in database
    if(empty($lotstatus_err) && empty($streetnumber_err) && empty($streetname_err)){
      if(isset($surveyname) || empty($surveyname)){
        if(move_uploaded_file($surveytmp_name, $surveylocation.$surveyname)){
        // Prepare an update statement
        $sql = "UPDATE lottable SET surveyname=?, surveysize=?, surveytype=?, surveylocation=? WHERE id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_surveyname, $param_surveysize, $param_surveytype, $param_surveylocation, $param_id);
            
            // Set parameters
            $param_surveyname = $surveyname;
            $param_surveysize = $surveysize;
            $param_surveytype = $surveytype;
            $param_surveylocation = $surveylocation;
            $param_id = $id;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);

    
      }
    }
    }
    
    
    // Close connection
    mysqli_close($conn);

} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM lottable WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                   
                    $surveyname = $row["surveyname"];
                    $surveysize = $row["surveysize"];
                    $surveytype = $row["surveytype"];
                    $surveylocation = $row["surveylocation"];
                    
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);

    

        
        // Close connection
        mysqli_close($conn);

    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>



<!-- BEGIN HEAD -->
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
        background-color:white;
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

.unit { position: absolute; display: block; left: 5px; top: 10px; z-index: 9; padding-right:5px;}

    </style>

</head>
<!-- END HEAD -->

<body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> <!-- remove ks-page-header-fixed to unfix header -->

    <!-- BEGIN HEADER -->
<nav class="navbar ks-navbar">
    <!-- BEGIN HEADER INNER -->
    <!-- BEGIN LOGO -->
    <div href="index.html" class="navbar-brand">
        <!-- BEGIN RESPONSIVE SIDEBAR TOGGLER -->
        <a href="#" class="ks-sidebar-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
        <a href="#" class="ks-sidebar-mobile-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
        <!-- END RESPONSIVE SIDEBAR TOGGLER -->

        <div class="ks-navbar-logo">
            <a href="index.php" class="ks-logo">Luminous</a>

            
            

            <!-- END GRID NAVIGATION -->
        </div>
    </div>
    <!-- END LOGO -->

    <!-- BEGIN MENUS -->
    <div class="ks-wrapper">
        <nav class="nav navbar-nav">
            <!-- BEGIN NAVBAR MENU -->
            <div class="ks-navbar-menu">
            <div class="col-lg-12"> 

          <div class="input-icon icon-right icon icon-lg icon-color-primary" >
                            <input id="search" name="valueToSearch" type="text" class="form-control" placeholder="Search Street Name..." style="width:300px">
                            <span class="icon-addon">
                                <span class="la la-search ks-icon"></span>
                            </span>
                            
            </div>
            <!-- <div class="nav-item nav-link ks-btn-action" style="border:none;">
                    <input type="button" name="search" class="btn btn-info" value="Search">
                </div> -->

                <div style="position:absolute;background:white;width:95%;" class="" id="display"></div>
                </div>
      



                 <!-- <a class="nav-item nav-link" href="#">Dashboard</a> -->
                <!-- <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu ks-info" aria-labelledby="Preview">
                        <a class="dropdown-item ks-active" href="#">Dropdown Link 1</a>
                        <a class="dropdown-item" href="#">Dropdown Link 2</a>
                        <a class="dropdown-item" href="#">Dropdown Link 3</a>
                        <div class="dropdown-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="Preview">
                                <a class="dropdown-item" href="#">Dropdown Link 1</a>
                                <a class="dropdown-item" href="#">Dropdown Link 2</a>
                                <a class="dropdown-item" href="#">Dropdown Link 3</a>
                            </div>
                        </div>
                    </div>
                </div>  -->
                
            </div>
            <!-- END NAVBAR MENU -->

            <!-- BEGIN NAVBAR ACTIONS -->
            <div class="ks-navbar-actions">
                <!-- BEGIN NAVBAR ACTION BUTTON -->
                <!-- <div class="nav-item nav-link btn-action-block">
                    <a class="btn btn-danger" href="#">
                        <span class="ks-action">Activate Your Account</span>
                       
                    </a>
                </div> -->
                <!-- END NAVBAR ACTION BUTTON -->


                <!-- BEGIN NAVBAR NOTIFICATIONS -->
                <!-- <div class="nav-item dropdown ks-notifications">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="la la-bell ks-icon" aria-hidden="true">
                            <span class="badge badge-pill badge-info">7</span>
                        </span>
                        <span class="ks-text">Notifications</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">
                        
                        <div class="tab-content">
                            <div class="tab-pane ks-notifications-tab active" id="navbar-notifications-all" role="tabpanel">
                                <div class="ks-wrapper ks-scrollable">
                                    <a href="#" class="ks-notification">
                                        <div class="ks-avatar">
                                            <img src="assets/img/avatars/avatar-3.jpg" width="36" height="36">
                                        </div>
                                        <div class="ks-info">
                                            <div class="ks-user-name">Emily Carter <span class="ks-description">has uploaded 1 file</span></div>
                                            <div class="ks-text"><span class="la la-file-text-o ks-icon"></span> logo vector doc</div>
                                            <div class="ks-datetime">1 minute ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="ks-notification">
                                        <div class="ks-action">
                                            <span class="ks-default">
                                                <span class="la la-briefcase ks-icon"></span>
                                            </span>
                                        </div>
                                        <div class="ks-info">
                                            <div class="ks-user-name">New project created</div>
                                            <div class="ks-text">Dashboard UI</div>
                                            <div class="ks-datetime">1 minute ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="ks-notification">
                                        <div class="ks-action">
                                            <span class="ks-error">
                                                <span class="la la-times-circle ks-icon"></span>
                                            </span>
                                        </div>
                                        <div class="ks-info">
                                            <div class="ks-user-name">File upload error</div>
                                            <div class="ks-text"><span class="la la-file-text-o ks-icon"></span> logo vector doc</div>
                                            <div class="ks-datetime">10 minutes ago</div>
                                        </div>
                                    </a>
                                </div>

                                <div class="ks-view-all">
                                    <a href="#">Show more</a>
                                </div>
                            </div>
                            <div class="tab-pane ks-empty" id="navbar-notifications-activity" role="tabpanel">
                                There are no activities.
                            </div>
                            <div class="tab-pane ks-empty" id="navbar-notifications-comments" role="tabpanel">
                                There are no comments.
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- END NAVBAR NOTIFICATIONS -->

                <!-- BEGIN NAVBAR USER -->


                
                
                <div class="nav-item dropdown ks-user">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="ks-avatar">
                  
                        </span>
                        <span class="ks-info">
                            <span class="ks-name"></span>     
                            <?php echo $_SESSION['realname']; ?>                      
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">
                        <!-- <a class="dropdown-item" href="profile.php?$record['id']">
                            <span class="la la-user ks-icon"></span>
                            <span>Profile</span>
                        </a> -->
                        <a class="dropdown-item" href="logout.php">
                            <span class="la la-sign-out ks-icon" aria-hidden="true"></span>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
                <!-- END NAVBAR USER -->
            </div>
            <!-- END NAVBAR ACTIONS -->
        </nav>

        <!-- BEGIN NAVBAR ACTIONS TOGGLER -->
        <nav class="nav navbar-nav ks-navbar-actions-toggle">
            <a class="nav-item nav-link" href="#">
                <span class="la la-ellipsis-h ks-icon ks-open"></span>
                <span class="la la-close ks-icon ks-close"></span>
            </a>
        </nav>
        <!-- END NAVBAR ACTIONS TOGGLER -->

        <!-- BEGIN NAVBAR MENU TOGGLER -->
        <nav class="nav navbar-nav ks-navbar-menu-toggle">
            <a class="nav-item nav-link" href="#">
                <span class="la la-th ks-icon ks-open"></span>
                <span class="la la-close ks-icon ks-close"></span>
            </a>
        </nav>
        <!-- END NAVBAR MENU TOGGLER -->
    </div>
    <!-- END MENUS -->
    <!-- END HEADER INNER -->
</nav>
<!-- END HEADER -->



<div class="ks-page-container">
    
<!-- BEGIN DEFAULT SIDEBAR -->
<?php include 'partials/sidebar.php' ?>
<!-- END DEFAULT SIDEBAR -->


<div class="ks-column ks-page">
        <div class="ks-page-header">
            <section class="ks-title">
                <h3>Edit <?php echo $surveyname; ?></h3>
            </section>
        </div>

        <div class="ks-page-content">
            <div class="ks-page-content-body ks-content-nav">
                <div class="ks-nav-body">
                    <div class="ks-nav-body-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                

                 <div class="col-lg-6 ks-panels-column-section mb-3">
                    <div class="page-header">
                        
                    </div>
                    <!-- <p style="color:red">*Note: All fields must be completed. Put "NA" if not answered.</p> -->

                    
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
		    <label for="survey">Survey: </label>
		    <input type="file" name="survey" id="survey">
		   
		  </div>


                                        <div class="modal-footer">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                                        </div>
                      
                    </form>
                    <?php

// show survey if there is one.
      if( $surveyname == null){
        echo "<div class='form-group row' style='border-bottom:1px solid #f3f3f3'>
        <div class='col-lg-12'>
        <label style='color:#999999'>Survey</label>
        <br>
          No survey Found. 
        </div>
        </div> ";
      }else {
                echo "         <div class='form-group row' style='border-bottom:1px solid #f3f3f3'>
                            <div class='col-lg-12'>
                              <label style='color:#999999'>Survey</label>
                              <table class='table'>
          <tr>
      
            <th>Name</th>
            <th>Size</th>
            <th>Edit</th> 
          </tr>
          <tr>
            <td id='surveyFile'><a target='_blank' href='$surveylocation$surveyname'><span style='font-size:18px' class='la la-search ks-icon'> </span> $surveyname</td>
            <td> $surveysize </td>
             <td><a href='updateSurvey.php?id=$id'>Edit</a></td> 
          </tr>
        </table>
                          </div>
                          </div> ";
      }
                        ?>
                   
                </div>
            
                
                </div> <!-- end row -->
                        </div> <!-- end container-fluid -->
                    </div> <!-- end ks-nav-body-wrapper -->
                </div> <!-- end ks-nav-body -->
            </div> <!-- end ks-page-content-body -->
        </div> <!-- end ks-page-content -->
    </div> <!-- end ks-column ks-page -->
</div> <!-- end ks-page-container -->



<?php include 'partials/footer.php'; ?>