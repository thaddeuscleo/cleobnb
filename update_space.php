<?php

require 'controllers/space/get_space.php';

$id = $_GET['id'];
list($space, $images, $amenities) = getById($id);
// echo "<pre>".var_export($amenities, true)."</pre>"

?>

<?php include "layouts/navigation.php"; ?>

<div class="add_room_container">

    <div class="header">
        <h1>Update Space</h1>
    </div>

    <form action="controllers/space/update_space_controller.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <h2>What's Your Space Name</h2>
            <input type="text" placeholder="Space Name" name="space-name" value="<?= $space['name'] ?>">
            <h4>Availablelity Date</h4>
            <div class="date-start-end">
                <h5>Start</h5>
                <input type="date" name="start-date" id="" value="<?= $space['start_date'] ?>">
                <h5>End</h5>
                <input type="date" name="end-date" id="" value="<?= $space['end_date'] ?>">
            </div>
            <h4>Location</h4>
            <div class="date-start-end">
                <input type="text" name="location" id="" placeholder="location" value="<?= $space['location'] ?>">
            </div>
            <h4>Price</h4>
            <div class="date-start-end">
                <input type="number" name="price" id="" placeholder="price" value="<?= $space['price'] ?>">
            </div>
            <h4>About</h4>
            <div class="date-start-end">
                <textarea name="about" id="" cols="30" rows="10"><?= $space['about'] ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <h2>More About Your Space</h2>

            <h4>Guess Capacity</h4>
            <div class="date-start-end">
                <input type="number" name="guess-count" id="" value="<?= $space['guess_count'] ?>">
            </div>

            <h4>Bed Room</h4>
            <div class="date-start-end">
                <h5>Number Of Bedroom</h5>
                <input type="number" name="bedroom-count" id="" value="<?= $space['bedroom_count'] ?>">
                <h5>Number Of Beds</h5>
                <input type="number" name="bed-count" id="" value="<?= $space['bed_count'] ?>">
            </div>

            <h4>Bath Room</h4>
            <div class="date-start-end">
                <h5>Number Of Bath Room</h5>
                <input type="number" name="bathroom-count" id="" value="<?= $space['bathroom_count'] ?>">
                <h5>Bathroom with shower</h5>
                <input type="number" name="shower-count" id="" value="<?= $space['shower_count'] ?>">
                <h5>Bathroom bathtub</h5>
                <input type="number" name="bathub-count" id="" value="<?= $space['bathub_count'] ?>">
            </div>

            <h4>Place Type</h4>
            <div class="date-start-end">
                <select name="place-type" id="">
                    <option value="private_room">Private Room</option>
                    <option value="hotel_room">Hotel Room</option>
                    <option value="entire_place">Entire Place</option>
                    <option value="shared_room">Shared Room</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <h2>Show What Your Space Offers</h2>
            <div class="date-start-end">
                <h4>Amenities</h4>
                <div class="amenities-container">
                    <div class="amenities-container__item">
                        <input type="checkbox" name="kitchen" id="" <?php echo (($amenities['kitchen'] == 1) ? "checked" : "") ?>>
                        <div>
                            <span class="material-icons">
                                restaurant
                            </span>
                            <p>Kitchen</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" name="free-parking" id="" <?php echo (($amenities['free_parking'] == 1) ? "checked" : "") ?>>
                        <div>
                            <span class="material-icons">
                                directions_car
                            </span>
                            <p>Free Parking</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" name="pets-allowed" id="" <?php echo (($amenities['pets_allowed'] == 1 ? "checked" : "")) ?>>
                        <div>
                            <span class="material-icons">
                                pets
                            </span>
                            <p>Pets Allowed</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" name="wifi" id="" <?php echo (($amenities['wifi'] == 1 ? "checked" : "")) ?>>
                        <div>
                            <span class="material-icons">
                                wifi
                            </span>
                            <p>Wifi</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" name="backyard" id="" <?php echo (($amenities['backyard'] == 1 ? "checked" : "")) ?>>
                        <div>
                            <span class="material-icons">
                                local_florist
                            </span>
                            <p>Backyard</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" name="security-camera" id="" <?php echo (($amenities['security_camera'] == 1 ? "checked" : "")) ?>>
                        <div>
                            <span class="material-icons">
                                videocam
                            </span>
                            <p>Security Camera</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" name="hot-tub" id="" <?php echo (($amenities['hot_tub'] == 1 ? "checked" : "")) ?>>
                        <div>
                            <span class="material-icons">
                                hot_tub
                            </span>
                            <p>Hot Tub</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" name="smoke-alarm" id="" <?php echo (($amenities['smoke_alarm'] == 1 ? "checked" : "")) ?>>
                        <div>
                            <span class="material-icons">
                                lens
                            </span>
                            <p>Smoke Alarm</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" name="dedicated-workspace" id="" <?php echo (($amenities['dedicated_workspace'] == 1 ? "checked" : "")) ?>>
                        <div>
                            <span class="material-icons">
                                cases
                            </span>
                            <p>Dedicated Workspace</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h2>Show How Your Space Look Like</h2>
            <div class="date-start-end">
                <h5>Upload Image Here</h5>
                <input type="file" name="images[]" id="" multiple>
            </div>
        </div>

        <input type="number" value="<?= $id ?>" name="id" hidden>

        <button name="update_space">Confirm Update This Space</button>
    </form>
</div>

<?php include "layouts/footer.php"; ?>