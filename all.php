<?php
//setting header to json
header('Content-Type: application/json');
$selection=$_GET['deal'];
include "dbconn.php";


//query to get data from the table
$sqlTrendsQuery = "SELECT month, touristCount FROM tbl_deals_trend WHERE deals=".$selection;

//execute query
$sqlTrendsQueryResult = mysqli_query($con, $sqlTrendsQuery); 

//loop through the returned data
$object = json_decode(
        '{"dealDestination": "", "months": []}'
    );

    $dealDestination = $selection;

    $object->dealDestination = preg_replace("/[^a-zA-Z]/", "", $dealDestination);

foreach ($sqlTrendsQueryResult as $row) {
  $object->months[] = $row;
}

$deals = array();
$deals[] = $object;

//free memory associated with result
$sqlTrendsQueryResult->close();

//close connection
$con->close();

//now print the data
print json_encode($deals);

?>