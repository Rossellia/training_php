<?php require_once('../../../private/initialize.php');?>





<?php

$id = $_GET['id'] ?? '1';

$page = find_page_by_id($id);


//$page = $_GET['page'] ?? '1'; PHP > 7.0


?>

<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="pages show">

    Subject ID: <?php echo h($id); ?>
    </div>

    <h1>Page: <?php echo h($page['menu_name']); ?></h1>

    <div class="attributes">
    <dl>
    <dt>Subject ID</dt>
    <dd><?php echo h($page['subject_id']); ?></dd>
    </dl>
    <?php $subject = find_subject_by_id($page['subject_id']); ?>
    <dl>
    <dt>Subject Name</dt>
    <dd><?php echo h($subject['menu_name']); ?></dd>
    </dl>
    <dl>
    <dt>Menu Name</dt>
    <dd><?php echo h($page['menu_name']); ?></dd>
  </dl>
  <dl>
    <dt>Position</dt>
    <dd><?php echo h($page['position']); ?></dd>
  </dl>
  <dl>
    <dt>Visible</dt>
    <dd><?php echo $page['visible'] == '1' ? 'true' : 'false'; ?></dd>
  </dl>
  <dt>Content</dt>
    <dd><?php echo h($page['content']); ?></dd>
  </dl>
</div>

</div>

<a href="show.php?name=<?php echo u('John Doe');?>">Link</a><br>
<a href="show.php?company=<?php echo urlencode('Widgets&More');?>">Link</a><br>
<a href="show.php?query=<?php echo urlencode('!^%#?');?>">Link</a><br>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>