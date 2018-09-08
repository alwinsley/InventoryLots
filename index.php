
<!-- BEGIN HEAD -->
<?php include 'partials/header.php'; 

?>
<!-- END HEADER -->



<div class="ks-page-container">
    
<!-- BEGIN DEFAULT SIDEBAR -->
<?php include 'partials/sidebar.php' ?>
<!-- END DEFAULT SIDEBAR -->



    <div class="ks-column ks-page">
        <div class="ks-page-header">
            <section class="ks-title">
                <h3>Lots</h3>
            </section>
        </div>

        <div class="ks-page-content">
            <div class="ks-page-content-body ks-content-nav">
                <div class="ks-nav-body">
                    <div class="ks-nav-body-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 ks-panels-column-section mb-2">
                                    <a href="addLotform.php" class="btn btn-success" title='Add New Lot' data-toggle='tooltip'> Add New Lot</a>
                                </div>
                                    <div id="lotRecords" class="col-lg-12 ks-panels-column-section">

                                    <?php

                                        $query = mysqli_query($conn, "SELECT * FROM lottable");
                                        $number=mysqli_num_rows($query);
                                        $closedQuery = mysqli_query($conn, "SELECT * FROM lottable WHERE lotstatus ='Closed'");
                                        $numberClosed=mysqli_num_rows($closedQuery);
                                        

                                        echo "<div class='col-lg-4' style='padding-left:0'> 
                                        <h6 class='mt-3 mb-3 text-warning'>Total Lots: ". $number . "</h6>
                                        <h6 class='mt-3 mb-3'>Lots Closed: ". $numberClosed . "</h6>
                                        </div>" ;
                                        ?>

                                    <?php
                                    include 'lots.php';
                                    ?>
                   
                                        <!-- <table id="ks-datatable" class="table table-striped table-bordered"
                                            width="100%"
                                            data-pagination="true"
                                            data-search="true"
                                            data-height="500"
                                            style="overflow:scroll"
                                        >                           
                                            <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Street #</th>
                                                <th>Street Name</th>
                                                <th>City</th>
                                                <th>Parcel ID</th>
                                                <th>City Water</th>
                                                <th>City Sewer</th>
                                                <th>List Price</th>
                                                <th>Purchase Price</th>
                                                <th>Counter Offer</th>
                                                <th>MLS</th>
                                                <th>Seller</th>
                                                <th>Offer Submitted Date</th>
                                                <th>Contract Signed Date</th>
                                                <th>Escrow Due</th>
                                                <th>Escrow Submitted</th>
                                                <th>Vetted</th>
                                                <th>Feasibility Days</th>
                                                <th>Feasibility Due Date</th>
                                                <th>Closing Date</th>   
                                            </tr>
                                            </thead>
                                        
                                            <tbody>
                                            <tr>
                                                <td>Executed</td>
                                                <td>23</td>
                                                <td>Edinburgh</td>
                                                <td>Port Malabar Unit 20 Lot 14 Blk 1010</td>
                                                <td>Orlando</td>
                                                <td>07-11-31-7029-00530-0140</td>
                                                <td>Yes</td>
                                                <td>Yes</td>
                                                <td>$458,345</td>
                                                <td>$400,000</td>
                                                <td>N/A</td>
                                                <td>234544</td>
                                                <td>Jody Joseph</td>
                                                <td>July 13, 2018</td>
                                                <td>July 14, 2018</td>
                                                <td>300</td>
                                                <td>Y</td>
                                                <td>Y</td>
                                                <td>20</td>
                                                <td>August 2, 2018</td>
                                                <td>July 31, 2018</td>
                                            </tr>
                                        
                                        <tr id="lot">

                                        </tr>
                                            
                                            </tbody>
                                        </table> -->
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