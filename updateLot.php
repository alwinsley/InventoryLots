<?php
session_start();
// Include config file
include 'conn.php';

$usertype = $_SESSION['usertype'];

// Check user type
if($usertype !== "admin"){
    header("location: index.php");
    exit;
}




 
// Define variables and initialize with empty values
$lotstatus = $streetnumber = $streetname = $lotnumber = $lotsize = $lotcost = $modelselection = $permitstatus = $ownedby = $propertyappraiser = $city = $parcelid = $floodzone = $well = $septic = $streetpower = $citywater = $citysewer = $listprice = $purchaseprice = $counteroffer = $mls = $seller = $offersubmitteddate = $contractsigneddate = $escrowdue = $escrowsubmitted = $vetted = $feasibilitydays = $feasibilityduedate = $closingdate = $notes = $availabledate = $permittingnotes = $salesnotes = "";
$lotstatus_err = $streetnumber_err = $streetname_err = $lotnumber_err = $lotsize_err = $lotcost_err = $modelselection_err = $permitstatus_err = $ownedby_err = $propertyappraiser_err = $city_err = $parcelid_err = $floodzone_err = $well_err = $septic_err = $streetpower_err = $citywater_err = $citysewer_err = $listprice_err = $purchaseprice_err = $counteroffer_err = $mls_err = $seller_err = $offersubmitteddate_err = $contractsigneddate_err = $escrowdue_err = $escrowsubmitted_err = $vetted_err = $feasibilitydays_err = $feasibilityduedate_err = $closingdate_err = $notes_err = $availabledate_err = $permittingnotes_err = $salesnotes_err = "";


    


// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    
    // Validate lotstatus
    $input_lotstatus = trim($_POST["lotstatus"]);
    if(empty($input_lotstatus)){
        $lotstatus_err = "Please enter a Lot status.";
    } elseif(!filter_var($input_lotstatus, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lotstatus_err = "Please enter a valid Lot status.";
    } else{
        $lotstatus = $input_lotstatus;
    }
    
    // Validate address streetnumber
    $input_streetnumber = trim($_POST["streetnumber"]);
    if(empty($input_streetnumber)){
        $streetnumber_err = "Please enter an street number.";     
    } else{
        $streetnumber = $input_streetnumber;
    }


     // Validate address streetname
     $input_streetname = trim($_POST["streetname"]);
     if(empty($input_streetname)){
         $streetname_err = "Please enter an street name.";     
     } else{
         $streetname = $input_streetname;
     }

     // Validate lotnumber
    $input_lotnumber = trim($_POST["lotnumber"]);
    if(empty($input_lotnumber)){
        $lotnumber_err = "Please enter an lot number.";     
    } else{
        $lotnumber = $input_lotnumber;
    }

    // Validate modelselection
    $input_modelselection = trim($_POST["modelselection"]);
    if(empty($input_modelselection)){
        $modelselection_err = "Please enter an model selection.";     
    } else{
        $modelselection = $input_modelselection;
    }

    // Validate permit status
    $input_permitstatus = trim($_POST["permitstatus"]);
    if(empty($input_permitstatus)){
        $permitstatus_err = "Please enter an permit status.";     
    } else{
        $permitstatus = $input_permitstatus;
    }

    // Validate owned by
    $input_ownedby = trim($_POST["ownedby"]);
    if(empty($input_ownedby)){
        $ownedby_err = "Please enter an owned by.";     
    } else{
        $ownedby = $input_ownedby;
    }

    // Validate propertyappraiser
    $input_propertyappraiser = trim($_POST["propertyappraiser"]);
    if(empty($input_propertyappraiser)){
        $propertyappraiser_err = "Please enter an property appraiser.";     
    } else{
        $propertyappraiser = $input_propertyappraiser;
    }

    // Validate flood zone
    $input_floodzone = trim($_POST["floodzone"]);
    if(empty($input_floodzone)){
        $floodzone_err = "Please enter an flood zone.";     
    } else{
        $floodzone = $input_floodzone;
    }

    // Validate well
    $input_well = trim($_POST["well"]);
    if(empty($input_well)){
        $well_err = "Please enter an well.";     
    } else{
        $well = $input_well;
    }

    // Validate septic
    $input_septic = trim($_POST["septic"]);
    if(empty($input_septic)){
        $septic_err = "Please enter an septic.";     
    } else{
        $septic = $input_septic;
    }

     // Validate streetpower
     $input_streetpower = trim($_POST["streetpower"]);
     if(empty($input_streetpower)){
         $streetpower_err = "Please enter an street power.";     
     } else{
         $streetpower = $input_streetpower;
     }

     // Validate Lot size
     $input_lotsize = trim($_POST["lotsize"]);
     if(empty($input_lotsize)){
         $lotsize_err = "Please enter an Lot size.";     
     } else{
         $lotsize = $input_lotsize;
     }

     // Validate Lot cost
     $input_lotcost = trim($_POST["lotcost"]);
     if(empty($input_lotcost)){
         $lotcost_err = "Please enter an lot cost.";     
     } else{
         $lotcost = $input_lotcost;
     }


       // Validate address city
       $input_city = trim($_POST["city"]);
       if(empty($input_city)){
           $city_err = "Please enter city.";     
       } else{
           $city = $input_city;
       }
      
    


       // citywater
    $input_citywater = trim($_POST["citywater"]);
    if(empty($input_citywater)){
        $citywater_err = "Please enter city water.";     
    } else{
        $citywater = $input_citywater;
    }

    // citysewer
    $input_citysewer = trim($_POST["citysewer"]);
    if(empty($input_citysewer)){
        $citysewer_err = "Please enter city sewer.";     
    } else{
        $citysewer = $input_citysewer;
    }


    // parcelid
    $input_parcelid = trim($_POST["parcelid"]);
    if(empty($input_parcelid)){
        $parcelid_err = "Please enter parcel id.";     
    } else{
        $parcelid = $input_parcelid;
    }


     // listprice
     $input_listprice = trim($_POST["listprice"]);
     if(empty($input_listprice)){
         $listprice_err = "Please enter list price.";     
     } else{
         $listprice = $input_listprice;
     }

      // purchaseprice
    $input_purchaseprice = trim($_POST["purchaseprice"]);
    if(empty($input_purchaseprice)){
        $purchaseprice_err = "Please enter purchase price.";     
    } else{
        $purchaseprice = $input_purchaseprice;
    }
     // counteroffer
     $input_counteroffer = trim($_POST["counteroffer"]);
     if(empty($input_counteroffer)){
         $counteroffer_err = "Please enter counter offer.";     
     } else{
         $counteroffer = $input_counteroffer;
     }

      // mls
    $input_mls = trim($_POST["mls"]);
    if(empty($input_mls)){
        $mls_err = "Please enter mls.";     
    } else{
        $mls = $input_mls;
    }

     // seller
     $input_seller = trim($_POST["seller"]);
     if(empty($input_seller)){
         $seller_err = "Please enter seller.";     
     } else{
         $seller = $input_seller;
     }

      // offersubmitteddate
    $input_offersubmitteddate = trim($_POST["offersubmitteddate"]);
    if(empty($input_offersubmitteddate)){
        $offersubmitteddate_err = "Please enter offer submitted date.";     
    } else{
        $offersubmitteddate = $input_offersubmitteddate;
    }

     // contractsigneddate
     $input_contractsigneddate = trim($_POST["contractsigneddate"]);
     if(empty($input_contractsigneddate)){
         $contractsigneddate_err = "Please enter contract signed date.";     
     } else{
         $contractsigneddate = $input_contractsigneddate;
     }

      // escrowdue
    $input_escrowdue = trim($_POST["escrowdue"]);
    if(empty($input_escrowdue)){
        $escrowdue_err = "Please enter escrowdue.";     
    } else{
        $escrowdue = $input_escrowdue;
    }

     // escrowsubmitted
     $input_escrowsubmitted = trim($_POST["escrowsubmitted"]);
     if(empty($input_escrowsubmitted)){
         $escrowsubmitted_err = "Please enter escrow submitted.";     
     } else{
         $escrowsubmitted = $input_escrowsubmitted;
     }

      // vetted
    $input_vetted = trim($_POST["vetted"]);
    if(empty($input_vetted)){
        $vetted_err = "Please enter vetted.";     
    } else{
        $vetted = $input_vetted;
    }

     // feasibilitydays
     $input_feasibilitydays = trim($_POST["feasibilitydays"]);
     if(empty($input_feasibilitydays)){
         $feasibilitydays_err = "Please enter feasibility days.";     
     } else{
         $feasibilitydays = $input_feasibilitydays;
     }

     // feasibilityduedate
     $input_feasibilityduedate = trim($_POST["feasibilityduedate"]);
     if(empty($input_feasibilityduedate)){
         $feasibilityduedate_err = "Please enter feasibility due date.";     
     } else{
         $feasibilityduedate = $input_feasibilityduedate;
     }


    
    //closing date
    $input_closingdate = trim($_POST["closingdate"]);
    if(empty($input_closingdate)){
        $closingdate_err = "Please enter closing date.";     
    } else{
        $closingdate = $input_closingdate;
    }

    //notes
    $input_notes = trim($_POST["notes"]);
    if(empty($input_notes)){
        $notes_err = "Please enter notes.";     
    } else{
        $notes = $input_notes;
    }


    //available date
    $input_availabledate = trim($_POST["availabledate"]);
    if(empty($input_availabledate)){
        $availabledate_err = "Please enter available date.";     
    } else{
        $availabledate = $input_availabledate;
    }

    //permitting notes
    $input_permittingnotes = trim($_POST["permittingnotes"]);
    if(empty($input_permittingnotes)){
        $permittingnotes_err = "Please enter permitting notes.";     
    } else{
        $permittingnotes = $input_permittingnotes;
    }

    //sales notes
    $input_salesnotes = trim($_POST["salesnotes"]);
    if(empty($input_salesnotes)){
        $salesnotes_err = "Please enter sales notes.";     
    } else{
        $salesnotes = $input_salesnotes;
    }

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
    if(empty($city_err)){
           
        // Prepare an update statement
        $sql = "UPDATE lottable SET lotstatus=?, streetnumber=?, streetname=?, city=?, lotnumber=?, lotsize=?, lotcost=?, modelselection=?, permitstatus=?, ownedby=?, parcelid=?, floodzone=?, well=?, septic=?, streetpower=?, citywater=?, citysewer=?, propertyappraiser=?, listprice=?, purchaseprice=?, counteroffer=?, mls=?, seller=?, offersubmitteddate=?, contractsigneddate=?, escrowdue=?, escrowsubmitted=?, vetted=?, feasibilitydays=?, feasibilityduedate=?, closingdate=?, notes=?, availabledate=?, permittingnotes=?, salesnotes=? WHERE id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssssssssssi", $param_lotstatus, $param_streetnumber, $param_streetname, $param_city, $param_lotnumber, $param_lotsize, $param_lotcost, $param_modelselection, $param_permitstatus, $param_ownedby, $param_parcelid, $param_floodzone, $param_well, $param_septic, $param_streetpower, $param_citywater, $param_citysewer, $param_propertyappraiser, $param_listprice, $param_purchaseprice, $param_counteroffer, $param_mls, $param_seller, $param_offersubmitteddate, $param_contractsigneddate, $param_escrowdue, $param_escrowsubmitted, $param_vetted, $param_feasibilitydays, $param_feasibilityduedate, $param_closingdate, $param_notes, $param_availabledate, $param_permittingnotes, $param_salesnotes, $param_id);
            
            // Set parameters
            $param_lotstatus = $lotstatus;
            $param_streetnumber = $streetnumber;
            $param_streetname = $streetname;
            $param_city = $city;
            $param_lotnumber = $lotnumber;
            $param_lotsize = $lotsize;
            $param_lotcost = $lotcost;
            $param_modelselection = $modelselection;
            $param_permitstatus = $permitstatus;
            $param_ownedby = $ownedby;
            $param_parcelid = $parcelid;
            $param_floodzone = $floodzone;
            $param_well = $well;
            $param_septic = $septic;
            $param_streetpower = $streetpower;
            $param_citywater = $citywater;
            $param_citysewer = $citysewer;
            $param_propertyappraiser = $propertyappraiser;
            $param_listprice = $listprice;
            $param_purchaseprice = $purchaseprice;
            $param_counteroffer = $counteroffer;
            $param_mls = $mls;
            $param_seller = $seller;
            $param_offersubmitteddate = $offersubmitteddate;
            $param_contractsigneddate = $contractsigneddate;
            $param_escrowdue = $escrowdue;
            $param_escrowsubmitted = $escrowsubmitted;
            $param_vetted = $vetted;
            $param_feasibilitydays= $feasibilitydays;
            $param_feasibilityduedate = $feasibilityduedate;
            $param_closingdate = $closingdate;
            $param_notes = $notes;
            $param_availabledate = $availabledate;
            $param_permittingnotes = $permittingnotes;
            $param_salesnotes = $salesnotes;
            $param_surveyname = $surveyname;
            $param_surveysize = $surveysize;
            $param_surveytype = $surveytype;
            $param_surveylocation = $surveylocation;
            $param_createdBy = $createdBy;
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
                    $lotstatus = $row["lotstatus"];
                    $streetnumber = $row["streetnumber"];
                    $streetname = $row["streetname"];
                    $city = $row["city"];
                    $lotnumber = $row["lotnumber"];
                    $lotsize = $row["lotsize"];
                    $lotcost = $row["lotcost"];
                    $modelselection = $row["modelselection"];
                    $permitstatus = $row["permitstatus"];
                    $ownedby = $row["ownedby"];
                    $parcelid = $row["parcelid"];
                    $floodzone = $row["floodzone"];
                    $well = $row["well"];
                    $septic = $row["septic"];
                    $streetpower = $row["streetpower"];
                    $citywater = $row["citywater"];
                    $citysewer = $row["citysewer"];
                    $propertyappraiser = $row["propertyappraiser"];
                    $listprice = $row["listprice"];
                    $purchaseprice = $row["purchaseprice"];
                    $counteroffer = $row["counteroffer"];
                    $mls = $row["mls"];
                    $seller = $row["seller"];
                    $offersubmitteddate = $row["offersubmitteddate"];
                    $contractsigneddate = $row["contractsigneddate"];
                    $escrowdue = $row["escrowdue"];
                    $escrowsubmitted = $row["escrowsubmitted"];
                    $vetted = $row["vetted"];
                    $feasibilitydays = $row["feasibilitydays"];
                    $feasibilityduedate = $row["feasibilityduedate"];
                    $closingdate = $row["closingdate"];
                    $notes = $row["notes"];
                    $availabledate = $row["availabledate"];
                    $permittingnotes = $row["permittingnotes"];
                    $salesnotes = $row["salesnotes"];
                    $surveyname = $row["surveyname"];
                    $surveysize = $row["surveysize"];
                    $surveytype = $row["surveytype"];
                    $surveylocation = $row["surveylocation"];

                   
                    // send email on lotstatus change

if(isset($_POST["lotstatus"]) && !empty($_POST["lotstatus"])){ 
    $lotstatusPost = $_POST['lotstatus']; 
    $lotstatus = $row['lotstatus'];
    $streetnumber = $row['streetnumber'];
    $streetname = $row['streetname'];

    if($lotstatus != $lotstatusPost) {
        $email='al@britedigitalexperts.com';
        $subject = "Lot Status Change";
        $message =$streetnumber. ' '. $streetname. ' '. 'Lot Status has changed from'.' '. $lotstatus. ' '. 'to'.' '. $lotstatusPost;
        $headers = "From: Luminous"; 
        
        mail($email, $subject, $message, $headers); 
            //mail successfully sent
        
    }
}
             
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
                <h3>Edit <?php echo $streetnumber; ?> <?php echo $streetname; ?></h3>
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
                    <div class="form-group row <?php echo (!empty($lotstatus_err)) ? 'has-error' : ''; ?>">
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Status</label>
                                                <select class="form-control" value="<?php echo $lotstatus; ?>" id="lotstatus" name="lotstatus">
                                                <option value="Executed">Executed</option>
                                                        <option value="Not Interested" <?php if($row["lotstatus"]=='Not Interested'){ echo "selected";} ?>>Not Interested</option>
                                                        <option value="Hold" <?php if($row["lotstatus"]=='Hold'){ echo "selected";} ?>>Hold</option>
                                                        <option value="Title Ordered" <?php if($row["lotstatus"]=='Title Ordered'){ echo "selected";} ?>>Title Ordered</option>
                                                        <option value="Vetting" <?php if($row["lotstatus"]=='Vetting'){ echo "selected";} ?>>Vetting</option>
                                                        <option value="Survey Ordered" <?php if($row["lotstatus"]=='Survey Ordered'){ echo "selected";} ?>>Survey Ordered</option>
                                                        <option value="Lean Search Ordered" <?php if($row["lotstatus"]=='Lean Search Ordered'){ echo "selected";} ?>>Lean Search Ordered</option>
                                                        <option value="Clear to Closed" <?php if($row["lotstatus"]=='Clear to Closed'){ echo "selected";} ?>>Clear to Closed</option>
                                                        <option value="Closed" <?php if($row["lotstatus"]=='Closed'){ echo "selected";} ?>>Closed</option>
                                                </select>
                                                <span style="color:red" class="help-block"><?php echo $lotstatus_err;?></span>
                                        </div>
                                        <div class="col-lg-4">
                                                
                                                </div>
                                                <div class="col-lg-4">
                                                <label class="form-control-label">Available Date</label>
                                                        <input class="form-control flatpickr flatpickr-input" value="<?php echo $availabledate; ?>" name="availabledate" id="availabledate" readonly="readonly">
                                                        <span style="color:red" class="help-block"><?php echo $availabledate_err;?></span>    
                                                </div>
                                        
                                        </div>

                                        <div class="form-group row <?php echo (!empty($streetnumber_err)) ? 'has-error' : ''; ?>">
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Street #</label>
                                                <input type="text" class="form-control" value="<?php echo $streetnumber; ?>" name="streetnumber" id="streetnumber" placeholder="Street #">
                                                <span style="color:red" class="help-block"><?php echo $streetnumber_err;?></span>
                                        </div>
                                        <div class="col-lg-4 <?php echo (!empty($streetname_err)) ? 'has-error' : ''; ?>">
                                                <label class="form-control-label">Street Name</label>
                                                <input type="text" class="form-control" value="<?php echo $streetname; ?>" name="streetname" id="streetname" placeholder="Street Name">
                                                <span style="color:red" class="help-block"><?php echo $streetname_err;?></span>
                                        </div>
                                        <div class="col-lg-4 <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
                                                <label class="form-control-label">City</label>
                                                <input type="text" class="form-control" value="<?php echo $city; ?>" name="city" id="city" placeholder="City">
                                                <span style="color:red" class="help-block"><?php echo $city_err;?></span>
                                        </div>
                                        </div>


                                    <div class="form-group row <?php echo (!empty($lotnumber_err)) ? 'has-error' : ''; ?>">
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Lot #</label>
                                                <input type="text" class="form-control" value="<?php echo $lotnumber; ?>" name="lotnumber" id="lotnumber" placeholder="Lot #">
                                                <span style="color:red" class="help-block"><?php echo $lotnumber_err;?></span>
                                        </div>
                                        <div class="col-lg-4 <?php echo (!empty($lotsize_err)) ? 'has-error' : ''; ?>">
                                                <label class="form-control-label">Lot Size</label>
                                                <input type="text" class="form-control" value="<?php echo $lotsize; ?>" name="lotsize" id="lotsize" placeholder="Lot Size">
                                                <span style="color:red" class="help-block"><?php echo $lotsize_err;?></span>
                                        </div>
                                        <div class="col-lg-4 <?php echo (!empty($lotcost_err)) ? 'has-error' : ''; ?>">
                                                <label class="form-control-label">Lot Cost</label>
                                                <input type="text" class="form-control" value="<?php echo $lotcost; ?>" name="lotcost" id="lotcost" placeholder="Lot Cost">
                                                <span style="color:red" class="help-block"><?php echo $lotcost_err;?></span>
                                        </div>
                                    </div>

                                <div class="form-group row <?php echo (!empty($modelselection_err)) ? 'has-error' : ''; ?>">
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Model Selection</label>
                                                <input type="text" class="form-control" value="<?php echo $modelselection; ?>" name="modelselection" id="modelselection" placeholder="Lot #">
                                                <span style="color:red" class="help-block"><?php echo $modelselection_err;?></span>
                                        </div>
                                        <div class="col-lg-4 <?php echo (!empty($permitstatus_err)) ? 'has-error' : ''; ?>">
                                                <label class="form-control-label">Permit Status</label>
                                                <input type="text" class="form-control" value="<?php echo $permitstatus; ?>" name="permitstatus" id="permitstatus" placeholder="Lot Size">
                                                <span style="color:red" class="help-block"><?php echo $permitstatus_err;?></span>
                                        </div>
                                        <div class="col-lg-4 <?php echo (!empty($ownedby_err)) ? 'has-error' : ''; ?>">
                                                <label class="form-control-label">Owned By</label>
                                                <input type="text" class="form-control" value="<?php echo $ownedby; ?>" name="ownedby" id="ownedby" placeholder="Lot Cost">
                                                <span style="color:red" class="help-block"><?php echo $ownedby_err;?></span>
                                        </div>
                                </div>


                                        <div class="form-group row">
                                        <div class="col-lg-4">
                                                <label class="form-control-label">City Water</label>
                                                <select class="form-control" value="<?php echo $citywater; ?>" name="citywater" id="citywater">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                </select>
                                                <span style="color:red" class="help-block"><?php echo $citywater_err;?></span>
                                        </div>
                                        <div class="col-lg-4">
                                                <label class="form-control-label" for="citysewer">City Sewer</label>
                                                <select class="form-control" value="<?php echo $citysewer; ?>" name="citysewer" id="citysewer">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                </select>
                                                <span style="color:red" class="help-block"><?php echo $citysewer_err;?></span>
                                        </div>
                                        <div class="col-lg-4">
                                                <label class="form-control-label" for="streetpower">Street Power</label>
                                                <select class="form-control" value="<?php echo $streetpower; ?>" name="streetpower" id="streetpower">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                </select>
                                                <span style="color:red" class="help-block"><?php echo $streetpower_err;?></span>
                                        </div>
</div>


                                        <div class="form-group row">
                                                <div class="col-lg-4">
                                                <label class="form-control-label">Flood Zone</label>
                                                <input type="text" class="form-control" value="<?php echo $floodzone; ?>" name="floodzone" id="floodzone" placeholder="Flood zone">
                                                <span style="color:red" class="help-block"><?php echo $floodzone_err;?></span>
                                        </div>
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Well</label>
                                                <select class="form-control" value="<?php echo $well; ?>" name="well" id="well">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                </select>
                                                <span style="color:red" class="help-block"><?php echo $well_err; ?></span>
                                        </div>
                                        <div class="col-lg-4">
                                                <label class="form-control-label" for="septic">Septic</label>
                                                <select class="form-control" value="<?php echo $septic; ?>" name="septic" id="septic">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                </select>
                                                <span style="color:red" class="help-block"><?php echo $septic_err;?></span>
                                        </div>
                                       
</div>



                                        <div class="form-group row">
                                                <div class="col-lg-4">
                                                <label class="form-control-label">List Price</label>
                                                <input type="text" class="form-control" value="<?php echo $listprice; ?>" name="listprice" id="listprice" placeholder="List Price">
                                                <!-- <span style="color:red" class="help-block"><?php echo $listprice_err;?></span> -->
                                        </div>
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Purchase Price</label>
                                                <input type="text" class="form-control" value="<?php echo $purchaseprice; ?>" name="purchaseprice" id="purchaseprice" placeholder="Purchase Price">
                                                <span style="color:red" class="help-block"><?php echo $purchaseprice_err;?></span>
                                        </div>
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Counter Offer</label>
                                                <input type="text" class="form-control" value="<?php echo $counteroffer; ?>" name="counteroffer" id="counteroffer" placeholder="Counter Offer">
                                                <span style="color:red" class="help-block"><?php echo $counteroffer_err;?></span>
                                        </div>
</div>



                                         <div class="form-group row">
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Property Appraiser</label>
                                                <input type="text" class="form-control" value="<?php echo $propertyappraiser; ?>" name="propertyappraiser" id="propertyappraiser" placeholder="Property Appraiser">
                                                <span style="color:red" class="help-block"><?php echo $propertyappraiser_err;?></span>
                                        </div>
                                                <div class="col-lg-4">
                                                <label class="form-control-label">MLS</label>
                                                <input type="text" class="form-control" value="<?php echo $mls; ?>" name="mls" id="mls" placeholder="MLS">
                                                <span style="color:red" class="help-block"><?php echo $mls_err;?></span>
                                        </div>
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Seller</label>
                                                <input type="text" class="form-control" value="<?php echo $seller; ?>" name="seller" id="seller" placeholder="Seller">
                                                <span style="color:red" class="help-block"><?php echo $seller_err;?></span>
                                        </div>
</div>





                                        <div class="form-group row">
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Parcel ID</label>
                                                <input type="text" class="form-control" value="<?php echo $parcelid; ?>" name="parcelid" id="parcelid" placeholder="Parcel ID">
                                                <span style="color:red" class="help-block"><?php echo $parcelid_err;?></span>
                                        </div>
                                                <div class="col-lg-4">
                                                <label class="form-control-label">Offer Submitted Date</label>
                                                <input class="form-control flatpickr flatpickr-input" value="<?php echo $offersubmitteddate; ?>" name="offersubmitteddate" id="offersubmitteddate" readonly="readonly">
                                                <span style="color:red" class="help-block"><?php echo $offersubmitteddate_err;?></span>
                                        </div>
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Contract Signed Date</label>
                                                <input class="form-control flatpickr flatpickr-input" value="<?php echo $contractsigneddate; ?>" name="contractsigneddate" id="contractsigneddate" readonly="readonly">
                                                <span style="color:red" class="help-block"><?php echo $contractsigneddate_err;?></span>
                                        </div>
</div>




                                        <div class="form-group row">
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Escrow Due</label>
                                                <input type="text" class="form-control" value="<?php echo $escrowdue; ?>" name="escrowdue" id="escrowdue" placeholder="Escrow Due">
                                                <span style="color:red" class="help-block"><?php echo $escrowdue_err;?></span>
                                        </div>
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Escrow Submitted Date</label>
                                                <input class="form-control flatpickr flatpickr-input" value="<?php echo $escrowsubmitted; ?>" name="escrowsubmitted" id="escrowsubmitted">
                                                <span style="color:red" class="help-block"><?php echo $escrowsubmitted_err;?></span>
                                        </div>
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Vetted</label>
                                                <select class="form-control" value="<?php echo $vetted; ?>" name="vetted" id="vetted">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                </select>
                                                <span style="color:red" class="help-block"><?php echo $vetted_err;?></span>
                                        </div>
</div>




                                        <div class="form-group row">
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Feasibility Days</label>
                                                <input type="text" class="form-control" value="<?php echo $feasibilitydays; ?>" name="feasibilitydays" id="feasibilitydays" placeholder="Feasibility Days">
                                                
                                        </div>
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Feasibility Due Date</label>
                                                <input class="form-control flatpickr flatpickr-input" value="<?php echo $feasibilityduedate; ?>" name="feasibilityduedate" id="feasibilityduedate" readonly="readonly">
                                                <span style="color:red" class="help-block"><?php echo $feasibilityduedate_err;?></span>
                                        </div>
                                        <div class="col-lg-4">
                                                <label class="form-control-label">Closing Date</label>
                                                <input class="form-control flatpickr flatpickr-input" value="<?php echo $closingdate; ?>" name="closingdate" id="closingdate" readonly="readonly">
                                                <span style="color:red" class="help-block"><?php echo $closingdate_err;?></span>
                                        </div>
</div>

                                        <div class="form-group row">
                                        <div class="col-lg-12">
                                                <label class="form-control-label">Permitting Notes</label>
                                                <input type="text" rows="10" cols="10" class="form-control" value="<?php echo $permittingnotes; ?>" name="permittingnotes" id="permittingnotes" placeholder="Permitting notes">
                                                <span style="color:red" class="help-block"><?php echo $permittingnotes_err;?></span>
                                        </div>
                                        </div>

                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                                <label class="form-control-label">Sales Notes</label>
                                                <input type="text" rows="10" cols="10" class="form-control" value="<?php echo $salesnotes; ?>" name="salesnotes" id="salesnotes" placeholder="Sales notes">
                                                <span style="color:red" class="help-block"><?php echo $salesnotes_err;?></span>
                                        </div>
                                        </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                                <label class="form-control-label">Notes</label>
                                                <input type="text" class="form-control" rows="10" cols="10" value="<?php echo $notes; ?>" name="notes" id="notes">
                                                <span style="color:red" class="help-block"><?php echo $notes_err;?></span>
                                        </div>
                                        </div>



 
                                        <div class="modal-footer">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                                        </div>

                                        
                      
                    </form>

                    <?php
                       
                        
                    ?>

                    <?php

// show survey if there is one.
      if( $surveyname == null){
        echo "<div class='form-group row' style='border-bottom:1px solid #f3f3f3'>
        <div class='col-lg-12'>
        <label style='color:#999999'>Survey</label>
        <br>
          No survey Found. <a href='updateSurvey.php?id=$id'>Upload Survey</a>
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