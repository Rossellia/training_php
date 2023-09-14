<?php 
require_once("../includes/initialize.php"); ?>
<?php include_layout_template('header.php');?>
<?php
	// Find all photos
	$photos = Photograph::find_all();
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
			<img src="<?php echo $photo->image_path(); ?>" width="200" />
		</a>
    <p><?php echo $photo->caption; ?></p>
  </div>
<?php endforeach; ?>




<?php include_layout_template('footer.php');?>