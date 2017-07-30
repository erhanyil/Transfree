<?php

include "config.php";																				
//echo getcwd();
date_default_timezone_set('Europe/Istanbul');								
$date = date("j F Y g:i:s a");															
$forFileDate = date("g_i_s");
																	
if(isset($_POST["yEmail"])){
$yEmail = $_POST["yEmail"];																	
$toEmail = $_POST["toEmail"];																
$message = $_POST["message"];																
$password = $_POST["password"];		
}else if(isset($_GET["yEmail"])){
$yEmail = $_GET["yEmail"];																	
$toEmail = $_GET["toEmail"];																
$message = $_GET["message"];																
$password = $_GET["password"];
}
$fileName = $_FILES["file1"]["name"]; 											
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; 								
$fileType = $_FILES["file1"]["type"]; 											
$fileSize = $_FILES["file1"]["size"]; 											
$fileErrorMsg = $_FILES["file1"]["error"]; 									

if (!$fileTmpLoc) { 																				
    echo "0";
    exit();
}

if (!file_exists('../test_uploads/'.$yEmail)) {							
    mkdir('../test_uploads/'.$yEmail, 0777, true);
}

if($password == ""){																				
	$password = "NULL";
}
									
$fileSize = formatSizeUnits($fileSize);											

$user_sp_link = $yEmail."_".$fileName;

if(move_uploaded_file($fileTmpLoc, '../test_uploads/'.$yEmail. '/' .$fileName)){		
	
	$sql = "INSERT INTO tf_transfers (transfer_email, transfer_to_email, transfer_message, transfer_password, transfer_file_name, transfer_file_size, transfer_ip, 	transfer_time, transfer_sp_link) VALUES  ('$yEmail','$toEmail','$message','".md5($password)."','$fileName','$fileSize','".get_client_ip()."','$date','".md5($user_sp_link)."')";
	
	if($conn->query($sql) === TRUE) {
		
		include "./PHPMailer-master/PHPMailerAutoload.php";
		$link = "http://localhost/Bakcups/transfree/php/download.php?file=".md5($user_sp_link);
		include "email_content.php";
    
		$mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'transfreecompany@gmail.com';
    $mail->Password = 'pata$19204421924';
    $mail->SetFrom($mail->Username, 'TransFree');
		
		$kırpıkToEmail =  explode(",",$toEmail);
		$kk = array_pop($kırpıkToEmail);
		$countToEmail = count($kırpıkToEmail);
		
		while($countToEmail > 0){
			$mail->AddAddress($kırpıkToEmail[$countToEmail-1],$kırpıkToEmail[$countToEmail-1]);
			$countToEmail--;
		}
		
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $yEmail.' has sent you a file via TransFree';
    $mail->MsgHTML($emailContent);	
    //$mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
		if($mail->Send()){
			echo "1";
		}else{
			echo"01"; // MAIL DOESNT SENT
		}
	}else{
		echo "02"; // SQL INSERT DOESNT WORK
	}
}else{
    echo "03"; // File DOESNT moved successfully,
}

// Get Client IP address		
function get_client_ip(){																		
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

// Convert byte to GB , MB , KB
function formatSizeUnits($bytes){														
	if ($bytes >= 1073741824)
	{
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
  }
  elseif ($bytes >= 1048576)
  {
  	$bytes = number_format($bytes / 1048576, 2) . ' MB';
  }
  elseif ($bytes >= 1024)
  {
  	$bytes = number_format($bytes / 1024, 2) . ' kB';
	}
  elseif ($bytes > 1)
  {
  	$bytes = $bytes . ' bytes';
  }
  elseif ($bytes == 1)
  {
  	$bytes = $bytes . ' byte';
	}
  else
  {
  	$bytes = '0 bytes';
  }
	return $bytes;
}

$conn->close();
?>