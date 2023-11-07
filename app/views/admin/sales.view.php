<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Table View</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Graph View</a>
  </li>
</ul>

<br>
<h2>Today's Total: S/<?=number_format($sales_total,2)?></h2>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Barcode</th>
                <th>Receipt No</th>
                <th>Description</th>
                <th>Qty</th>
                <th>Amount</th>
                <th>Total</th>
                <th>Cashier</th>
                <th>Date</th>
                <th>
                    <a href="index.php?pg=sale-new">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</button>
                    </a>
                </th>
            </tr>
        </thead>
        
        <tbody>
        
            <?php if(!empty($sales)): ?>
                <?php foreach($sales as $sale): ?>
                    <tr>
                        <td><?=esc($sale["barcode"])?></td>
                        <td><?=esc($sale["receipt_no"])?></td>
                        <td>
                            <?=esc($sale["description"])?>
                        </td>
                        <td><?=esc($sale["qty"])?></td>
                        <td><?=esc($sale["amount"])?></td>
                        <td><?=esc($sale["total"])?></td>
                        <td><?=esc($sale["user_id"])?></td>
                        <td><?=date("jS M, Y",strtotime($sale["date"]))?></td>
                        <td>
                            <a href="index.php?pg=sale-edit&id=<?=$sale['id']?>">
                                <button class="btn btn-success btn-sm">Edit</button>
                            </a>
                            <a href="index.php?pg=sale-delete&id=<?=$sale['id']?>">
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        
        </tbody>
    </table>
    <?php
        $pager->display();
    ?>                
</div>
