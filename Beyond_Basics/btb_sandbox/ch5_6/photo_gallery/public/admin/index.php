<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>
<?php include_layout_template('admin_header.php');?>
		<h2>Menu</h2>

		<a href = "logout.php"> Logout </a>
		<br>
		<a href = "logfile.php"> To log </a>
		
		</div>
		
        <?php include_layout_template('admin_footer.php');?>
