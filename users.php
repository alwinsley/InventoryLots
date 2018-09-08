
<?php
			$sql = "SELECT id, realname, username, company, userImg, department, title, phone FROM users";
			$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
			while( $record = mysqli_fetch_assoc($resultset) ) {
			?>


                    <div class="col-lg-2 mb-5 <?php $record['id']; ?>">
                            <div id="userAvatar" class="card">
                            <img class="card-img-top"alt="" src="<?php echo $record['userImg']; ?>"> 
                                <div class="card-block">
                                    <h4 class="card-title" style="margin-bottom:0;"> <?php echo $record['realname']; ?></h4>
                                    <p class="card-text"><em><?php echo $record['title']; ?></em></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span style="color:grey;font-size:10px;">Company: </span><?php echo $record['company']; ?></li>
                                    <li class="list-group-item"><span style="color:grey;font-size:10px;">Department: </span><?php echo $record['department']; ?></li>
                                    <li class="list-group-item userEmail"><span style="color:grey;font-size:10px;">Email: </span><?php echo $record['username']; ?></li>
                                    <li class="list-group-item"><span style="color:grey;font-size:10px;">Phone: </span><?php echo $record['phone']; ?></li>
                                </ul>
                                <!-- <div class="card-block">
                                    <a href="#" class="card-link ks-color-curious-blue">Card link</a>
                                    <a href="#" class="card-link ks-color-curious-blue">Another link</a>
                                </div> -->
                            </div>
                        </div>
                    <?php } ?>


                    



                      

