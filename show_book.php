<?php
require './db/database.php';

$selQuery = "SELECT s.name, ub.start_date, ub.end_date FROM user_books ub JOIN spaces s ON ub.space_id = s.id";
$rows = $conn->query($selQuery);
$res = [];
while($data = $rows->fetch_assoc()){
    $res[] = $data;
}
// echo "<pre>" . var_export($res, true) . "</pre>"
?>

<?php include "layouts/navigation.php"; ?>

<div class="show_book-page">
    <h1 class="header">My Booking</h1>
    <?php foreach ($res as $r) : ?>
        <div class="card">
            <p><?=$r['name']?></p>
            <div>
                <p>Start Date: <?=$r['start_date']?></p>
                <p>End Date: <?=$r['end_date']?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include "layouts/footer.php"; ?>