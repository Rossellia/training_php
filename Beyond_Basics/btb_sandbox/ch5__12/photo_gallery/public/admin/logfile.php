<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("index.php"); }

$file = PROJECT_PATH.DS.'logs'.DS.'log.txt';


if(isset($_GET['clear']))
{
    if($_GET['clear'] == 'true'){
        //unlink($file);
        //$handle = fopen($file, 'w');
        //fclose($handle);
        file_put_contents($file, '');
        $user = User::find_by_id($session->user_id);
        $username = $user->username;
        $message =  "Log file was cleared by {$username}";
        log_action('Log Clear', $message);
        redirect_to("logfile.php");
    }
}

?>
<?php include_layout_template('admin_header.php');?>
		<h2>Logs</h2>

		<a href = "index.php"> Back to index</a>
		<br>
        <a href = "logout.php"> Logout </a>
        <br>
        <a href = "logfile.php?clear=true"> Clear Log File </a>
        <br>

<?php





if(file_exists($file) && is_readable($file)){
if($handle = fopen($file, 'r')) {  // read
	while(!feof($handle)) {//keep getting a line until you hit the end of the file
		$content = fgets($handle);
        if(trim($content) != "") {
        echo $content;
        echo "<br>";
        }
	}
  fclose($handle);
}
else{
    echo "File couldn't be opened!";
}}
else{
    echo "File couldn't be opened!";
}
?>

		</div>
		
        <?php include_layout_template('admin_footer.php');?>