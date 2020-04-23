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

//make deals an array
$deals = array();

//query to get data from the table
$sqlDealsQuery = "SELECT deals FROM tbl_deals";
//execute query
$sqlDealsQueryResult = mysqli_query($con, $sqlDealsQuery);

//loop through the returned data
foreach($sqlDealsQueryResult as $row) {
    //convert JSON object to PHP object
    $object = json_decode(
        '{"dealDestination": "", "months": []}'
    );
    
    //Set the $object object called dealDestination to hold = // turn nested $row into a php object and set to deals
    $object->dealDestination = json_decode(json_encode($row))->deals;
    //store dealDestination into array
    $deals[] = $object;
}


//query to get data from the table
$sqlTrendsQuery = "SELECT DISTINCT * FROM tbl_deals_trend";
//execute query
$sqlTrendsQueryResult = mysqli_query($con,$sqlTrendsQuery);

//make trend an array
$trends = array();

//loop through the returned data
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

    // turn nested $row into a php object and set to trend
    $trend = json_decode(json_encode($row));
    
    //go through each deal in the $deals[]
    foreach($deals as $deal) {
        //Find which element in the $deals[] above matches $row->deals from 2nd sql
        if ($deal->dealDestination == $trend->deals) {
            //decode json object as php object
            $object = json_decode('{"month": "", "touristCount": ""}');

            //assign the data from $trend php object to the $object created above.
            $object->month = $trend->month;
            $object->touristCount = $trend->touristCount;

            //and push, to that elements months array, along with the month & tourist count object.
            array_push($deal->months, $object);
        }
    }

    //store each row into the trends array
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