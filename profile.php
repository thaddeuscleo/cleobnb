<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>

<?php include "layouts/navigation.php"; ?>

<div class="profile-page">
    <form action="controllers/auth/logout.php" class="form" method="POST">
        <h1>My Profile</h1>
        <p>What You Wanna Do <?= $_SESSION['username'] ?> ?</p>
        <div class="buttons">
            <a href="index.php">Back To Home</a>
            <button>Log Out</button>
        </div>
    </form>
</div>

<?php include "layouts/footer.php"; ?>