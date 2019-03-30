<?php
require_once("components/header.php");
?>
<div class="row justify-content-sm-center">
    <div class="col-md-6 col-md-auto">
        <?php $flash->display(); ?>

        <h2>Registration Form</h2>
        <form method="post" action="processor.php?action=register">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input id="username" class="form-control" type="text" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                </div>
                <input id="password" class="form-control" type="password" name="password" minlength="8" placeholder="Enter your password (Min length: 8 characters)" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                </div>
                <input id="confirm-password" class="form-control" type="password" name="confirm_password" minlength="8" placeholder="Enter your password again" required>
            </div>
            <button class="btn btn-primary"><i class="fas fa-thumbs-up"></i> Register</button>
        </form>
    </div>
</div>
<?php
require_once("components/footer.php");
