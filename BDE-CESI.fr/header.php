<!DOCTYPE HTML>
<html>
    <header>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style.css" />
		
		<img src="Ressources/Images/Site_Banner.png">
		<?php if(!isset(session_id))
			session_start(); 
		?>
		<nav>
			<?php include('nav.php');?>
			<br>
		</nav>
	
    </header>
 
</html>