<?php

require 'controllers/space/get_space.php';

$id = $_GET['id'];

list($data, $images, $amenities) = getById($id);
// echo "<pre>" . var_export($data, true) . "</pre>"
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
    <!-- TODO: Show update and delete button log in as a host -->
    <!-- TODO: Show book button when log in as a user -->
    <?php if (isset($_SESSION['role'])) : ?>
        <?php if ($_SESSION['role'] == 1 && $_SESSION['username'] == $data['username']) : ?>
            <div class="buttons">
                <a href="update_space.php?id=<?= $id ?>" class="btn update">Update</a>
                <a href="delete_space.php?id=<?= $id ?>" class="btn delete">Delete</a>
            </div>
        <?php endif; ?>
        <?php if ($_SESSION['role'] == 0) : ?>
            <div class="buttons">
                <a href="book_space.php?id=<?= $id ?>" class="btn delete">Book</a>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <div class="buttons">
            <a href="signUp.php" class="btn delete">Sign Up To Book</a>
        </div>
    <?php endif; ?>
</div>

<div class="container detail-image-container">

    <!-- TODO: Show Arrow Button when image more than one -->
    <?php if ($images->num_rows > 1) : ?>
        <div class="button">
            <span class="material-icons" id="prev">
                chevron_left
            </span>
        </div>
    <?php endif; ?>

    <!-- TODO: Show Image(s) Here -->
    <?php foreach ($images as $image) : ?>
        <img src="uploads/<?= $image['image_path'] ?>" alt="" class="space-image">
    <?php endforeach; ?>

    <!-- TODO: Show Arrow Button when image more than one -->
    <?php if ($images->num_rows > 1) : ?>
        <div class="button">
            <span class="material-icons" id="next">
                chevron_right
            </span>
        </div>
    <?php endif; ?>

</div>

<div class="container detail-owner-container">
    <!-- TODO: Show place type and who hosted the space -->
    <h3><?= $data['place_type']; ?> hosted by <?= $data['username']; ?></h3>
    <!-- TODO: Show how much guess - bedroom - bed - bathroom -->
    <p><?= $data['guess_count']; ?> guest · <?= $data['bedroom_count']; ?> bedroom · <?= $data['bed_count']; ?> bed · <?= $data['bathroom_count']; ?> private bath</p>
    <hr>
</div>

<div class="container detail-offer-container">
    <h4>About this space</h4>
    <!-- TODO: Show About this place -->
    <?php if (!isset($data['about'])) : ?>
        <p>-</p>
    <?php else : ?>
        <p><?= $data['about']; ?></p>
    <?php endif; ?>
    <hr>
</div>

<div class="container bed-room-detail">
    <h4>Bedroom(s)</h4>
    <div class="icon-con">
        <div class="item">
            <span class="material-icons">
                dark_mode
            </span>
            <!-- TODO: Show bedroom count -->
            <p>Bedroom(s) <b><?= $data['bedroom_count'] ?></b></p>
        </div>
        <div class="item">
            <span class="material-icons">
                single_bed
            </span>
            <!-- TODO: Show bed count -->
            <p>Bed(s) <b><?= $data['bed_count'] ?></b></p>
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
            <!-- TODO: Show bathroom count -->
            <p>Bedroom(s) <b><?= $data['bathroom_count'] ?></b></p>
        </div>
        <div class="item">
            <span class="material-icons">
                shower
            </span>
            <!-- TODO: show shower count -->
            <p>Shower(s) <b><?= $data['shower_count'] ?></b></p>
        </div>
        <div class="item">
            <span class="material-icons">
                bathtub
            </span>
            <!-- TODO: show bathub count -->
            <p>Bathub(s) <b><?= $data['bathub_count'] ?></b></p>
        </div>
    </div>
    <hr>
</div>

<div class="container bed-room-detail">
    <h4>Amenities(s)</h4>
    <div class="icon-con">

        <!-- TODO: Show amenities -->
        <?php if ($amenities['kitchen'] == 1) : ?>
            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        restaurant
                    </span>
                    <p>Kitchen</p>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($amenities['free_parking'] == 1) : ?>
            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        directions_car
                    </span>
                    <p>Free Parking</p>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($amenities['pets_allowed'] == 1) : ?>
            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        pets
                    </span>
                    <p>Pets Allowed</p>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($amenities['wifi'] == 1) : ?>
            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        wifi
                    </span>
                    <p>Wifi</p>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($amenities['backyard'] == 1) : ?>
            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        local_florist
                    </span>
                    <p>Backyard</p>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($amenities['security_camera'] == 1) : ?>
            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        videocam
                    </span>
                    <p>Security Camera</p>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($amenities['hot_tub'] == 1) : ?>
            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        hot_tub
                    </span>
                    <p>Hot Tub</p>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($amenities['smoke_alarm'] == 1) : ?>
            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        lens
                    </span>
                    <p>Smoke Alarm</p>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($amenities['dedicated_workspace'] == 1) : ?>
            <div class="amenities-item">
                <div>
                    <span class="material-icons">
                        cases
                    </span>
                    <p>Dedicated Workspace</p>
                </div>
            </div>
        <?php endif; ?>

    </div>
    <hr>
</div>

<?php include "layouts/footer.php"; ?>

<?php if ($images->num_rows > 1) : ?>
    <script>
        const imageElement = document.getElementsByClassName('space-image');
        const prevElement = document.getElementById('prev');
        const nextElement = document.getElementById('next');

        let imgElements = Array.from(imageElement);
        imgElements.forEach(element => {
            element.style.display = "none";
        });

        let curr_img = 0;
        let total_img = imgElements.length - 1;
        imgElements[curr_img].style.display = "block";

        // TODO: Slide to the previous image
        prevElement.addEventListener('click', () => {
            imgElements[curr_img].style.display = "none";
            curr_img--;
            if (curr_img < 0) {
                curr_img = total_img;
            }
            console.log(curr_img);
            imgElements[curr_img].style.display = "block";
        })

        // TODO: Slide to the next image
        nextElement.addEventListener('click', () => {
            imgElements[curr_img].style.display = "none";
            curr_img++;
            if (curr_img > total_img) {
                curr_img = 0;
            }
            console.log(curr_img);
            imgElements[curr_img].style.display = "block";
        })
    </script>
<?php endif; ?>