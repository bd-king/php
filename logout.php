<?php
		include "database.php";
		session_start();
  		session_destroy();
		$conn->close();
		header("location: index.php");
?>