<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>
<?php include_layout_template('admin_header.php');?>
		<h2>Menu</h2>

		<a href = "logout.php"> Logout </a>
		<br>
		<a href = "logfile.php"> To log </a>
		<br>
		<a href = "photo_upload.php"> Upload Photo </a>
		<br>
		<a href = "list_photos.php"> List Photos </a>
		
		</div>
		
        <?php include_layout_template('admin_footer.php');?>
