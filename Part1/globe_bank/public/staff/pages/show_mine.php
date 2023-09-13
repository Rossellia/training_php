<?php require_once('../../../private/initialize.php');?>

<a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>
<br>

<?php



$id = $_GET['id'] ?? '1';

$page_title = isset($_GET['page_title']) ? $_GET['page_title'] : 'Index';

//$page = $_GET['page'] ?? '1'; PHP > 7.0

echo "Page ID: " . h($id) . "<br>";
echo "Page Name: " . h($page_title) .  "<br>";

?>
