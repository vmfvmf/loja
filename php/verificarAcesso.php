<?php

	if(empty($_SESSION['id']) || $_SESSION['id'] == 0)
		header("location: index.php?func=login");
?>