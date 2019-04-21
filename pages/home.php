<div class="container mt-5">
    <?php
    $flash->display();
    if (!$auth->user()) {
        ?>
        <p class="alert alert-warning">This demo is a test of Object-Oriented Programming and <a href="https://en.wikipedia.org/wiki/Create,_read,_update_and_delete"><i class="fas fa-external-link-alt" style="font-size:11px"></i> CRUD</a> functionality not design</p>
        <h2>PHP Login/User Management Example</h2>
        <p>This is a custom made user registration/authentication and management system utilizing Twitter Bootstrap, SQLite3 and PHP. I built this using Object Oriented programming for fun. Click <a href="/?page=login">Login</a> to begin.</p>
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
                    <div class="card-body" style="background:#343a40;color:#fff">
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
                                <?php if($member['username'] != 'test'){ ?>
                                    <tr>
                                        <td><?php echo $member['id']; ?></td>
                                        <td><?php echo $member['username']; ?></td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="/?page=change_password&user_id=<?php echo $member["id"]; ?>" class="btn btn-sm btn-primary"><i class="fa fa-key"></i> Change Password</a>
                                                <a href="/processor.php?action=delete&id=<?php echo $member["id"]; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove <?php echo $member['username']; ?>')"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
</div>