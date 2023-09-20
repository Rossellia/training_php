<?php 
require_once("../includes/initialize.php"); ?>
<?php include_layout_template('header.php');?>
<?php
	// 1. the current page number ($current_page)
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

	// 2. records per page ($per_page)
	$per_page = 3;

	// 3. total record count ($total_count)
	$total_count = Photograph::count_all();
	

	// Find all photos
	//$photos = Photograph::find_all();

  // Find all photos
	// use pagination instead
	//$photos = Photograph::find_all();
	
	$pagination = new Pagination($page, $per_page, $total_count);
	
	// Instead of finding all records, just find the records 
	// for this page
	$sql = "SELECT * FROM photographs ";
	$sql .= "LIMIT {$per_page} ";
	$sql .= "OFFSET {$pagination->offset()}";
	$photos = Photograph::find_by_sql($sql);
	
	// Need to add ?page=$page to all links we want to 
	// maintain the current page (or store $page in $session)
?>
<?php

//if(isset($database)){echo "true";}else{echo "false";}
//echo "<br />";

//echo $database->escape_value("It's working <br/>");


//$sql  = "INSERT INTO users (id, username, password, first_name, last_name) ";
//$sql .= "VALUES (2, 'leyu', 'secretpwd', 'Leya', 'Tenebrae')";
//$result = $database->query($sql);

//$sql = "SELECT * FROM users WHERE id = 1";
//$result_set = $database->query($sql);
//$found_user = $database->fetch_array($result_set);
//echo $found_user['username'];
//$found_user = $user->find_by_id(2);

//echo "<hr />";

$user = User::find_by_id(1);
//echo $record['username'];

// $user = new User();
// $user->id = $record['id'];
// $user->username = $record['username'];
// $user->password = $record['password'];
// $user->first_name = $record['first_name'];
// $user->last_name = $record['last_name'];

echo $user->full_name();

echo "<hr />";

$users = User::find_all();
foreach($users as $user){
    echo "User: " . $user->username . "<br/>";
    echo "Name: " . $user->full_name() . "<br/><br/>";
}
// while($user = $database->fetch_array($user_set)){
//     echo "User: " . $user['username'] . "<br/>";
//     echo "Name: " . $user['first_name'] . " " . $user['last_name'] . "<br/><br/>";
// }

//$junk = new Junk(); -- The file junk.php could not be found.


?>

<?php foreach($photos as $photo): ?>
  <div style="float: left; margin-left: 20px;">
		<a href="photo.php?id=<?php echo $photo->id; ?>">
			<img src="<?php echo $photo->image_path(); ?>" width="300" />
		</a>
    <p><?php echo $photo->caption; ?></p>
  </div>
<?php endforeach; ?>

<div id="pagination" style="clear: both;">
<?php
	if($pagination->total_pages() > 1) {
		
		if($pagination->has_previous_page()) { 
    	echo "<a href=\"index.php?page=";
      echo $pagination->previous_page();
      echo "\">&laquo; Previous</a> "; 
    }

		for($i=1; $i <= $pagination->total_pages(); $i++) {
			if($i == $page) {
				echo " <span class=\"selected\">{$i}</span> ";
			} else {
				echo " <a href=\"index.php?page={$i}\">{$i}</a> "; 
			}
		}

		if($pagination->has_next_page()) { 
			echo " <a href=\"index.php?page=";
			echo $pagination->next_page();
			echo "\">Next &raquo;</a> "; 
    }
		
	}

?>
</div>





<?php include_layout_template('footer.php');?>