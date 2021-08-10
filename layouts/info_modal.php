

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
                <p>
                    <?= $_SESSION['user_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['user_err']); ?>
        <?php endif; ?>
        <!-- Login Page End -->



        <!-- Add Space | Update Space Start -->
        <?php if (isset($_SESSION['spaceName_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['spaceName_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['spaceName_err']); ?>
        <?php endif; ?>

        <!--  -->

        <?php if (isset($_SESSION['startDate_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['startDate_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['startDate_err']); ?>
        <?php endif; ?>

        <!--  -->

        <?php if (isset($_SESSION['endDate_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['endDate_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
        <?php unset($_SESSION['endDate_err']); ?>
            
            <!--  -->
            
        <?php endif; ?><?php if (isset($_SESSION['dateRange_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['dateRange_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['dateRange_err']); ?>
        <?php endif; ?>

        <!--  -->

        <?php if (isset($_SESSION['location_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['location_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['location_err']); ?>
        <?php endif; ?>

        <!--  -->

        <?php if (isset($_SESSION['price_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['price_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['price_err']); ?>
        <?php endif; ?>

        <!--  -->
        
        <?php if (isset($_SESSION['guess_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['guess_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['guess_err']); ?>
        <?php endif; ?>


        <!--  -->
        
        <?php if (isset($_SESSION['bed_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['bed_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['bed_err']); ?>
        <?php endif; ?>

        <!--  -->
        
        <?php if (isset($_SESSION['bathroom_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['bathroom_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['bathroom_err']); ?>
        <?php endif; ?>

        <!--  -->
        
        <?php if (isset($_SESSION['shower_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['shower_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['shower_err']); ?>
        <?php endif; ?>

        <!--  -->
        
        <?php if (isset($_SESSION['bathub_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['bathub_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['bathub_err']); ?>
        <?php endif; ?>
        
        <!--  -->
        
        <?php if (isset($_SESSION['placeType_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['placeType_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['placeType_err']); ?>
        <?php endif; ?>

        <!--  -->
        
        <?php if (isset($_SESSION['upload_err'])) : ?>
            <div class="info-row">
                <p>
                    <?= $_SESSION['upload_err']; ?>
                </p>
                <span class="material-icons close-icons" id="login-close-button">
                    close
                </span>
            </div>
            <?php unset($_SESSION['upload_err']); ?>
        <?php endif; ?>
        <!-- Add Space | Update Space End -->
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