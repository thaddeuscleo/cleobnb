<?php
// TODO: Fetch all the the required data here
?>

<?php include "layouts/navigation.php"; ?>


<div class="container search-result-header">
    
    <p class="mt-3"><!-- TODO: Show how much stays available --> stays | <!-- TODO: Show the user the start and end date the user filled --> | <!-- TODO: Show the number of guess the user filled --> Guest</p>
    <h1>Stays in <!-- TODO: Show the location that the user choose  --></h1>
    <hr>
</div>

<div class="container search-result-flex">
    <!-- TODO: Show no stays available when there is no space available -->
    <div class="search-not-found">
        <h3>No Stay Available within <!-- TODO: Show start date --> - <!-- TODO: Show end date --> ¯\_(ツ)_/¯</h3>
    </div>

    <!-- TODO: Show all the available space -->
    <!-- LOOP STARTS HERE -->
    <div class="search-result-container">
        <a href="space_detail.php?id=1">
            <!-- TODO: Show the first image for the space -->
            <img src="uploads/" alt="">
        </a>
        <div class="search-result-container__text">
            <p><!-- TODO: Show the place type --> in <!-- TODO: Show the space location --></p>
            <a href="space_detail.php?id=1">
                <h3><!-- TODO: Show the space name --></h3>
            </a>
            <hr>
            <p><!-- TODO: Show the space maximum guess capacity --> guest - <!-- TODO: Show number of bedroom from the space --> Bedroom - <!-- TODO: Show number of bed from the space --></p>
        </div>
    </div>
    <hr class="search-result-divider">
    <!-- LOOP ENDS HERE -->

</div>

<?php include "layouts/footer.php"; ?>