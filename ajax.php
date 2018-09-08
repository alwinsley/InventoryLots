<?php
 session_start();
//Including Database configuration file.
 
include "conn.php";
 
//Getting value of "search" variable from "script.js".
 
if (isset($_POST['search'])) {


 
//Search box value assigning to $Name variable.
 
   $streetname = $_POST['search'];
 
//Search query.
 
   $Query = "SELECT id, streetnumber, streetname, city FROM lottable WHERE streetname LIKE '%$streetname%' LIMIT 10";
//    $result = mysqli_query($conn, $Query);
//    $row = mysqli_fetch_array($result);
 
//Query execution
 
   $ExecQuery = MySQLi_query($conn, $Query);
 
//Creating unordered list to display result.
 
   echo '
 
<ul style="padding-left:15px">
 
   ';
 
   //Fetching result from database.
 
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
 
       ?>
 
   <!-- Creating unordered list items.
 
        Calling javascript function named as "fill" found in "script.js" file
 
        By passing fetched result as parameter. -->
 
   <li style="list-style:none;margin: 5px 0 10px 0;" onclick='fill("<?php echo $Result['streetname']; ?>")'>
 
   <a href="readLot.php?id=<?php echo $Result['id'] ?>">  
 
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
 
       <?php echo $Result['streetnumber'] . ' ' . $Result['streetname'] . ' ' . $Result['city']; ?>
 
   </li></a>
 
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
 
   <?php
 
}}
 
 
?>
 
</ul>