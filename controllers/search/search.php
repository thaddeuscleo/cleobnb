<?php

require './db/database.php';

function get_search_data()
{
    return array($_GET['location'], $_GET['start-date'], $_GET['end-date'], $_GET['guess-number']);
}

function searchHost()
{
    global $conn;
    list($location, $startDate, $endDate, $guessNumber) = get_search_data();
    $start = date("F j", strtotime($startDate));
    $end = date("F j", strtotime($endDate));

    $query = "SELECT * FROM spaces WHERE start_date BETWEEN start_date AND '$startDate' AND end_date BETWEEN '$endDate' AND end_date AND location LIKE '%$location%' AND guess_count >= '$guessNumber'";

    $results = $conn->query($query);
    if ($results) {
        $space_id = [];
        $images = [];
        foreach ($results as $res) {
            array_push($space_id, $res['id']);
        }
        for ($i = 0; $i < $results->num_rows; $i++) {
            $imageQuery = "SELECT image_path FROM space_images WHERE space_id = '$space_id[$i]' LIMIT 1";
            $imgRes = $conn->query($imageQuery);
            $assoc = $imgRes->fetch_assoc();
            array_push($images, $assoc['image_path']);
        }

        return array($results, $start, $end, $guessNumber, $images);
    }
}
