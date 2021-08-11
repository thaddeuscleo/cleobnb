<?php

// TODO: Get all required data here\
// TODO: Fill the all form with recorded data in the database
// You can ignore image not filled when the page is loaded

?>

<?php include "layouts/navigation.php"; ?>

<div class="add_room_container">

    <div class="header">
        <h1>Update Space</h1>
    </div>

    <form action="controllers/space/update_space_controller.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <h2>What's Your Space Name</h2>
            <input type="text" placeholder="Space Name" value="">
            <h4>Availablelity Date</h4>
            <div class="date-start-end">
                <h5>Start</h5>
                <input type="date" id="" value="">
                <h5>End</h5>
                <input type="date" id="" value="">
            </div>
            <h4>Location</h4>
            <div class="date-start-end">
                <input type="text" id="" placeholder="location" value="">
            </div>
            <h4>Price</h4>
            <div class="date-start-end">
                <input type="number" id="" placeholder="price" value="">
            </div>
            <h4>About</h4>
            <div class="date-start-end">
                <textarea id="" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class="form-group">
            <h2>More About Your Space</h2>

            <h4>Guess Capacity</h4>
            <div class="date-start-end">
                <input type="number" id="" value="">
            </div>

            <h4>Bed Room</h4>
            <div class="date-start-end">
                <h5>Number Of Bedroom</h5>
                <input type="number" id="" value="">
                <h5>Number Of Beds</h5>
                <input type="number" id="" value="">
            </div>

            <h4>Bath Room</h4>
            <div class="date-start-end">
                <h5>Number Of Bath Room</h5>
                <input type="number" id="" value="">
                <h5>Bathroom with shower</h5>
                <input type="number" id="" value="">
                <h5>Bathroom bathtub</h5>
                <input type="number" id="" value="">
            </div>

            <h4>Place Type</h4>
            <div class="date-start-end">
                <select id="">
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
                        <input type="checkbox" id="">
                        <div>
                            <span class="material-icons">
                                restaurant
                            </span>
                            <p>Kitchen</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" id="">
                        <div>
                            <span class="material-icons">
                                directions_car
                            </span>
                            <p>Free Parking</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" id="">
                        <div>
                            <span class="material-icons">
                                pets
                            </span>
                            <p>Pets Allowed</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" id="">
                        <div>
                            <span class="material-icons">
                                wifi
                            </span>
                            <p>Wifi</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" id="">
                        <div>
                            <span class="material-icons">
                                local_florist
                            </span>
                            <p>Backyard</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" id="">
                        <div>
                            <span class="material-icons">
                                videocam
                            </span>
                            <p>Security Camera</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" id="">
                        <div>
                            <span class="material-icons">
                                hot_tub
                            </span>
                            <p>Hot Tub</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" id="">
                        <div>
                            <span class="material-icons">
                                lens
                            </span>
                            <p>Smoke Alarm</p>
                        </div>
                    </div>
                    <div class="amenities-container__item">
                        <input type="checkbox" id="">
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
                <input type="file" id="" multiple>
            </div>
        </div>

        <input type="number" value="1" hidden>

        <button>Confirm Update This Space</button>
    </form>
</div>

<?php include "layouts/footer.php"; ?>