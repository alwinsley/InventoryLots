<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    include "conn.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM lottable WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $id = $row["id"];
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
                $createdBy = $row["createdBy"];
                $createdAt = $row["createdAt"];
                
                
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}


?>


  <!-- BEGIN HEAD -->
  <?php include 'partials/header.php' ?>
  <!-- END HEADER -->



  <div class="ks-page-container">

    <!-- BEGIN DEFAULT SIDEBAR -->
    <?php include 'partials/sidebar.php' ?>
    <!-- END DEFAULT SIDEBAR -->


    <div class="ks-column ks-page">
      <div class="ks-page-header">
        <section class="ks-title">
          <h3>
            <?php echo $row["streetnumber"]; ?>
            <?php echo $row["streetname"]; ?>
          </h3>
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
                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                      <div class="col-lg-4">
                        <label style="color:#999999">
                          Lot Status
                        </label>
                        <p class="form-control-static">
                          <h4 id="lotstatuscolor">
                            <?php echo $row["lotstatus"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">Closing Date</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["closingdate"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">Available Date</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["availabledate"]; ?>
                          </h4>
                        </p>
                      </div>
                    </div>

                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                      <div class="col-lg-4">
                        <label style="color:#999999">
                          Street #
                        </label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["streetnumber"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">
                          Street Name
                        </label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["streetname"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">
                          City
                        </label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["city"]; ?>
                          </h4>
                        </p>
                      </div>
                    </div>


                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                      <div class="col-lg-4">
                        <label style="color:#999999">
                          Lot #
                        </label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["lotnumber"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">
                          Lot Size
                        </label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["lotsize"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">
                          Lot Cost
                        </label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["lotcost"]; ?>
                          </h4>
                        </p>
                      </div>
                    </div>



                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                      <div class="col-lg-4">
                        <label style="color:#999999">
                          Model Selection
                        </label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["modelselection"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">
                         Permit Status
                        </label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["permitstatus"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">
                          Owned By
                        </label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["ownedby"]; ?>
                          </h4>
                        </p>
                      </div>
                    </div>




                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">                    
                      <div class="col-lg-4">
                        <label style="color:#999999">City Water</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["citywater"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">City Sewer</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["citysewer"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">Street Power</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["streetpower"]; ?>
                          </h4>
                        </p>
                      </div>
                    </div>


                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                      <div class="col-lg-4">
                        <label style="color:#999999">Flood Zone</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["floodzone"]; ?>
                          </h4>
                        </p>
                      </div>

                      <div class="col-lg-4">
                        <label style="color:#999999">Well</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["well"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">Septic</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["septic"]; ?>
                          </h4>
                        </p>
                      </div>
                    </div>


                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                      <div class="col-lg-4">
                        <label style="color:#999999">List price</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["listprice"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">Purchase price</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["purchaseprice"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">Counter offer</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["counteroffer"]; ?>
                          </h4>
                        </p>
                      </div>
                    </div>


                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                    <div class="col-lg-4">
                        <label style="color:#999999">Property Appraiser</label>
                        <p class="form-control-static">
                          <p>
                             <a style="color:blue" target="_blank" href="<?php echo $row['propertyappraiser']; ?>"> Property Appraiser  <span class="ks-icon la la-link"></span> </a>
                        </p>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">MLS</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["mls"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">Seller</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["seller"]; ?>
                          </h4>
                        </p>
                      </div>
                    </div>



                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                    <div class="col-lg-4">
                        <label style="color:#999999">Parcel ID</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["parcelid"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">Offer Submitted Date</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["offersubmitteddate"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">Contract Signed Date</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["contractsigneddate"]; ?>
                          </h4>
                        </p>
                      </div>
                    </div>



                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                      <div class="col-lg-4">
                        <label style="color:#999999">Escrow due</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["escrowdue"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">Escrow Submitted Date</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["escrowsubmitted"]; ?>
                          </h4>
                        </p>
                      </div>
                    </div>



                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                      <div class="col-lg-4">
                        <label style="color:#999999">Vetted</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["vetted"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">Feasibility days</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["feasibilitydays"]; ?>
                          </h4>
                        </p>
                      </div>
                      <div class="col-lg-4">
                        <label style="color:#999999">Feasibility Due date</label>
                        <p class="form-control-static">
                          <h4>
                            <?php echo $row["feasibilityduedate"]; ?>
                          </h4>
                        </p>
                      </div>
                    </div>


                  <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                      <div class="col-lg-12">
                        <label style="color:#999999">Permitting Notes</label>
                        <p class="form-control-static">
                          <p>
                            <?php echo $row["permittingnotes"]; ?>
                          </p>
                        </p>
                      </div>
                    </div>


                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                      <div class="col-lg-12">
                        <label style="color:#999999">Sales Notes</label>
                        <p class="form-control-static">
                          <p>
                            <?php echo $row["salesnotes"]; ?>
                          </p>
                        </p>
                      </div>
                    </div>


                    <div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                      <div class="col-lg-12">
                        <label style="color:#999999">Notes</label>
                        <p class="form-control-static">
                          <p>
                            <?php echo $row["notes"]; ?>
                          </p>
                        </p>
                      </div>
                    </div>

                    <?php

                    // show survey if there is one.
                          if( $row['surveyname'] == null){
                            echo '<div class="form-group row" style="border-bottom:1px solid #f3f3f3">
                            <div class="col-lg-12">
                            <label style="color:#999999">Survey</label>
                            <br>
                              No survey Found.
                            </div>
                            </div> ';
                          }else {
                            
                                    echo "         <div class='form-group row' style='border-bottom:1px solid #f3f3f3'>
                                                <div class='col-lg-12'>
                                                  <label style='color:#999999'>Survey</label>
                                                  <table class='table'>
                              <tr>
                          
                                <th>Name</th>
                                <th>Size</th>
                                <!-- <th>Delete</th> -->
                              </tr>
                              <tr>
                                <td id='surveyFile'><a target='_blank' href='$surveylocation$surveyname'> $surveyname</td>
                                <td> $surveysize </td>
                                <!-- <td><a href='delete.php?id=$id'>Delete</a></td> -->
                              </tr>
                            </table>
                                              </div>
                                              </div> ";
                           
                          }
                                            ?>

                      <p>
                        <a href="index.php" class="btn btn-primary">Back</a>
                        <a class="btn btn-warning" href="updateLot.php?id=<?php echo $row['id'] ?>">Edit</a>



                      </p>
                  </div>


                  <!-- <div class="col-lg-3 ks-panels-column-section ml-3" style="height:800px;">

                    <div class="ks-item" style="border-bottom:1px solid #f3f3f3;margin-bottom:20px;">
                      <div class="ks-header">
                       created this lot
                      </div>
                      <div class="ks-text">
                        <small>
                        
                        </small>
                      </div>
                    </div>
                    <div class="ks-item" style="border-bottom:1px solid #f3f3f3;">
                      <div class="ks-header">
                     edited this lot
                      </div>
                      <div class="ks-text">
                        <small>
                         
                        </small>
                      </div>
                    </div>

                  </div> -->






                </div>
                <!-- end row -->
              </div>
              <!-- end container-fluid -->
            </div>
            <!-- end ks-nav-body-wrapper -->
          </div>
          <!-- end ks-nav-body -->
        </div>
        <!-- end ks-page-content-body -->
      </div>
      <!-- end ks-page-content -->
    </div>
    <!-- end ks-column ks-page -->
  </div>
  <!-- end ks-page-container -->


  <?php include 'partials/footer.php'; ?>