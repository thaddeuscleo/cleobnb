<?php
require './controllers/search/search.php';
list($results, $startDate, $endDate, $guess, $images) = searchHost();
$data = $results->fetch_assoc();
$count = 0;
?>

<?php include "layouts/navigation.php"; ?>


<div class="container search-result-header">
    <p class="mt-3"><?= $results->num_rows ?> stays | <?= $startDate ?> - <?= $endDate ?> | <?= $guess; ?> Guest</p>
    <h1>Stays in <?=$_GET['location']?></h1>
    <hr>
</div>

<div class="container search-result-flex">
    <?php if ($results->num_rows == 0) : ?>
        <div class="search-not-found">
            <h3>No Stay Available within <?= $startDate ?> - <?= $endDate ?> ¯\_(ツ)_/¯</h3>
        </div>
    <?php endif; ?>
    <?php foreach ($results as $result) : ?>
        <div class="search-result-container">
            <a href="space_detail.php?id=<?= $result['id'] ?>">
                <img src="uploads/<?= $images[$count] ?>" alt="">
            </a>
            <div class="search-result-container__text">
                <p><?= $result['place_type']; ?> in <?= $result['location']; ?></p>
                <a href="space_detail.php?id=<?= $result['id'] ?>">
                    <h3><?= $result['name'] ?></h3>
                </a>
                <hr>
                <p><?= $result['guess_count'] ?> guest - <?= $result['bedroom_count'] ?> Bedroom - <?= $result['bed_count'] ?> Bed</p>
            </div>
        </div>
        <hr class="search-result-divider">
        <?php $count++ ?>
    <?php endforeach; ?>
</div>

<?php include "layouts/footer.php"; ?>