<?php
require_once("components/header.php");
?>
<header class="h-100">
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="d-flex flex-column">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Registration Form</h5>
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
                            <input id="password" class="form-control" type="password" name="password" minlength="8" placeholder="Enter your password" required>
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
        </div>
    </div>
</header>