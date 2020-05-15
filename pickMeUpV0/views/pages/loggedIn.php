<div id="loggedIn">
    <div id="loggedHeading"><p><strong>ACTIVE</strong></p><div id="actBr"></div></div>
    <?php 
if(isset($_SESSION['user'])):
	?>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="submit" value="Logout" id="dugmeLgo" name="logout"/>
			</form>
	
	<?php endif;?>
</div>