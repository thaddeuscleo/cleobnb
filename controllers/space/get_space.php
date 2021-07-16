<?php
require 'db/database.php';

session_start();

function getById($id)
{
    global $conn;
    $spaceQuery = "SELECT * FROM spaces s JOIN users u ON s.user_id = u.id WHERE s.id = '$id'";
    $res = $conn->query($spaceQuery);
    $data = $res->fetch_assoc();
    $imageQuery = "SELECT image_path FROM space_images WHERE space_id = '$id'";
    $images = $conn->query($imageQuery);
    return array($data, $images);
}

function getAll()
{
    global $conn;
    $space_id = array();
    $imArr = array();
    $spaceQuery = "SELECT * FROM spaces";
    $spaces = $conn->query($spaceQuery);
    $count = $spaces->num_rows;
    foreach ($spaces as $space) {
        array_push($space_id, $space['id']);
    }
    for ($i = 0; $i < $count; $i++) {
        $imageQuery = "SELECT image_path FROM space_images WHERE space_id = '$space_id[$i]' LIMIT 1";
        $images = $conn->query($imageQuery);
        $data = $images->fetch_assoc();
        array_push($imArr, $data['image_path']);
    }
    return array($spaces, $imArr);
}
