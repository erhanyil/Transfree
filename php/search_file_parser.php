<?php

include "config.php";

$yEmail = $_POST['searchEmail'];
$pass = md5("NULL");
$sql = "SELECT * FROM tf_users WHERE user_email = '$yEmail' AND user_password = '$pass'";
$result = $conn->query($sql);
$countForDisplay = 0;
$checkForPager = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
			$downloadLink = "http://stdiosoft.com/transfree/test_uploads/".$row['user_email']."/".$row['user_file_name'];
			$kırpıkFileName = $row['user_file_name'];
			$kırpıkToEmail =  explode(",",$row['user_to_email']);
			$kk = array_pop($kırpıkToEmail);
			$countToEmail = count($kırpıkToEmail);
			$countToEmailTemp = 	$countToEmail;
			if($countForDisplay == 0){
			?>
				<div id="<?php echo $row['user_id'] ?>" class="modal" name="searchDiv" style="display:block;margin-top:-20px">
		 <?php
			}else{
			?>
				<div id="<?php echo $row['user_id'] ?>" class="modal" name="searchDiv"  style="display:none;margin-top:-20px">
			<?php
					}
			$countForDisplay++;
			
?>



	
												<div class="modal-dialog" >
													<div class="modal-content" style="border-radius:10px;">
														<div class="modal-header">
														</div>
														<div class="modal-body" style="border-bottom:1px #ccc solid">
															<div class="alert alert-dismissible" style="padding-top:0px;padding-bottom:0px;padding-left:0px;margin-bottom:0px;margin-top:-10px">
																<a type="button" class="close" href="<?php echo $downloadLink ?>" style="color:#2196f3;cursor:pointer;margin-top:5px" ><i class="fa fa-file" aria-hidden="true"></i></a>
																<p style="color:#000;word-wrap: break-word;width:200px" id="fileName"><?php echo $kırpıkFileName ?></p>
																<span id="fileSize" style="color:white" class="badge"><?php echo $row['user_file_size'] ?></span>
															</div>
														</div>
														<div class="modal-footer" style="text-align:left;padding:0;padding-bottom:15px">
															<div  style="margin-bottom:-10px" class="alert alert-dismissible">
																<p style="color:#000;word-wrap: break-word;" ><strong>Date: </strong><?php echo $row['user_time'] ?></p>
																<p style="color:#000;word-wrap: break-word;" ><strong>From: </strong><?php echo $row['user_email'] ?></p>
																<p style="color:#000;word-wrap: break-word;" ><strong>To: </strong><?php echo $kırpıkToEmail[0] ?></p>
																
<?php
				if($countToEmail > 1){
?>
																<a style="margin-left:2px;float:none;right:0px" onclick="showSearhtoEmailList(<?php echo $row["user_id"] ?>)" class="close" > <span class="badge" style="background-color:#2196f3;">+<?php echo $countToEmail-1 ?> More Emails</span></a>
																	<ul class="list-group" id="toEmailList-<?php echo $row["user_id"] ?>" style="display:none;padding:5px;overflow:auto;min-height:40px;max-height:50px;margin:0px;border:none;margin-top:5px;">
						<?php
								while($countToEmailTemp > 1){
									?>
																			<span class="label" style="background:#ccc;font-size:12px;float:left;margin:2px;word-wrap: break-word;"><?php echo $kırpıkToEmail[$countToEmailTemp-1] ?></span>
																		<?php
									$countToEmailTemp--;
								}
						?>
															
																</ul>
<?php
														 }
																
?>
																
															
															</div>
														</div>
													</div>
													<?php
													if($result->num_rows > 1){
			?>
				<ul class="pager">
  <li class="previous disabled"><a onclick=" plusDivstoEmail(+1)" href="#">&larr;</a></li>
  <li class="next"><a href="#" onclick=" plusDivstoEmail(-1)">&rarr;</a></li>
</ul>
		 <?php
		}
													?>
					
												</div>
											</div>


<?php
    }
} else {
   ?>
					<h3 style="text-align:center;margin-top:-10px">Not Found</h3>
					<?php
}

$conn->close();
?>