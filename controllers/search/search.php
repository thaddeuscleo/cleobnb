<?php

require './db/database.php';

function get_search_data()
{
    return array($_GET['location'], $_GET['start-date'], $_GET['end-date'], $_GET['guess-number']);
}

function validation($location, $startDate, $endDate, $guessNumber) {
    if(strlen($location) < 1){
        return false;
    }
    if(strlen($startDate) < 1){
        return false;
    }
    if(strlen($endDate) < 1){
        return false;
    }
    if(strlen($guessNumber) < 1){
        return false;
    }
    return true;
}

function setSearchCookie($location, $startDate, $endDate, $guessNumber, $diff, $rStartDate, $rEndDate) {
    unset($_COOKIE['location']);
    unset($_COOKIE['startDate']);
    unset($_COOKIE['endDate']);
    unset($_COOKIE['guessCount']);
    unset($_COOKIE['diff']);
    unset($_COOKIE['rawStartDate']);
    unset($_COOKIE['rawEndDate']);
    setcookie('location', $location);
    setcookie('startDate', $startDate);
    setcookie('endDate', $endDate);
    setcookie('guessCount', $guessNumber);
    setcookie('diff', $diff);
    setcookie('rawStartDate', $rStartDate);
    setcookie('rawEndDate', $rEndDate);
}

function searchHost()
{
    global $conn;
    list($location, $startDate, $endDate, $guessNumber) = get_search_data();

    $isValid = validation($location, $startDate, $endDate, $guessNumber);

    if(!$isValid){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        return;
    }

    $start = date("F j", strtotime($startDate));
    $end = date("F j", strtotime($endDate));

    $startObj = new DateTime($startDate);
    $endObj = new DateTime($endDate);
    $diff = $endObj->diff($startObj)->format("%a");

    setSearchCookie($location, $start, $end, $guessNumber, $diff, $startDate, $endDate);

    $query = "SELECT * FROM spaces WHERE start_date BETWEEN start_date AND '$startDate' AND end_date BETWEEN '$endDate' AND end_date AND location LIKE '%$location%' AND guess_count >= '$guessNumber' AND available  = 1";

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
