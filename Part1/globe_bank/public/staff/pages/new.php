<?php 
require_once('../../../private/initialize.php'); 




if(is_post_request()){
    // Handle form values sent by new.php

    $page = [];
    $page['subject_id'] = $_POST['subject_id'] ?? '';
    $page['menu_name'] = $_POST['menu_name'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['visible'] = $_POST['visible'] ?? '';
    $page['content'] = $_POST['content'] ?? '';

    $result = insert_page($page);
    if($result === true){
      $new_id = mysqli_insert_id($db);
      redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));
    }
    else{
      $errors = $result;
    }
    
}
else{
    $page = [];
    $page['subject_id'] = '';
    $page['menu_name'] =  '';
    $page['position'] = '';
    $page['visible'] = '';
    $page['content'] = '';
}

$page_set = find_all_pages();
$page_count = mysqli_num_rows($page_set) + 1;
$page = [];
$page['position'] = $page_count;


$subject = find_all_subjects();





?>

<?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create Subject</h1>

    <?php echo display_errors($errors);?>

    <form action="<?php echo url_for('/staff/pages/new.php')?>" method="post">
        <dl>
        <dt>Subject ID</dt>
        <dd>
        <select name="subject_id">
        <?php 
        $count = 1;
        while($subject_id = mysqli_fetch_assoc($subject))
        {
                echo "<option value=\"{$subject_id['id']}\"";
                if($count == 1) {
                    echo " selected";
                }
                echo ">" . h($subject_id['menu_name']) . "</option>";
                $count+=1;
        } 
        mysqli_free_result($subject);
        ?>
        </select>
        </dd>
        </dl>
        <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="" /></dd>
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
          <input type="checkbox" name="visible" value="1" />
        </dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd><input type="text" name="content" value="" /></dd>
      </dl>
      <dl>
      <div id="operations">
        <input type="submit" value="Create Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
