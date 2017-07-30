<?php

include "config.php";

$transfer_password = $_POST['password'];
$transfer_sp_link = $_POST['transfer_sp_link'];

$sql = "SELECT * FROM tf_transfers WHERE transfer_password = '".md5($transfer_password)."' AND transfer_sp_link = '$transfer_sp_link'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()){
			echo 'http://localhost/Bakcups/transfree/test_uploads/'.$row['transfer_email'].'/'.$row['transfer_file_name'];
		}
	
}else{
	echo "0";
}

$conn->close();

?>