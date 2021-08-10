<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['role'] != 1) {
    header('Location: ../../host_register.php');
}

$id = $_GET['id'];

?>

<?php include "layouts/navigation.php"; ?>

<div class="delete-page">
    <form action="controllers/space/delete_space_controller.php" class="form" method="POST">
        <h1>Delete Space</h1>
        <p>Are you sure wanna delete this space ?</p>
        <div class="buttons">
            <a href="manage_my_space.php">Back</a>
            <button name="delete_space">Delete</button>
        </div>
        <input type="text" name="id" value="<?= $id ?>" hidden>
    </form>
</div>

<?php include "layouts/footer.php"; ?>