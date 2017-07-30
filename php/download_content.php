<?php
$download_content= '
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <title>Transfree</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="../css/bootstrap.css" media="screen">
      <link rel="stylesheet" href="../css/custom.css">
      <link rel="stylesheet" href="../font/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="../css/circle.css">
      <link rel="stylesheet" href="../css/style.css">
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <div class="mySlides">
         <div id="ssC"></div>
      </div>
      <div id="mySidenav" class="sidenav">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
         <a style="margin-bottom:0px;color:#111;text-align:center;" href=""><i class="fa fa-cloud-upload" aria-hidden="true" style="color:#2196f3"></i>TransFree</a>
         <hr style="margin:0px">
         <div>
            <p style="padding:15px;word-wrap:break-word;">Açıklama</p>
         </div>
      </div>
      <div class="navbar navbar-default navbar-fixed-bottom">
         <div class="container">
            <div class="navbar-header">
               <a style="color:#fff" href="http://stdiosoft.com/transfree" class="navbar-brand">
                  <!--<i class="fa fa-cloud-upload" aria-hidden="true" style="color:#fff;"></i>-->
                  <img src="../img/cloud-usploasdad-2.png" width="50px"  style="margin-top:-25px">
               </a>
            </div>
            <div class="navbar-collapse collapse" id="navbar-main">
               <ul class="nav navbar-nav navbar-right">
                  <li style="float:right;margin-right:10px"><a  onclick="openNav()" style="border:1px #ccc solid;border-radius:10px;color:#000;background-color:#fff" href="#" target="_blank"><strong>About Us</strong></a></li>
               </ul>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="page-header" id="banner">
            <div class="modal"  style="display:block;">
               <div>
                  <div class="modal-dialog" style="position:fixed;top: 25%;">
                     <div id="uploadForm" class="modal-content" style="width: 280px;border-radius:10px;">
                        <div id="fileNamePanel" style="display:block;margin-bottom:-5px;border-bottom:1px #ccc solid" class="alert alert-dismissible">
                           <p style="color:#000;word-wrap: break-word;" id="fileName">'.$fileName.'</p>
                           <span id="fileSize" style="color:white" class="badge">'.$fileSize.'</span>
                        </div>
                        <div class="modal-body" style="margin-top:10px">
                           <p style="color:#000;word-wrap: break-word;margin:5px;" ><strong>Date: </strong>'.$date.'</p>
                           <p style="color:#000;word-wrap: break-word;margin:5px;" ><strong>From: </strong>'.$yEmail.'</p>
                           <p style="color:#000;word-wrap: break-word;margin:5px;" ><strong>Message: </strong>'.$message.'</p>
                        </div>
                        <div class="modal-footer" style="border-top:1px #ccc solid;margin-top:-10px">
                           <div class="form-group" style="text-align:right;float:right;margin:-10px;margin:0px;">
                              <div class="col-lg-12">
                                 <a type="button" href="'.$link.'" class="btn btn-primary" download>Download</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="//code.jquery.com/jquery-1.12.4.js"></script>
      <script src="//code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
      <script src="../js/bootstrap.js"></script>
      <script src="../js/custom.js"></script>
      <script src="../js/tkon.js"></script>
   </body>
</html>';

$download_content_p = '

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <title>Transfree</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="../css/bootstrap.css" media="screen">
      <link rel="stylesheet" href="../css/custom.css">
      <link rel="stylesheet" href="../font/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="../css/circle.css">
      <link rel="stylesheet" href="../css/style.css">
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <div class="mySlides">
         <div id="ssC"></div>
      </div>
      <div id="mySidenav" class="sidenav">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
         <a style="margin-bottom:0px;color:#111;text-align:center;" href=""><i class="fa fa-cloud-upload" aria-hidden="true" style="color:#2196f3"></i>TransFree</a>
         <hr style="margin:0px">
         <div>
            <p style="padding:15px;word-wrap:break-word;">Açıklama</p>
         </div>
      </div>
      <div class="navbar navbar-default navbar-fixed-bottom">
         <div class="container">
            <div class="navbar-header">
               <a style="color:#fff" href="http://stdiosoft.com/transfree" class="navbar-brand">
                  <!--<i class="fa fa-cloud-upload" aria-hidden="true" style="color:#fff;"></i>-->
                  <img src="../img/cloud-usploasdad-2.png" width="50px"  style="margin-top:-25px">
               </a>
            </div>
            <div class="navbar-collapse collapse" id="navbar-main">
               <ul class="nav navbar-nav navbar-right">
                  <li style="float:right;margin-right:10px"><a  onclick="openNav()" style="border:1px #ccc solid;border-radius:10px;color:#000;background-color:#fff" href="#" target="_blank"><strong>About Us</strong></a></li>
               </ul>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="page-header" id="banner">
            <div class="modal"  style="display:block;">
               <div>
                  <div class="modal-dialog" style="position:fixed;top: 25%;">
                     <div id="uploadForm" class="modal-content" style="width: 280px;border-radius:10px;">
                        <div id="fileNamePanel" style="display:block;margin-bottom:-5px;border-bottom:1px #ccc solid" class="alert alert-dismissible">
                           <p style="color:#000;word-wrap: break-word;" id="fileName">'.$fileName.'</p>
                           <span id="fileSize" style="color:white" class="badge">'.$fileSize.'</span>
                        </div>
                        <div class="modal-body"  style="margin-top:10px">
                           <div id="dS">
                              <p style="color:#000;word-wrap: break-word;margin:5px;" ><strong>Date: </strong>'.$date.'</p>
                              <p style="color:#000;word-wrap: break-word;margin:5px;" ><strong>From: </strong>'.$yEmail.'</p>
                              <p style="color:#000;word-wrap: break-word;margin:5px;" ><strong>Message: </strong>'.$message.'</p>
                           </div>
                        </div>
                        <div class="modal-footer" style="border-top:1px #ccc solid;margin-top:-10px">
                           <div class="form-group" id="dP" style="display:none;margin-top:-10px;margin-bottom:10px">
                              <input class="form-control"  id="downloadPasswordInput" placeholder="Password" type="password">
                           </div>
                           <div class="form-group" style="text-align:right;float:right;">
                              <div class="col-lg-12">
                                 <a type="button" onclick="return showPasswordInput()" id="download" style="margin-right:-10px" class="btn btn-primary" download>Enter Password</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="//code.jquery.com/jquery-1.12.4.js"></script>
      <script src="//code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
      <script src="../js/bootstrap.js"></script>
      <script src="../js/custom.js"></script>
      <script src="../js/tkon.js"></script>
   </body>
</html>

';

?>
