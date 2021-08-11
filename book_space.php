<?php

// TODO: Fetch all required data according to the selected space bu the user
// TODO: Calculate the price with the formula that has been provided  

function localizeCurrency($cash)
{
    // TODO: return indonesia currency format 
    return 'Rp' . (number_format($cash, 2, ',', '.'));
}
?>

<?php include "layouts/navigation.php"; ?>

<div class="book-page">
    <form action="" class="form" method="POST">
        <!-- TODO: Show the space and the owner name -->
        <h1>Book Hanran Stay Hosted By NITH</h1>
        <div class="form__price">
            <div>
                <!-- TODO: Show the booking start date and end date-->
                <p>Nights <b>10 Aug - 11 Aug</b></p>
                <!-- TODO: Show the number of guess that are going to book this stay -->
                <p>Number Of Guess <b>2</b></p>
                <!-- TODO: Show the base price of this space for every night -->
                <p>Price /Night <b>10</b></p>
            </div>
            <div>
                <!-- TODO: Show the guess price -->
                <p>Guess Price <b>Rp. 100.000,00 </b></p>
                <!-- TODO: Show the cleaning service price -->
                <p>Cleaning Service <b>Rp. 100.000,00</b></p>
                <!-- TODO: Show the guess service price -->
                <p>Guess Service <b>Rp. 100.000,00</b></p>
                <!-- TODO: Show the total price -->
                <p>Total <b>Rp. 100.000,00</b></p>
            </div>
            <input type="hidden" name="choosen_id" value="1">
        </div>
        <div class="buttons">
            <a href="index.php">Back To Home</a>
            <button name="book">Book</button>
        </div>
    </form>
</div>

<?php include "layouts/footer.php"; ?>