<?php
	session_start();
	echo $_SESSION['messagexito'];
	session_destroy();
?>