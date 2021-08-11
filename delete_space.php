<?php

// TODO: Make sure only host can access this page
?>

<?php include "layouts/navigation.php"; ?>

<div class="delete-page">
    <form action="" class="form" method="POST">
        <h1>Delete Space</h1>
        <p>Are you sure wanna delete this space ?</p>
        <div class="buttons">
            <a href="manage_my_space.php">Back</a>
            <button>Delete</button>
        </div>
        <input type="text" value="1" hidden>
    </form>
</div>

<?php include "layouts/footer.php"; ?>