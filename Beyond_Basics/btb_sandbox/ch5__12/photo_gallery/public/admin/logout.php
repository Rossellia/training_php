<?php
require_once("../../includes/initialize.php");

$message = "";

if($session->is_logged_in()) {
  $user = User::find_by_id($session->user_id);
  $username = $user->username;
  $message =  "{$username} logged out";
  $session->logout();
  log_action('Logout', $message);
}
redirect_to("index.php");


?>
