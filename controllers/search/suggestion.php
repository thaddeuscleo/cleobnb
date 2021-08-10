<?php
header('Access-Control-Allow-Origin: *');

require '../../db/database.php';


if(isset($_GET['query'])){
    $name = $_GET['query'];
    
    $SelQuery = "SELECT DISTINCT location 
                 FROM spaces 
                 WHERE LOWER(location) 
                 LIKE '%$name%' 
                 LIMIT 3";
    
    $res = $conn->query($SelQuery);

    $locations = [];
    
    while($data = $res->fetch_row()){
        $locations[] = $data;
    }
    
    echo json_encode($locations);
}
