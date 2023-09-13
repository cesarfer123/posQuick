<?php require views_path('partials/header'); ?>

    <div class="container-fluid border rounded p-2 m-2 col-lg-4 mx-auto">
        <?php if(!empty($row)): ?>
            <form method="post" enctype="multipart/form-data">
                <h5 class="text-primary"><i class="fa fa-hamburger"></i> Delete Product</h5>
                <div class="alert alert-danger text-center">Are you sure you want to delete this product?!</div>
                <div class="mb-3">
                    <label for="productControlInput1" class="form-label">Product Description</label>
                    <input disabled value="<?=set_value('description',$row['description']); ?>" name="description" type="text" class="form-control <?=!empty($errors['description']) ? 'border-danger' : ''; ?>" id="productControlInput1" placeholder="Product Name">
                    <?php if(!empty($errors["description"])):?>
                        <small class="text-danger"><?=$errors["description"]; ?></small>
                    <?php endif;?>
                </div>

                <div class="mb-3">
                    <label for="barcodeControlInput1" class="form-label">Barcode <small class="text-muted">(optional)</small></label>
                    <input disabled value="<?=set_value('barcode',$row['barcode']); ?>"  name="barcode" type="text" class="form-control <?=!empty($errors['barcode']) ? 'border-danger' : ''; ?>" id="barcodeControlInput1" placeholder="Product Barcode">
                </div>
                <?php if(!empty($errors["barcode"])):?>
                    <small class="text-danger"><?=$errors["barcode"]; ?></small>
                <?php endif;?>

                <img class="mx-auto d-block" src="<?=$row['image']; ?>" style="width: 50%;">
                <br><br>
                <button class="btn btn-danger float-end">Delete</button>
                <a href="index.php?pg=admin&tab=products">
                    <button type="button" class="btn btn-primary">Cancel</button>
                </a>
            </form>
        <?php else: ?>
            That product was not founded
            <br><br>
            <a href="index.php?pg=admin&tab=products">
                <button type="button" class="btn btn-primary">Back to products</button>
            </a>
        <?php endif; ?>    
    </div>

<?php require views_path('partials/footer'); ?>
