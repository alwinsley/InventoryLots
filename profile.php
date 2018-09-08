
<!-- BEGIN HEAD -->
<?php include 'header.php' ?>
<!-- END HEADER -->



<div class="ks-page-container">
    
<!-- BEGIN DEFAULT SIDEBAR -->
<?php include 'sidebar.php' ?>
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
                                

                <div class="col-lg-12">
                    <div class="col-lg-2 <?php $record['id']; ?>">
                            <div class="card">
                            <img class="card-img-top"alt="" src="<?php echo $record['userImg']; ?>">
                                <div class="card-block">
                                    <h4 class="card-title" style="margin-bottom:0;"> <?php echo $record['name']; ?></h4>
                                    <p class="card-text"><em><?php echo $record['description']; ?></em></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span style="color:grey;font-size:10px;">Company: </span><?php echo $record['company']; ?></li>
                                    <li class="list-group-item"><span style="color:grey;font-size:10px;">Department: </span><?php echo $record['department']; ?></li>
                                    <li class="list-group-item"><span style="color:grey;font-size:10px;">Email: </span><?php echo $record['username']; ?></li>
                                    <li class="list-group-item"><span style="color:grey;font-size:10px;">Phone: </span><?php echo $record['phone']; ?></li>
                                </ul>
                                <!-- <div class="card-block">
                                    <a href="#" class="card-link ks-color-curious-blue">Card link</a>
                                    <a href="#" class="card-link ks-color-curious-blue">Another link</a>
                                </div> -->
                            </div>
                        </div>
                   




                    <div class="col-lg-6">
                    
                    <br>
                                   <a href="profileEdit.php?id" class="btn btn-info">Edit Profile</a>
                              
                    
                    </div>

                     </div>






                                 </div> <!-- end row -->
                        </div> <!-- end container-fluid -->
                    </div> <!-- end ks-nav-body-wrapper -->
                </div> <!-- end ks-nav-body -->
            </div> <!-- end ks-page-content-body -->
        </div> <!-- end ks-page-content -->
    </div> <!-- end ks-column ks-page -->
</div> <!-- end ks-page-container -->




<?php include 'footer.php'; ?>