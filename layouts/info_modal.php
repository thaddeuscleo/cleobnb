

<!-- TODO: Assign all errors and infos here-->
<div class="info-modal">

    <div class="info-container">
        <!-- Sign Up Page Start -->
        <?php if (isset($_SESSION['username_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['username_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['username_err']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['email_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['email_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['email_err']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['password_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['password_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['password_err']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['confirm_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['confirm_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['confirm_err']); ?>
        <?php endif; ?>
        <!-- Sign Up Page End -->

        <!-- Login Page Start -->
        <?php if (isset($_SESSION['user_err'])) : ?>
            <div class="info-row">
                <p>a
                    <?= $_SESSION['user_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['user_err']); ?>
        <?php endif; ?>
        <!-- Login Page End -->
    </div>

</div>

<script>
    const infoCloseIcons = document.getElementsByClassName('close-icons');
    const elements = Array.from(infoCloseIcons);
    elements.map((icons) => {
        icons.addEventListener('click', (e) => {
            icons.parentNode.parentNode.removeChild(icons.parentNode)
        });
    });
</script>