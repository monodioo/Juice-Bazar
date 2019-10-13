<?php
	session_start();
	unset($_SESSION['admin']);
 
	if(session_destroy())
	{
		header("Location: index.php");
	}
