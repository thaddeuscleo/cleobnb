<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['role'] != 1) {
    header('Location: ../../host_register.php');
}

include 'controllers/space/get_space.php';

list($spaces, $images) = getAll();
$count = 0;
?>

<?php include "layouts/navigation.php"; ?>

<div class="container_manage_rooms">
    <div class="header">
        <h1>My Spaces</h1>
        <a href="add_space.php">Add Space</a>
    </div>
    <div class="all-rooms">
        <!-- TODO: Show available space according to the search  -->
        <?php foreach ($spaces as $space) : ?>
            <div class="row">
                <a href="space_detail.php?id=<?= $space['id']; ?>">
                    <img src="uploads/<?= $images[$count] ?>" alt="">
                </a>
                <h4><?= $space['name'] ?></h4>
            </div>
            <?php $count++; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php include "layouts/footer.php"; ?>