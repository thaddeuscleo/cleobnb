<?php


require 'controllers/space/get_space.php';

$id = $_GET['id'];

list($data, $images, $amenities) = getById($id);

$location = $_COOKIE['location'];
$startDate = $_COOKIE['startDate'];
$endDate = $_COOKIE['endDate'];
$guessCount = $_COOKIE['guessCount'];
$basePrice = ($data['price'] + ($data['price'] * 15 / 100 * ($guessCount - 1))) * $_COOKIE['diff'];
$cleanService = $basePrice * 5 / 100;
$guessService = $basePrice * 8 / 100;
$totalPrice = $basePrice + $cleanService + $guessService;

function localizeCurrency($cash)
{
    return 'Rp' . (number_format($cash, 2, ',', '.'));
}
?>

<?php include "layouts/navigation.php"; ?>

<div class="book-page">
    <form action="controllers/space/book_space.php" class="form" method="POST">
        <h1>Book <?= $data['name']; ?> Stay Hosted By <?= $data['username'] ?></h1>
        <div class="form__price">
            <div>
                <p>Nights <b><?= $startDate ?> - <?= $endDate ?></b></p>
                <p>Number Of Guess <b><?= $guessCount ?></b></p>
                <p>Price /Night <b><?= localizeCurrency($data['price']) ?></b></p>
            </div>
            <div>
                <p>Guess Price <b><?= localizeCurrency($basePrice) ?> </b></p>
                <p>Cleaning Service <b><?= localizeCurrency($cleanService) ?></b></p>
                <p>Guess Service <b><?= localizeCurrency($guessService) ?></b></p>
                <p>Total <b><?= localizeCurrency($totalPrice) ?></b></p>
            </div>
            <input type="hidden" name="choosen_id" value="<?= $id ?>">
        </div>
        <div class="buttons">
            <a href="index.php">Back To Home</a>
            <button name="book">Book</button>
        </div>
    </form>
</div>


<script>

</script>

<?php include "layouts/footer.php"; ?>