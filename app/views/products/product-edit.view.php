 <?php require views_path('partials/header'); ?>

    <div class="container-fluid border rounded p-2 m-2 col-lg-4 mx-auto">
        <?php if(!empty($row)): ?>
            <form method="post" enctype="multipart/form-data">
                <h5 class="text-primary"><i class="fa fa-hamburger"></i>Edit Product</h5>
                <div class="mb-3">
                    <label for="productControlInput1" class="form-label">Product Description</label>
                    <input value="<?=set_value('description',$row['description']); ?>" name="description" type="text" class="form-control <?=!empty($errors['description']) ? 'border-danger' : ''; ?>" id="productControlInput1" placeholder="Product Name">
                    <?php if(!empty($errors["description"])):?>
                        <small class="text-danger"><?=$errors["description"]; ?></small>
                    <?php endif;?>
                </div>

                <div class="mb-3">
                    <label for="barcodeControlInput1" class="form-label">Barcode <small class="text-muted">(optional)</small></label>
                    <input value="<?=set_value('barcode',$row['barcode']); ?>"  name="barcode" type="text" class="form-control <?=!empty($errors['barcode']) ? 'border-danger' : ''; ?>" id="barcodeControlInput1" placeholder="Product Barcode">
                </div>
                <?php if(!empty($errors["barcode"])):?>
                    <small class="text-danger"><?=$errors["barcode"]; ?></small>
                <?php endif;?>

                <div class="input-group mb-3">
                    <span class="input-group-text">Qty:</span>
                    <input name="qty" value="<?=set_value('qty',$row['qty']); ?>"  type="number" class="form-control <?=!empty($errors['qty']) ? 'border-danger' : ''; ?>" placeholder="Quantity" aria-label="Quantity">
                    <span class="input-group-text">Price:</span>
                    <input name="amount" value="<?=set_value('amount',$row['amount']); ?>"  step="0.5" type="number" class="form-control <?=!empty($errors['amount']) ? 'border-danger' : ''; ?>" placeholder="Price" aria-label="Price">
                </div>
                <?php if(!empty($errors["qty"])):?>
                    <small class="text-danger"><?=$errors["qty"]; ?></small>
                <?php endif;?>
                <?php if(!empty($errors["amount"])):?>
                        <small class="text-danger"><?=$errors["amount"]; ?></small>
                <?php endif;?>
                <div class="mb-3">
                    <label class="form-label" for="formFile">Product Image</label>
                    <input type="file" name="image" class="form-control <?=!empty($errors['image']) ? 'border-danger' : ''; ?>" id="formFile">
                </div>
                
                <?php if(!empty($errors["image"])):?>
                    <small class="text-danger"><?=$errors["image"]; ?></small>
                <?php endif;?>
                <img class="mx-auto d-block" src="<?=$row['image']; ?>" style="width: 50%;">
                <br><br>
                <button class="btn btn-danger float-end">Save</button>
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
