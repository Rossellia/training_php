<?php 
require_once('../../../private/initialize.php'); 

$menu_name = '';
$position = '';
$visible = '';

if(is_post_request()){
    // Handle form values sent by new.php


    $menu_name = $_POST['menu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    echo "Form parameters<br />";
    echo "Menu name: " . $menu_name . "<br />";
    echo "Position: " . $position . "<br />";
    echo "Visible: " . $visible . "<br />";
}
else{
    //redirect_to(url_for('/staff/pages/new.php'));
}

?>

<?php $page_title = 'New Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="new page ">
    <h1>New page</h1>

    <form action="<?php echo url_for('/staff/pages/new.php'); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name) ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value="1"  <?php if ($position == '1') echo "selected='selected'"; ?>>1</option>
            <option value="2" <?php if ($position == '2') echo "selected='selected'"; ?>>2</option>
            <option value="3" <?php if ($position == '1') echo "selected='selected'"; ?>>3</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" <?php if ($visible == '1') echo "checked='checked'"; ?> value="1" />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="New Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
