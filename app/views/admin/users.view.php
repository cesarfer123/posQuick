<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Image</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Date</th>
                <th>
                    <a href="index.php?pg=signup">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</button>
                    </a>
                </th>
            </tr>
        </thead>
        
        <tbody>
        
            <?php if(!empty($users)): ?>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td>
                            <img src="<?=crop($user["image"])?>" style="width:100%; max-width:100px;">
                        </td>
                        <td>
                            <a href="index.php?pg=profile&id=<?=$user['id']?>">
                                <?=esc($user["username"])?>
                            </a>
                        </td>
                        <td><?=esc($user["email"])?></td>
                        <td><?=esc($user["role"])?></td>
                        <td><?=date("jS M, Y",strtotime($user["date"]))?></td>
                        <td>
                            <a href="index.php?pg=user-edit&id=<?=$user['id']?>">
                                <button class="btn btn-success btn-sm">Edit</button>
                            </a>
                            <a href="index.php?pg=user-delete&id=<?=$user['id']?>">
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        
        </tbody>
    </table>
</div>
</div>