<?php

$connections = mysqli_connect("localhost","root","","consumercoop");
			if (mysqli_connect_errno()){
				
				echo "Failed to connect to MySQL:". mysqli_connect_error();
			}
			


?>