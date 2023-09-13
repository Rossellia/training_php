<?php 
require_once('../../../private/initialize.php'); 

if(!isset($_GET['id'])){
    redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];
$subject = find_all_subjects();


if(is_post_request()){
    // Handle form values sent by new.php

    $page = [];
    $page['id'] = $id;
    $page['subject_id'] = $_POST['subject_id'] ?? '';
    $page['menu_name'] = $_POST['menu_name'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['visible'] = $_POST['visible'] ?? '';
    $page['content'] = $_POST['content'] ?? '';
    $result = update_page($page);
    if($result === true){
      redirect_to(url_for('/staff/pages/show.php?id=' . $id));
    }else{
      $errors = $result;
      //var_dump($errors);
    }
}
else{
    $page = find_page_by_id($id);

}

$page_set = find_all_pages();
$page_count = mysqli_num_rows($page_set);
mysqli_free_result($page_set);

?>

<?php $page_title = 'Edit page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h1>Edit Page</h1>

    <?php echo display_errors($errors);?>

    <form action="<?php echo url_for('/staff/pages/edit.php?id='.h(u($id))); ?>" method="post">
        <dl>
        <dt>Subject ID</dt>
        <dd>
        <select name="subject_id">
        <?php 
        while($subject_id = mysqli_fetch_assoc($subject))
        {
                echo "<option value=\"{$subject_id['id']}\"";
                if($subject_id['id'] == $page['subject_id']) {
                    echo " selected";
                }
                echo ">" . h($subject_id['menu_name']) . "</option>";
        } 
        mysqli_free_result($subject);
        ?>
        </select>
        </dd>
        </dl>
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($page['menu_name']) ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
        <select name="position">
        <?php
            for($i=1; $i <= $page_count; $i++) {
                echo "<option value=\"{$i}\"";
                if($page["position"] == $i) {
                    echo " selected";
                }
                echo ">{$i}</option>";
            }
        ?>
        </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php if ($page['visible'] == '1') {echo " checked";} ?> />
        </dd>
      </dl>

      <dl>
        <dt>Content</dt>
        <dd><input type="text" name="content" value="<?php echo h($page['content']) ?>" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
