<?php
//setting header to json
header('Content-Type: application/json');
$selection=$_GET['deal'];
include "dbconn.php";

//query to get data from the table
$sqlTrendsQuery = "SELECT month, touristCount FROM tbl_deals_trend WHERE deals=".$selection;

//execute query
$sqlTrendsQueryResult = mysqli_query($con, $sqlTrendsQuery); 

//create object structure
$object = json_decode(
        '{"dealDestination": "", "months": []}'
    );

//storing selection as dealDestination
$dealDestination = $selection;

//remove unwanted characters from destination
$object->dealDestination = preg_replace("/[^a-zA-Z]/", "", $dealDestination);

//loop through the returned data
foreach ($sqlTrendsQueryResult as $row) {
  //assigning an object to the months array to store the contents in row, which are the month and touristCount
  $object->months[] = $row;
}

//make the first item the object of the array
$deals = array();
$deals[] = $object;

//free memory associated with result
$sqlTrendsQueryResult->close();

//close connection
$con->close();

//now print the data
print json_encode($deals);

?>