<?php require views_path('partials/header'); ?>

        <div class="container-fluid border col-lg-5 col-md-7 mt-5 p-4">
                <form method="post">
                        <center>
                                <h3><i class="fa-solid fa-location-pin"></i>Create User</h3>
                                <div><?=esc(APP_NAME);?></div>
                        </center>
                        <br>
                        <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input value="<?=set_value('username'); ?>" name="username" type="text" class="form-control  <?=!empty($errors['username']) ? 'border-danger' : ''; ?>" id="exampleFormControlInput1" placeholder="Username">
                                <?php if(!empty($errors["username"])):?>
                                        <small class="text-danger"><?=$errors["username"]; ?></small>
                                <?php endif;?>
                        </div>
                        <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input value="<?=set_value('email'); ?>" name="email" type="email" class="form-control <?=!empty($errors['email']) ? 'border-danger' : ''; ?>" id="exampleFormControlInput1" placeholder="name@example.com">
                                <?php if(!empty($errors["email"])):?>
                                        <small class="text-danger"><?=$errors["email"]; ?></small>
                                <?php endif;?>
                        </div>
                        <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                                <input type="password" value="<?=set_value('password'); ?>" name="password" type="text" class="form-control <?=!empty($errors['password']) ? 'border-danger' : ''; ?>" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                <?php if(!empty($errors["password"])):?>
                                        <small class="text-danger"><?=$errors["password"]; ?></small>
                                <?php endif;?>
                        </div>
                        <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Retype Password</span>
                                <input type="password" value="<?=set_value('password_retype'); ?>" name="password_retype" type="text" class="form-control  <?=!empty($errors['password_retype']) ? 'border-danger' : ''; ?>" placeholder="Retype Password" aria-label="Retype Password" aria-describedby="basic-addon1">
                                <?php if(!empty($errors["password_retype"])):?>
                                        <small class="text-danger"><?=$errors["password_retype"]; ?></small>
                                <?php endif;?>
                        </div>
                        <br>
                        <button class="btn btn-primary float-end">Create</button>
                        <a href="index.php?pg=admin&tab=users">
                                <button type="button" class="btn btn-danger">Cancel</button>
                        </a>
                </form>
        </div>
    


<?php require views_path('partials/footer'); ?>
