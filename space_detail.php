<?php

require 'controllers/space/get_space.php';

$id = $_GET['id'];

list($data, $images) = getById($id);
// echo "<pre>" . var_export($data, true) . "</pre>"
?>


<?php include "layouts/navigation.php"; ?>

<div class="container detail-header-container">
    <div class="text">
        <h4><?= $data['name']; ?></h4>
        <div>
            <p><?= $data['location']; ?></p>
        </div>
    </div>
    <?php if (isset($_SESSION['role'])) : ?>
        <?php if ($_SESSION['role'] == 1) : ?>
            <div class="buttons">
                <a href="" class="btn update">Update</a>
                <a href="" class="btn delete">Delete</a>
            </div>
        <?php endif; ?>
        <?php if ($_SESSION['role'] == 0) : ?>
            <div class="buttons">
                <a href="" class="btn delete">Book</a>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <div class="buttons">
            <a href="signUp.php" class="btn delete">Sign Up To Book</a>
        </div>
    <?php endif; ?>
</div>

<div class="container detail-image-container">
    <?php if ($images->num_rows > 1) : ?>
        <div class="button">
            <span class="material-icons" id="prev">
                chevron_left
            </span>
        </div>
    <?php endif; ?>
    <?php foreach ($images as $image) : ?>
        <img src="uploads/<?= $image['image_path'] ?>" alt="" class="space-image">
    <?php endforeach; ?>
    <?php if ($images->num_rows > 1) : ?>
        <div class="button">
            <span class="material-icons" id="next">
                chevron_right
            </span>
        </div>
    <?php endif; ?>
</div>

<div class="container detail-owner-container">
    <h3><?= $data['place_type']; ?> hosted by <?= $data['username']; ?></h3>
    <p><?= $data['guess_count']; ?> guest · <?= $data['bedroom_count']; ?> bedroom · <?= $data['bed_count']; ?> bed · <?= $data['bathroom_count']; ?> private bath</p>
    <hr>
</div>

<div class="container detail-offer-container">
    <h4>Space Offer</h4>
    <?php if (strlen($data['About']) < 1) : ?>
        <p>No Offers Offered From The Host</p>
    <?php else : ?>
        <p><?= $data['About']; ?></p>
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
            <p>Bedroom(s) <b><?= $data['bedroom_count'] ?></b></p>
        </div>
        <div class="item">
            <span class="material-icons">
                single_bed
            </span>
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
            <p>Bedroom(s) <b><?= $data['bathroom_count'] ?></b></p>
        </div>
        <div class="item">
            <span class="material-icons">
                shower
            </span>
            <p>Shower(s) <b><?= $data['shower_count'] ?></b></p>
        </div>
        <div class="item">
            <span class="material-icons">
                bathtub
            </span>
            <p>Bathub(s) <b><?= $data['bathub_count'] ?></b></p>
        </div>
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

        prevElement.addEventListener('click', () => {
            imgElements[curr_img].style.display = "none";
            curr_img--;
            if (curr_img < 0) {
                curr_img = total_img;
            }
            console.log(curr_img);
            imgElements[curr_img].style.display = "block";
        })

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