<?php
require './register.php';
require './login.php';

session_start();

if (isset($_POST["sign_up"])) {
    register_user($user_role);
} else if (isset($_POST["log_in"])) {
    log_in();
} else if(isset($_POST["host_sign_up"])){
    register_user($host_role);
}
