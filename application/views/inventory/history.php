<h2>Transaction History</h2>
<h3><?php echo $products[0]->name; ?></h3>
<ul>
    <?php foreach ($history as $transaction): ?>
    <li>
        <?php echo $transaction->type; ?> (<?php echo $transaction->quantity; ?>) -
        <?php echo date('d-m-Y H:i:s', strtotime($transaction->created_at)); ?>
    </li>
    <?php endforeach; ?>
</ul>