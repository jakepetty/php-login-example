<?php
require_once("components/header.php");
$user = $database->read($_GET['user_id']);
?>
<header class="h-100">
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="d-flex flex-column">
            <?php
                $flash->display();
            ?>
            <div class="card" style="width:400px">
                <div class="card-body">
                    <h5 class="card-title mb-3">Resetting <?php echo $user['username']; ?>'s Password</h5>
                    <form method="POST" action="processor.php?action=reset_password">
                        <input type="hidden" name="id" value="<?php echo $user['id'];?>">
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
                        <button class="btn btn-primary"><i class="fas fa-thumbs-up"></i> Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>