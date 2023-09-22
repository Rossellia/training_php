<!-- File: /app/View/Items/view.ctp -->

<h1><?php echo h($item['title']); ?> (<?php echo h($item['year']); ?>)</h1>
<p><?php echo h($item['category']['name'])?></p>
<p>Length: <?php echo h($item['length']); ?></p>
<?php echo $this->element('quote_block', array('quote'=>"To boldy go where no man has gone before")); ?>
<div class = "itemDescription"><?php echo h($item['description']); ?></div>

