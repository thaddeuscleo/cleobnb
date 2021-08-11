<?php include "layouts/navigation.php"; ?>

<div class="signup-container">
    <div class="signup-container__form-container">
        <div class="signup-container__form-container__form">
            <form action="controllers/auth/auth_controller.php" class="" method="POST">
                <h2 style="font-size: 60pt;">Become A Host</h2>
                <div class="form-control">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="john15">
                </div>
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="john@example.com">
                </div>
                <div class="form-control">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="">
                </div>
                <div class="form-control">
                    <label for="password">Confirmation Password</label>
                    <input type="password" name="confirm_password" id="password" placeholder="">
                </div>
                <div class="form-control ext center">
                    <button name="host_sign_up">Become A Host</button>
                </div>
            </form>
        </div>
    </div>
    <div class="signup-container__image">
        <img src="/images/kitchen.jfif" alt="" loading="lazy">
    </div>
</div>

<?php include "layouts/footer.php"; ?>