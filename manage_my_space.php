<?php

// TODO: Fetch all data required data here

// TODO: Make sure only admin can access this page

?>

<?php include "layouts/navigation.php"; ?>

<div class="container_manage_rooms">
    <div class="header">
        <h1>My Rooms</h1>
        <a href="add_space.php">Add Rooms</a>
    </div>
    <div class="all-rooms">
        <!-- TODO: Show available space according to the search  -->
        <!-- Loop Start here -->
        <div class="row">
            <!-- TODO: link the page to the detail page -->
            <a href="space_detail.php?id=1">
                <!-- TODO: Show the uploaded image from the upload folder -->
                <img src="uploads/" alt="">
            </a>
            <h4>Hanran Residence</h4>
        </div>
        <!-- Loop End here -->
    </div>
</div>

<?php include "layouts/footer.php"; ?>