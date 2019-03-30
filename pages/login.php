<?php
require_once("components/header.php");
?>

<div class="row justify-content-sm-center">
    <div class="col-md-6 col-md-auto">
        <?php $flash->display(); ?>
        <h2>Please Login</h2>
        <form method="post" action="processor.php?action=login">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input id="username" class="form-control" type="text" name="username" placeholder="Your username...">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                </div>
                <input id="password" class="form-control" type="password" name="password" placeholder="Your password...">
            </div>
            <button class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
            <a href="/?page=register" class="btn btn-default"><i class="fas fa-user-plus"></i> Register</a>
        </form>
    </div>
</div>

<?php
require_once("components/footer.php");
