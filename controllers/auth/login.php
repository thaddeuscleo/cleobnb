<?php
require '../../db/database.php';

session_start();

function get_log_in_post()
{
    return array($_POST["email"], $_POST["password"]);
}

function isEmpty($str)
{
    if (strlen($str) < 1) {
        return true;
    }
    return false;
}

function validate_user($email, $password)
{
    global $conn;
    $query = "SELECT username,role,id FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['log_in'] = true;
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $data['username'];
        $_SESSION["role"] = $data['role'];
        $_SESSION["id"] = $data['id'];
        return true;
    } else {
        header("HTTP/1.1 401 Unauthorized");
        return false;
    }
}

function validate_field($email, $password)
{
    $_SESSION["err"] = true;
    if (isEmpty($email)) {
        $_SESSION["username_err"] = "Email must be field";
        return false;
    }
    if (isEmpty($password)) {
        $_SESSION["password_err"] = "Password must be field";
        return false;
    }
    if (!validate_user($email, $password)) {
        $_SESSION["user_err"] = "Invalid email or password";
        return false;
    }
    $_SESSION["err"] = false;
    return true;
}

function log_in()
{
    list($email, $password) = get_log_in_post();
    $is_valid = validate_field($email, $password);
    if ($is_valid) {
        if ($_SESSION['role'] == 1) {
            header('Location: ../../manage_my_space.php');
        }else {
            header('Location: ../../index.php');
        }
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
