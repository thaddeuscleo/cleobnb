<?php

require '../../db/database.php';

if (isset($_POST['delete_space'])) {
    global $conn;
    $id = $_POST['id'];
    $query = "DELETE FROM spaces WHERE id='$id'";
    $conn->query($query);
    header('Location: ../../manage_my_space.php');
}
