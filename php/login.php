<?php

include "config.php";

$data = json_decode(file_get_contents("php://input"));

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$USER_NAME = $data ->username;
$USER_PASSWORD = $data->password;

if(isset($USER_NAME) && isset($USER_PASSWORD) ){
	if( !empty($USER_NAME)  && !empty($USER_PASSWORD)  ){


		$sql="SELECT * FROM tf_users WHERE user_email = '".$USER_NAME."' and user_password = '".$USER_PASSWORD."'";
		$result = $conn->query($sql);
		$outp = "";

		if ($result->num_rows > 0) {
    	while($rs = $result->fetch_assoc()) {
				if ($outp != "") {$outp .= ",";}
				$outp .= '{"user_id":"'.$rs["user_id"].'",';
				$outp .= '"user_name":"'.$rs["user_name"].'",';
				$outp .= '"user_lastname":"'.$rs["user_lastname"].'",';
				$outp .= '"user_email":"'.$rs["user_email"].'",';
				$outp .= '"user_password":"'.$rs["user_password"].'",';
				$outp .= '"user_ip":"'.$rs["user_ip"].'",';
				$outp .= '"user_time":"'.$rs["user_time"].'"}';
			}
			$outp ='{"userLoginData":['.$outp.']}';
			echo($outp);
		}else{
			echo "1";
		}
		$conn->close();



	}
}

?>
