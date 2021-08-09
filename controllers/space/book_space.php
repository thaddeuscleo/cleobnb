<?php
session_start();
require '../../db/database.php';


function insertBook()
{
    global $conn;
    $currUserId = $_SESSION["id"];
    $spaceId = $_POST['choosen_id'];
    $startDate = $_COOKIE['rawStartDate'];
    $endDate = $_COOKIE['rawEndDate'];

    $insertQuery = "INSERT INTO user_books (user_id, space_id, start_date, end_date) VALUES('$currUserId', '$spaceId', '$startDate', '$endDate')";
    $conn->query($insertQuery);

    $updateSpace = "UPDATE spaces SET
    available=0
    WHERE id='$spaceId'";
    $conn->query($updateSpace);

    // $uuid = $spaceId;
    // $eventQuery = "CREATE EVENT IF NOT EXISTS test ON SCHEDULE AT $endDate
    // DO
    //     UPDATE spaces SET
    //     available=1
    //     WHERE id='$spaceId'";
    // $conn->query($eventQuery);

    header('Location: ../../index.php');
}

insertBook();
