<?php

include "config.php";

if(isset($_GET['file'])) {
$transfer_sp_link = $_GET["file"];

$sql = "SELECT * FROM tf_transfers WHERE transfer_sp_link = '$transfer_sp_link'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
			
			$yEmail = $row['transfer_email'];
			$fileName = $row['transfer_file_name'];
			$fileSize = $row['transfer_file_size'];
			$date = $row['transfer_time'];
			$message = $row['transfer_message'];
			$link =  'http://localhost/Bakcups/transfree/test_uploads/'.$yEmail.'/'.$row['transfer_file_name'];
			
			require "download_content.php";
			
			if($row['transfer_password'] == md5("NULL")){
				echo $download_content;
			}else{
				echo $download_content_p;
			}
		}
}else{
	include "error_content.php";
	echo $error;
}

$conn->close();
}else{
	include "error_content.php";
	echo $error;
}

?>