<h2>Log In</h2>
<p>You will need to log in to edit any of the content.</p>
<?php 
echo $this->Form->create('User');	
echo $this->Form->input('username');
echo $this->Form->password('password');
echo $this->Form->button(__('Login'));
echo $this->Form->end(); 
?>