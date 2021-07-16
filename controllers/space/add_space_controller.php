<?php
session_start();
require '../../db/database.php';

function get_add_room_data()
{
    return array(
        $_POST['space-name'],
        $_POST['start-date'],
        $_POST['end-date'],
        $_POST['location'],
        $_POST['about'],
        $_POST['bedroom-count'],
        $_POST['bed-count'],
        $_POST['bathroom-count'],
        $_POST['shower-count'],
        $_POST['bathub-count'],
        $_POST['place-type'],
        $_POST['guess-count']
    );
}

function uploadConvertImage($fileActualExt, $fileTmpName)
{
    $dir = "../../uploads/";
    $generated = uniqid('', true);
    $fileNewName =  $generated . "." . $fileActualExt;
    $filePath =  $dir . $fileNewName;
    move_uploaded_file($fileTmpName, $filePath);

    // Change To Webp
    // Mesti punya php_gd2".dll
    $webpName = $generated . "." . 'webp';
    if ($fileActualExt == 'png') {
        $img = imagecreatefrompng($filePath);
    } else if ($fileActualExt == 'jpeg' || $fileActualExt == 'jpg') {
        $img = imagecreatefromjpeg($filePath);
    }

    imagepalettetotruecolor($img);
    imagealphablending($img, true);
    imagesavealpha($img, true);
    imagewebp($img, $dir . $webpName, 100);
    imagedestroy($img);

    unlink($filePath);
    return $webpName;
}


function getUploadFile()
{
    $filenames = array();
    $fileCount = count($_FILES['images']['name']);

    for ($i = 0; $i < $fileCount; $i++) {
        $filename = $_FILES['images']['name'][$i];
        $fileTmpName = $_FILES['images']['tmp_name'][$i];
        $fileSize = $_FILES['images']['size'][$i];
        $fileError = $_FILES['images']['error'][$i];

        $fileExt = explode(".", $filename);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                //500 mb limit
                if ($fileSize < 5000000) {
                    $webpName = uploadConvertImage($fileActualExt, $fileTmpName);
                    array_push($filenames, $webpName);
                } else {
                    echo "file size error";
                    $_SESSION['upload_err'] = "File Size To Big!";
                    return null;
                }
            } else {
                echo "file error";
                $_SESSION['upload_err'] = "File Error!";
                return null;
            }
        } else {
            echo "file type error";
            $_SESSION['upload_err'] = "File Not Allowed";
            return null;
        }
    }
    return $filenames;
}

function insertSpace(
    $spaceName,
    $startDate,
    $endDate,
    $location,
    $about,
    $bedroomCount,
    $bedCount,
    $bathroomCount,
    $showerCount,
    $bathubCount,
    $placeType,
    $filenames,
    $guessCount
) {
    global $conn;
    $userId = $_SESSION['id'];
    $query = "INSERT INTO spaces (name, start_date, end_date, location, About, bedroom_count, bed_count, bathroom_count, shower_count, bathub_count, place_type, user_id, guess_count) VALUES( '$spaceName', '$startDate', '$endDate', '$location', '$about', '$bedroomCount', '$bedCount', '$bathroomCount', '$showerCount', '$bathubCount', '$placeType', '$userId', '$guessCount')";

    $insertResult = $conn->query($query);
    if ($insertResult) {
        $selectQuery = "SELECT id FROM spaces WHERE name = '$spaceName'";
        $res = $conn->query($selectQuery);
        $data = $res->fetch_array();
        $spaceId = $data['id'];

        foreach ($filenames as $file) {
            $inserImgQuery = "INSERT INTO space_images (image_path, space_id) VALUES('$file', '$spaceId')";
            $conn->query($inserImgQuery);
        }
    } else {
        echo "insert fail";
    }
    echo "done";
}

function validateField(
    $spaceName,
    $startDate,
    $endDate,
    $location,
    $bedroomCount,
    $bedCount,
    $bathroomCount,
    $showerCount,
    $bathubCount,
    $placeType,
    $guessCount
) {
    global $conn;
    $fileCount = count($_FILES['images']['name']);
    $startDateExp = explode('/', $startDate);
    $endDateExp = explode('/', $endDate);
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);

    $selectQuery = "SELECT id FROM cleobnb.spaces WHERE name = '$spaceName'";
    $res = $conn->query($selectQuery);

    if (strlen($spaceName) < 10 || $res['num_rows'] > 0) {
        $_SESSION["spaceName_err"] = "Space Name Must Be At Least 10 Character Long";
        return false;
    }

    if (checkdate($startDateExp[0], $startDateExp[1], $startDateExp[2])) {
        $_SESSION["startDate_err"] = "Start Date Invalid";
        return false;
    }

    if (checkdate($endDateExp[0], $endDateExp[1], $endDateExp[2])) {
        $_SESSION["startDate_err"] = "Start Date Invalid";
        return false;
    }

    if (checkdate($endDateExp[0], $endDateExp[1], $endDateExp[2])) {
        $_SESSION["startDate_err"] = "Start Date Invalid";
        return false;
    }

    if ($end < $start) {
        $_SESSION["dateRange_err"] = "Date Range Error";
        return false;
    }

    if (strlen($location) < 1) {
        $_SESSION['location_err'] = "Location Can't Be Empty";
        return false;
    }

    if ($guessCount < 1) {
        $_SESSION['guess_err'] = "Guess Can't Be Empty";
        return false;
    }

    if ($bedroomCount < 1) {
        $_SESSION['bedroom_err'] = "Bedroom can't be empty";
        return false;
    }

    if ($bedCount < 1) {
        $_SESSION['bed_err'] = "Bed can't be empty";
        return false;
    }

    if ($bathroomCount < 1) {
        $_SESSION['bathroom_err'] = "Bathroom can't be empty";
        return false;
    }

    if ($showerCount < 1) {
        $_SESSION['shower_err'] = "Shower can't be empty";
        return false;
    }

    if ($bathubCount < 1) {
        $_SESSION['bathub_err'] = "Bathub can't be empty";
        return false;
    }

    if (strlen($placeType) < 1) {
        $_SESSION['placeType_err'] = "Place Type Can't be empty";
        return false;
    }

    if ($fileCount < 1) {
        $_SESSION['image_err'] = "Please Insert At least one image";
        return false;
    }
    return true;
}

if (isset($_POST['add_space'])) {
    list(
        $spaceName,
        $startDate,
        $endDate,
        $location,
        $about,
        $bedroomCount,
        $bedCount,
        $bathroomCount,
        $showerCount,
        $bathubCount,
        $placeType,
        $guessCount
    ) = get_add_room_data();

    $isValid = validateField(
        $spaceName,
        $startDate,
        $endDate,
        $location,
        $bedroomCount,
        $bedCount,
        $bathroomCount,
        $showerCount,
        $bathubCount,
        $placeType,
        $guessCount
    );

    $filenames = getUploadFile();
    $fileCount = count($_FILES['images']['name']);
    if (count($filenames) == $fileCount) {
        echo "insert";
        insertSpace(
            $spaceName,
            $startDate,
            $endDate,
            $location,
            $about,
            $bedroomCount,
            $bedCount,
            $bathroomCount,
            $showerCount,
            $bathubCount,
            $placeType,
            $filenames,
            $guessCount
        );
        header('Location: ../../manage_my_space.php');
    } else {
        echo "error";
    }
}
