<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CleoBnb</title>
    <link rel="stylesheet" href="scss/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <nav>
        <div class="container">
            <div class="nav__logo">
                <a href="../index.php">
                    <img src="images/airbnb.svg" alt="logo">
                </a>
            </div>
            <div class="nav__search-input">
                <input type="text" id="search_box">
                <button>
                    <span class="material-icons">
                        search
                    </span>
                </button>
            </div>
            <div class="nav__user-buttons">
                <button class="nav__user-buttons__become-host">
                    Become a host
                </button>
                <button class="nav__user-buttons__language">
                    <span class="material-icons">language</span>
                </button>
                <div class="nav__user-buttons__user-button" onclick="toggleModal()">
                    <span class="material-icons">
                        menu
                    </span>
                    <span class="material-icons gray">
                        account_circle
                    </span>
                </div>
            </div>
        </div>
        <div class="user-modal" id="user-modal">
            <?php if (isset($_SESSION['log_in']) && $_SESSION['log_in']) : ?>
                <h5 onclick="onProfileClick()"><?= $_SESSION['username']; ?></h5>
                <?php if ($_SESSION['role'] == 1) : ?>
                    <h5 onclick="onManageStayClick()">Manage Stays</h5>
                <?php endif; ?>
                <h5 onclick="onLogOutClick()">Log Out</h5>
            <?php else : ?>
                <h5 onclick="onLoginClick()">Login</h5>
                <h5 onclick="onSignUpClick()">Sign up</h5>
                <hr>
                <h5 onclick="onHostYourHomeClick()">Host Your Home</h5>
                <h5>Help</h5>
            <?php endif; ?>
        </div>
    </nav>

    <div class="login-modal" id="login-modal">
        <div class="login-modal__dialog">
            <div class="login-modal__dialog__header">
                <div class="login-modal__dialog__header__close">
                    <button>
                        <span class="material-icons" id="login-close-button" onclick="onLoginDialogClose()">
                            close
                        </span>
                    </button>
                </div>
                <div class="login-modal__dialog__header__header">
                    Log In
                </div>
            </div>
            <div class="login-modal__dialog__body">
                <hr>
                <div class="login-modal__dialog__body__form">
                    <form action="../controllers/auth/auth_controller.php" method="post" class="login-modal__dialog__body__form__group">
                        <div class="control">
                            <label for="email"></label>
                            <input type="text" name="email" id="email" class="" placeholder="Email...">
                        </div>
                        <div class="control">
                            <label for="password"></label>
                            <input type="password" name="password" id="password" class="" placeholder="Password...">
                        </div>
                        <div>
                            <button name="log_in">Login</button>
                        </div>
                        <div class="link">
                            <a href="">I don't have an account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form action="../search_result.php" method="GET">
        <div class="search-modal" id="search-form">
            <div class="close-modal">
                <span class="material-icons" id="close-modal" onclick="onLoginDialogClose()">
                    close
                </span>
            </div>

            <div class="comps">
                <div class="search-comp">
                    <h5>Location</h5>
                    <input type="text" name="location" id="location" placeholder="Location">
                </div>
                <div class="search-comp date-comp">
                    <div class="date-ipt">
                        <h5>Start Date</h5>
                        <input type="date" name="start-date" placeholder="Start Date" name="start_date">
                    </div>
                    <div class="date-ipt">
                        <h5>End Date</h5>
                        <input type="date" name="end-date" placeholder="End Date" name="end_date">
                    </div>
                </div>
                <div class="search-comp">
                    <h5>Number Of Guest</h5>
                    <input type="number" name="guess-number" id="number_of_guest" placeholder="For How Many People">
                </div>
            </div>

            <div class="button-con" id="search-btn" name="search-host">
                <button name="search_stays">SEARCH STAYS</button>
            </div>
        </div>
    </form>

    <script>
        const searchBox = document.getElementById('search_box');
        const formElement = document.getElementById('search-form');
        const closeButton = document.getElementById('close-modal');
        const searchBtn = document.getElementById('search-btn');
        searchBox.addEventListener('click', () => {
            formElement.style.display = "block";
        });
        closeButton.addEventListener('click', () => {
            formElement.style.display = "none";
        });
    </script>

    <?php include 'info_modal.php'; ?>