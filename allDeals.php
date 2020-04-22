<?php
//setting header to json
header('Content-Type: application/json');
include "dbconn.php";

//Query the tbl_deals table and create a new object that looks like the following for each row
/*
    {
        deals: tbl_deals[deals]
        months: []
    }
*/

$deals = array();

$sqlDealsQuery = "SELECT deals FROM tbl_deals";

$sqlDealsQueryResult = mysqli_query($con, $sqlDealsQuery);

foreach($sqlDealsQueryResult as $row) {
    $object = json_decode(
        '{"dealDestination": "", "months": []}'
    );
    $object->dealDestination = json_decode(json_encode($row))->deals;
    $deals[] = $object;
}

//query to get data from the table
$sqlTrendsQuery = "SELECT DISTINCT * FROM tbl_deals_trend";

//execute query
$sqlTrendsQueryResult = mysqli_query($con,$sqlTrendsQuery);

//loop through the returned data
$trends = array();
foreach ($sqlTrendsQueryResult as $row) {
    //Find which element in the $deals array matches $row->deals
    //and push, to that elements months array, a new object that
    //looks like the following:
    /*
        {
            month: $row->month;
            touristCount: $row->touristCount;
        }
    */ 

    $trend = json_decode(json_encode($row));
    
    foreach($deals as $deal) {
        if ($deal->dealDestination == $trend->deals) {
            $object = json_decode('{"month": "", "touristCount": ""}');

            $object->month = $trend->month;
            $object->touristCount = $trend->touristCount;

            array_push($deal->months, $object);
        }
    }

    $trends[] = $row;
}

//free memory associated with result
$sqlTrendsQueryResult->close();
$sqlDealsQueryResult->close();

//close connection
$con->close();

//print the data
print json_encode($deals);

?>