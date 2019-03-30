<?php
$flash->display();
if (!$auth->user()) {
?>
<h2>PHP Login/User management Example</h2>
<p>This is a custom made user registration/authentication and management system utilizing Twitter Bootstrap, SQLite3 and PHP. Click <a href="/?page=login">Login</a> to begin.</p>
<?php } else { ?>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Welcome back <?php echo $auth->user('username'); ?></h1>
                <p class="card-text">You are now logged in!</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-user"></i> Member Management</h5>
                <p class="card-text">You can manage the users from the table below</p>
            </div>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($database->all() as $member) { ?>
                    <tr>
                        <td><?php echo $member['id']; ?></td>
                        <td><?php echo $member['username']; ?></td>
                        <td class="text-right"><a href="/processor.php?action=delete&id=<?php echo $member["id"]; ?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?> 