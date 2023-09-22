<?php 
//default value to prevent errors
$subject_id = $subject_id ?? '';
$page_id = $page_id ?? '';
?>

<navigation>
  <?php $nav_subjects = find_all_subjects(); ?>
  <ul class="subjects">
    <?php while($nav_subject = mysqli_fetch_assoc($nav_subjects)) { ?>
      <li class ="<?php if($nav_subject['id'] == $subject_id) {echo 'selected';} ?>">
        <a href="<?php $first_page_id = find_first_page_of_subject($nav_subject['id']); echo url_for('index.php?id=' . h(u($first_page_id))); ?>">
          <?php echo h($nav_subject['menu_name']); ?>
        </a>

        <?php $nav_pages = find_pages_by_subject_id($nav_subject['id']); ?>
  <ul class="pages">
    <?php if($nav_subject['id'] == $subject_id){while($nav_page = mysqli_fetch_assoc($nav_pages)) { ?>
      <li class ="<?php if($nav_page['id'] == $page_id) {echo 'selected';} ?>">
        <a href="<?php echo url_for('index.php?id=' . h(u($nav_page['id']))); ?>">
          <?php echo h($nav_page['menu_name']); ?>
        </a>

        
      </li>
    <?php }} // while $nav_pages ?>
  </ul>
  <?php mysqli_free_result($nav_pages); ?>

      </li>
    <?php } // while $nav_subjects ?>
  </ul>
  <?php mysqli_free_result($nav_subjects); ?>
</navigation>
