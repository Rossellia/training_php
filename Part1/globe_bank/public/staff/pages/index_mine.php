<?php require_once('../../../private/initialize.php'); ?>


<?php
  $pages = [
    ['id' => '1', 'page_title' => 'Index Public'],
    ['id' => '2', 'page_title' => 'Index Staff'],
    ['id' => '3', 'page_title' => 'Show Staff'],
    ['id' => '4', 'page_title' => 'Index Subjects'],
    ['id' => '5', 'page_title' => 'Show Subjects'],
    ['id' => '6', 'page_title' => 'Index Pages'],
    ['id' => '7', 'page_title' => 'Show Pages'],
  ];
?>

<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>



<div id="content">
  <div class="pages listing">
    <h1>Pages</h1>

    <div class="actions">
      <a class="action" href="">Add New Page</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Page Title</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php foreach($pages as $page) { ?>
        <tr>
          <td><?php echo h($page['id']); ?></td>
          <td><?php echo h($page['page_title']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/pages/show.php?page_title=' . h(u($page['page_title'])) . '&id=' .  h(u($page['id'])));?>">View</a></td>
          <td><a class="action" href="">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
