<h2>Inventory</h2>
<ul>
    <?php foreach ($products as $product): ?>
    <li>
        <?php echo $product->name; ?>
        - Stock: <?php echo $product->stock; ?>
        - <a href="<?php echo site_url('inventory/view_history/'.$product->id); ?>">View History</a>
    </li>
    <?php endforeach; ?>
</ul>