<?php
require '../../db/database.php';

session_start();

$user_role = 0;
$host_role = 1;

function get_post_data()
{
    return array($_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirm_password"]);
}

function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return substr($haystack, 0, $length) === $needle;
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if (!$length) {
        return true;
    }
    return substr($haystack, -$length) === $needle;
}

function validate_email($email)
{
    global $conn;
    $selQuery = "SELECT id FROM users WHERE email LIKE '$email'";
    $res = $conn->query($selQuery)->fetch_assoc();
    
    if(isset($res)){
        $_SESSION["email_err"] = "Email already been taken by another user";
        return false;
    }
    if (strlen($email) <= 0) {
        $_SESSION["email_err"] = "Invalid email address";
        return false;
    }
    if (strpos($email, '@.') !== false) {
        $_SESSION["email_err"] = "Invalid email address";
        return false;
    }
    if (strpos($email, '.@') !== false) {
        $_SESSION["email_err"] = "Invalid email address";
        return false;
    }
    if (startsWith($email, '.com')) {
        $_SESSION["email_err"] = "Invalid email address";
        return false;
    }
    if (!endsWith($email, '.com')) {
        $_SESSION["email_err"] = "Invalid email address";
        return false;
    }
    return true;
}

function validate_register_form($username, $email, $password, $confirm_password)
{
    $_SESSION["err"] = true;
    if (is_null($username) || strlen($username) <= 0) {
        $_SESSION["username_err"] = "Username cannot be empty";
        return false;
    }
    if (is_null($email) || !validate_email($email)) {
        return false;
    }
    if (is_null($password) || strlen($password) < 8) {
        $_SESSION["password_err"] = "Password minimal 8 characters long";
        return false;
    }
    if (is_null($confirm_password) || $password !== $confirm_password) {
        $_SESSION["confirm_err"] = "Confirm doesn't match";
        return false;
    }
    $_SESSION["err"] = false;
    return true;
}

function insert_user($username, $email, $password)
{
    global $conn, $user_role;
    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$user_role')";
    $is_succuess = $conn->query($query);
    if (!$is_succuess) {
        echo ($conn->error);
    } else {
        header('Location: ../../index.php');
    }
}

function insert_host($username, $email, $password)
{
    global $conn, $host_role;
    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$host_role')";
    $is_succuess = $conn->query($query);
    if (!$is_succuess) {
        echo ($conn->error);
    } else {
        header('Location: ../../index.php');
    }
}

function register_user($role)
{
    list($username, $email, $password, $confirm_password) = get_post_data();
    $is_valid = validate_register_form($username, $email, $password, $confirm_password);
    if ($is_valid) {
        if($role == 0){
            insert_user($username, $email, $password);
        }else {
            insert_host($username, $email, $password);
        }
    } else {
        header('Location: ../../signUp.php');
    }
}
