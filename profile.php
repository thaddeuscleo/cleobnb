<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>

<?php include "layouts/navigation.php"; ?>

<img src="" alt="">

<?php include "layouts/footer.php"; ?>