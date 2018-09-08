<?php



                    // Attempt select query execution

                    // Pagination 
                    $perpage = 10;
                        if(isset($_GET['page']) & !empty($_GET['page'])){
                            $curpage = $_GET['page'];
                        }else{
                            $curpage = 1;
                        }
                    $start = ($curpage * $perpage) - $perpage;
                    $sql = "SELECT * FROM lottable ORDER BY lotstatus ASC";

                    $pageres = mysqli_query($conn, $sql);
                    $totalres = mysqli_num_rows($pageres);

                    $endpage = ceil($totalres/$perpage);
                    $startpage = 1;
                    $nextpage = $curpage + 1;
                    $previouspage = $curpage - 1;

                    $ReadSql = "SELECT * FROM `lottable` ORDER BY lotstatus ASC LIMIT $start, $perpage";
                    $res = mysqli_query($conn, $ReadSql);

                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($res) > 0){
                            
                            echo "<table class='table table-bordered table-striped' width='100%' data-pagination='true' data-search='true'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Status</th>";
                                        echo "<th>Street #</th>";
                                        echo "<th>Street Name</th>";
                                        echo "<th>City</th>";
                                        echo "<th>Parcel ID</th>";
                                        echo "<th>Lot # (Unit)</th>";
                                        echo "<th>Contract Signed Date</th>";
                                        echo "<th>Closing Date</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($res)){
                                    echo "<tr>";
                                        echo "<td class='statuscolor'>" . $row['lotstatus'] . "</td>";
                                        echo "<td>" . $row['streetnumber'] . "</td>";
                                        echo "<td>" . $row['streetname'] . "</td>";
                                        echo "<td>" . $row['city'] . "</td>";
                                        echo "<td>" . $row['parcelid'] . "</td>";
                                        echo "<td>" . $row['lotnumber'] . "</td>";
                                        echo "<td>" . $row['contractsigneddate'] . "</td>";
                                        echo "<td>" . $row['closingdate'] . "</td>";
                                        echo "<td>";
                                            echo "<a class='btn btn-info mr-2 mt-2' href='readLot.php?id=". $row['id'] ."' title='View' data-toggle='tooltip'><span style='margin-left: 7px;' class='la la-file-o ks-icon'></span></a>";
                                            echo "<a class='btn btn-warning mr-2 mt-2' href='updateLot.php?id=". $row['id'] ."' title='Edit ' data-toggle='tooltip'><span style='margin-left: 7px;' class='la la-pencil ks-icon'></span></a>";
                                            echo "<a class='btn btn-danger mt-2' href='deleteLot.php?id=". $row['id'] ."' title='Delete ' data-toggle='tooltip'><span style='margin-left: 7px;' class='la la-close ks-icon'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No Lots were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }



                    // Close connection
                    mysqli_close($conn);
                    ?>



<nav aria-label="Page navigation">
  <ul class="pagination">
  <?php if($curpage != $startpage){ ?>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">First</span>
      </a>
    </li>
    <?php } ?>
    <?php if($curpage >= 2){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
    <?php } ?>
    <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
    <?php if($curpage != $endpage){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Last</span>
      </a>
    </li>
    <?php } ?>
  </ul>
</nav>



                    