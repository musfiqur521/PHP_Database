<?php

	$db = mysqli_connect('localhost', 'root', '', 'musfiq');


	if ( $db ){
		//echo "Database Connected";
	}
	else{
		echo "Database Connection Faild";
	}


?>