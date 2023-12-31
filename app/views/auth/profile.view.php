<?php require views_path('partials/header'); ?>

        <div class="container-fluid border col-lg-5 col-md-7 mt-5 p-4">
            <?php if(is_array($row)): ?>
                <center>
                        <h3><i class="fa-solid fa-location-pin"></i>User Profile</h3>
                        <div><?=esc(APP_NAME);?></div>
                </center>
                <table class="table table-hover table-striped">
                        <td>
                                <td colspan="2"> 
                                        <img src="<?=crop($row['image'],400,$row['gender'])?>" style="width:100%; max-width:100px;">
                                </td>
                         
                        </td>
                        <tr>
                                <th>Username</th><td><?=$row['username']?></td>
                        </tr>
                        <tr>
                                <th>Email</th><td><?=$row['email']?></td>
                        </tr>
                        <tr>
                                <th>Gender</th><td><?=$row['gender']?></td>
                        </tr>
                        <tr>
                                <th>Role</th><td><?=$row['role']?></td>
                        </tr>
                        <tr>
                                <th>Date Created</th><td><?=get_date($row['date'])?></td>
                        </tr>
                </table>
                <br>
                <a href="index.php?pg=edit-user&id=<?=$row['id']?>">
                        <button type="button" class="btn btn-primary">Edit</button>
                </a>
                <a href="index.php?pg=delete-user&id=<?=$row['id']?>" class="float-end">
                        <button type="button" class="btn btn-danger">Delete</button>
                </a>

     
                <?php endif; ?>
        </div>
    


<?php require views_path('partials/footer'); ?>
