<?php
require 'db/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getById($id)
{
    global $conn;
    $spaceQuery = "SELECT * FROM spaces s JOIN users u ON s.user_id = u.id WHERE s.id = '$id'";
    $res = $conn->query($spaceQuery);
    $data = $res->fetch_assoc();
    $imageQuery = "SELECT image_path FROM space_images WHERE space_id = '$id'";
    $images = $conn->query($imageQuery);
    $amenitiesQuery = "SELECT * FROM amenities WHERE space_id = '$id'";
    $amenities = $conn->query($amenitiesQuery)->fetch_assoc();
    return array($data, $images, $amenities);
}

function getAll()
{
    global $conn;
    $space_id = array();
    $imArr = array();
    $id = $_SESSION['id'];
    $spaceQuery = "SELECT * FROM spaces WHERE user_id = '$id'";
    $spaces = $conn->query($spaceQuery);
    $count = $spaces->num_rows;

    foreach ($spaces as $space) {
        array_push($space_id, $space['id']);
    }

    for ($i = 0; $i < $count; $i++) {
        $imageQuery = "SELECT image_path FROM space_images WHERE space_id = '$space_id[$i]' LIMIT 1";
        $images = $conn->query($imageQuery);
        $data = $images->fetch_assoc();
        if(isset($data['image_path'])){
            array_push($imArr, $data['image_path']);
        }
    }
    return array($spaces, $imArr);
}
