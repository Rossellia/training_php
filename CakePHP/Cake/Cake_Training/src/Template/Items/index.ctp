<h1>List of <?php echo $count ?> Catalog Items</h1>
<?php echo $this->Html->link('Add Item', array('controller' => 'items', 'action' => 'add')); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
		<th>Year</th>
        <th>Length</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($items as $item): ?>
		<tr>
			<td><?php echo h($item['id']); ?></td>
			<td>
				<?php echo $this->Html->link($item['title'],
					array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
			</td>
			<td><?php echo h($item['year']); ?></td>
			<td><?php echo h($item['length']); ?></td>
			<td>
				<?php echo $this->Html->link('Edit', 
					array('action' => 'edit', $item['id'])); ?> | 
				<?php echo $this->Form->postLink('Delete',
					array('action' => 'delete', $item['id']),
					array('confirm' => 'Are you sure you want to delete item, '. $item['title'].'?'));
				?>       
			</td>
		</tr>
    <?php endforeach; ?>
    <?php unset($item); ?>
</table>