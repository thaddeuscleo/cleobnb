<?php

// TODO: Fetch all required data here
?>


<?php include "layouts/navigation.php"; ?>

<div class="container detail-header-container">
    <div class="text">
        <!-- TODO: Show space name -->
        <h4><?= $data['name']; ?></h4>
        <div>
            <!-- TODO: Show location -->
            <p><?= $data['location']; ?></p>
        </div>
    </div>
    <!-- TODO: Show sign up to book when the guess visit this page -->
    <!-- TODO: Show update and delete button when logged in as a host -->
    <!-- TODO: Show book button when logged in as a normal user -->
    <div class="buttons">
        <a href="update_space.php?id=1" class="btn update">Update</a>
        <a href="delete_space.php?id=1" class="btn delete">Delete</a>
    </div>
</div>

<div class="container detail-image-container">

    <!-- TODO: Show Arrow Button when image more than one -->
    <div class="button">
        <span class="material-icons" id="prev">
            chevron_left
        </span>
    </div>
    

    <!-- TODO: Show Image(s) Here -->
    <img src="uploads/<?= $image['image_path'] ?>" alt="" class="space-image">
    

    <!-- TODO: Show Arrow Button when image more than one -->
    <div class="button">
        <span class="material-icons" id="next">
            chevron_right
        </span>
    </div>

</div>

<div class="container detail-owner-container">
    <!-- TODO: Show place type and who hosted the space -->
    <h3>PLACE TYPE hosted by HOST</h3>
    <!-- TODO: Show how much guess - bedroom - bed - bathroom -->
    <p>37 guest · 37 bedroom · 37 bed · 37 private bath</p>
    <hr>
</div>

<div class="container detail-offer-container">
    <h4>About this space</h4>
    <!-- TODO: Show About this place, if it's empty show '-' -->
        <p>-</p>
    <hr>
</div>

<div class="container bed-room-detail">
    <h4>Bedroom(s)</h4>
    <div class="icon-con">
        <div class="item">
            <span class="material-icons">
                dark_mode
            </span>
            <p>Bedroom(s) <b><!-- TODO: Show number of bedroom --></b></p>
        </div>
        <div class="item">
            <span class="material-icons">
                single_bed
            </span>
            <p>Bed(s) <b><!-- TODO: Show number of bed --></b></p>
        </div>
    </div>
    <hr>
</div>


<div class="container bed-room-detail">
    <h4>Bathroom(s)</h4>
    <div class="icon-con">
        <div class="item">
            <span class="material-icons">
                bathroom
            </span>
            <p>Bedroom(s) <b><!-- TODO: Show number of bathroom --></b></p>
        </div>
        <div class="item">
            <span class="material-icons">
                shower
            </span>
            <p>Shower(s) <b><!-- TODO: show number of shower --></b></p>
        </div>
        <div class="item">
            <span class="material-icons">
                bathtub
            </span>
            
            <p>Bathub(s) <b><!-- TODO: show number of bathub --></b></p>
        </div>
    </div>
    <hr>
</div>

<div class="container bed-room-detail">
    <h4>Amenities(s)</h4>
    <div class="icon-con">

        <!-- TODO: Show amenities available -->
            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        restaurant
                    </span>
                    <p>Kitchen</p>
                </div>
            </div>

            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        directions_car
                    </span>
                    <p>Free Parking</p>
                </div>
            </div>

            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        pets
                    </span>
                    <p>Pets Allowed</p>
                </div>
            </div>


            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        wifi
                    </span>
                    <p>Wifi</p>
                </div>
            </div>


            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        local_florist
                    </span>
                    <p>Backyard</p>
                </div>
            </div>



            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        videocam
                    </span>
                    <p>Security Camera</p>
                </div>
            </div>


            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        hot_tub
                    </span>
                    <p>Hot Tub</p>
                </div>
            </div>


            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        lens
                    </span>
                    <p>Smoke Alarm</p>
                </div>
            </div>


            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        cases
                    </span>
                    <p>Dedicated Workspace</p>
                </div>
            </div>

    </div>
    <hr>
</div>

<?php include "layouts/footer.php"; ?>
<!-- TODO: When the image is more than one, show this script -->
    <script>
        const imageElement = document.getElementsByClassName('space-image');
        const prevElement = document.getElementById('prev');
        const nextElement = document.getElementById('next');

        // TODO: Slide to the previous image
        

        // TODO: Slide to the next image
        
    </script>