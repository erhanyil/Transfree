var i = 0; //password button icin
var k = 0; //toEmail list id için
var c = 0;
var s = 0;
function _(el){
	return document.getElementById(el);
}
function mainUploadFile(yEmail,toEmail,message,password){
	$("#uploadForm").slideUp();
	$("#progressPanel").slideDown();
	
	var sendData = "?yEmail="+yEmail+"&message="+message+"&toEmail="+toEmail+"&password="+password;
	
	var file = _("file1").files[0];
	
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "./php/file_upload_parser.php"+sendData);
	ajax.send(formdata);
}
function uploadFile(){
	var yEmail = document.getElementById('yEmail').value;
	var toEmail = "";
	var message = document.getElementById('message').value;
	var password = document.getElementById("password").value;
	if(_("file1").value && _("file1").files[0].size <= 2147483648){
		if(validateEmail(yEmail)){
			if( $('#toEmailList').children().length > 0 ) {
				
				$('.label-default').each(function(i, obj) {
					$("#badgeLink").remove();
					$("#badgeIcon").remove();
					toEmail += obj.innerHTML + ","; // Butun emailler ',' ile burda birleştiriliyor
				});
				if(i != 0 && password != ""){
					mainUploadFile(yEmail,toEmail,message,password);	
				}else if(i == 0 && password == ""){
						mainUploadFile(yEmail,toEmail,message,password);
				}else{
				$("#password").effect("shake");
					$("#password").focus();
		document.getElementById("password").value = "";
		document.getElementById("password").placeholder = "Enter valid password";
				}
			}else{
			$("#addToEmail").effect("shake");
				$("#toEmail").effect("shake");
				$("#toEmail").focus();
			}
		}else{
		$("#yEmail").effect("shake");
			$("#yEmail").focus();
		document.getElementById("yEmail").value = "";
		document.getElementById("yEmail").placeholder = "Enter valid email";
		}
	}else{
		        $( "#selectFileButton" ).animate({
          backgroundColor: "#e51c23",
          color: "#fff",
        }, 100 );
		$("#addYour").effect("shake");
	}


}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Uploaded "+formatBytes(event.loaded)+" of "+formatBytes(event.total);
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").className = "c100 p"+Math.round(percent);
	_("progressBarPercent").innerHTML = Math.round(percent)+"%";
	_("status").innerHTML = Math.round(percent)+" % uploaded... please wait";
}
function completeHandler(event){
	_("progressBar").className = "c100 p100";
	_("progressBarPercent").innerHTML = '<i style="font-size:50px;margin-top:35px" class="fa fa-check" aria-hidden="true"></i>';
	var deger = event.target.responseText;
	if(deger == " 1"){
		_("status").innerHTML = "100 % uploaded";
	}else{
		document.getElementById("successful").style.display ="none";
		document.getElementById("wrong").style.display ="block";
			_("status").innerHTML = "Something went wrong...";
		_("loaded_n_total").innerHTML = "";
	}
	document.getElementById("goBack").style.display ="inline-block";
	document.getElementById("cancel").style.display = "none";
}
function errorHandler(event){
	_("progressBar").className = "c100 p100";
	_("progressBarPercent").innerHTML = '<i style="font-size:50px;margin-top:35px;color:red;" class="fa fa-frown-o" aria-hidden="true"></i>';
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
function selectFile(){
	document.getElementById('file1').click();
}
function cancel(){
	alert("cancel");
}
function goBack(){
	$("#uploadForm").slideDown();
	$("#progressPanel").slideUp();
	$("#uploadFileHeader").slideDown();
	clearAll();
}
function passwordRadio(){
	if(i == 0){
		document.getElementById("passwordInput").style.display = "block";
			i++;
	}else{
		document.getElementById("passwordInput").style.display = "none";
		document.getElementById("password").value = "";
		i = 0;
	}
}
function addToEmail(){
	if(k < 5){
		var toEmail = document.getElementById("toEmail").value;
			if(validateEmail(toEmail)){
				$("#toEmailList").slideDown();
				document.getElementById("toEmail").value = "";
				var newToEmailSpan = document.createElement('span');
				var newToEmailA = document.createElement('a');
				var newToEmailI = document.createElement('i');
				newToEmailSpan.setAttribute("name","spanLabel");
				newToEmailSpan.setAttribute( "class","label label-default");
				newToEmailSpan.innerHTML = toEmail;
				newToEmailSpan.setAttribute("style","font-size:12px;float:left;margin:2px;word-wrap: break-word;");
				newToEmailSpan.setAttribute( "id",c);
				newToEmailA.setAttribute("id","badgeLink");
				newToEmailA.setAttribute("onclick","removeToEmail("+c+")");
				newToEmailA.setAttribute("style","margin-left:5px;");
				newToEmailI.setAttribute("id","badgeIcon");
				newToEmailI.setAttribute("class","fa fa-times");
				newToEmailI.setAttribute("style","cursor:pointer;padding-top:1px");
				newToEmailI.setAttribute("aria-hidden","true");
				document.getElementById('toEmailList').appendChild(newToEmailSpan).appendChild(newToEmailA).appendChild(newToEmailI);
				k++;
				c++;
			}else{
				document.getElementById("toEmail").placeholder = "Enter valid email";
				document.getElementById("toEmail").value = "";
			}
		}else{
			document.getElementById("toEmail").value = "";
			document.getElementById("maxtoEmail").style.display = "block";
			setTimeout(function(){
    document.getElementById("maxtoEmail").style.display = "none";
}, 2000);
		}	
}
function removeToEmail(id){
	c--;
	k--;
	document.getElementById(id).remove();
	if( !$.trim( $('#toEmailList').html() ).length ) {
		$("#toEmailList").slideToggle(100);
		c=0;
	}

}
document.getElementById('file1').onchange = function() {
	var file = _("file1").files[0];
	if(file.size  <= 2147483648 ){
	$("#uploadFileHeader").slideUp();
	document.getElementById("fileNamePanel").style.display = "block";
	document.getElementById("selectFileButton").style.backgroundColor= "#2196f3";
  document.getElementById("fileName").innerHTML = file.name;
	document.getElementById("fileSize").innerHTML = formatBytes(file.size);
	}else{
		document.getElementById("file1").value = "";
			document.getElementById("fileSizeAlertt").style.display = "block";
					document.getElementById("fileSizeAlert").style.display = "none";

			setTimeout(function(){
    document.getElementById("fileSizeAlertt").style.display = "none";
							document.getElementById("fileSizeAlert").style.display = "block";

}, 3000);
	}
};
document.getElementById('yEmail').onchange = function() {
	document.getElementById("yEmail").placeholder = "Your Email";
};
document.getElementById('toEmail').onchange = function() {
		document.getElementById("toEmail").placeholder = "Email To";
};
function removeChooseFile(){
	$("#uploadFileHeader").slideDown();
	document.getElementById("file1").value = "";
	$("#fileNamePanel").slideUp();
}
function formatBytes(bytes,decimals) {
   if(bytes == 0) return '0 Byte';
   var k = 1000; // or 1024 for binary
   var dm = decimals + 1 || 3;
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
   var i = Math.floor(Math.log(bytes) / Math.log(k));
   return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
function clearAll(){
	document.getElementById("file1").value = "";
	document.getElementById("fileNamePanel").style.display = "none";
	document.getElementById("toEmailList").style.display = "none";
	document.getElementById("password").value ="";
	
	var myNode = document.getElementById("toEmailList");
while (myNode.firstChild) {
    myNode.removeChild(myNode.firstChild);
}
	
	document.getElementById("yEmail").value ="";
	document.getElementById("message").value ="";
	if(i != 0){
	document.getElementById("passRadio").click();
	i=0;
	}
	
	k=0;
	document.getElementById("successful").style.display ="block";
		document.getElementById("wrong").style.display ="none";
		_("status").innerHTML = "";
		_("loaded_n_total").innerHTML = "";
}
function openNav() {
	document.getElementById("mySidenav").style.width = "300px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
function search(){
	var searchEmail = document.getElementById("searchInput").value;
	var sendData = "searchEmail="+searchEmail;
	$(document).ready(function(){
    function showRoom(){
        $.ajax({
            type:"POST",
            url:"./php/search_file_parser.php",
            data:sendData,
            success:function(data){
                $("#searchEmailContent").html(data);
            }
        });
    }
    showRoom();
});
}
function openSearchForm(){
	if(s == 0){
		s++;
			$("#uploadForm").slideUp();
	$("#searchPanel").slideDown();
	}else{
		s=0;
			$("#uploadForm").slideDown();
	$("#searchPanel").slideUp();
	}

}
function showSearhtoEmailList(id){
	
	$("#toEmailList-"+id).fadeToggle();
}
function showPasswordInput(){
if(document.getElementById("dP").style.display == "block"){
	var downloadPassword = document.getElementById("downloadPasswordInput").value ;
	var datab = document.location.href;
	var datas = datab.split("=");
	var user_sp_link = datas[1];
	var SenData = "password="+downloadPassword+"&transfer_sp_link="+user_sp_link;
	$.ajax({
		type:"POST",
    url:"../php/download_pass_check.php",
    data:SenData,
    success:function(msg){
		if(msg != " 0"){
			document.getElementById("dP").style.display = "none";
			document.getElementById("downloadPasswordInput").style.display = "none";
				document.getElementById("downloadPasswordInput").value = "";
			document.getElementById("downloadPasswordInput").placeholder = "Password";
			 document.getElementById("download").href=msg; 
			 _("download").innerHTML  = "Download";
			return false;
		}else{
			document.getElementById("downloadPasswordInput").value = "";
			document.getElementById("downloadPasswordInput").placeholder = "Wrong!!!";
				$("#downloadPasswordInput").effect("shake");
			$("#downloadPasswordInput").focus();
			return false;
		}
    }
	});
}else{
	document.getElementById("dP").style.display = "block";
}
	
}

var slideIndex = 1;
showDivs(slideIndex);
function plusDivs(n) {
    showDivs(slideIndex += n);
}
function showDivs(n) {
	var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex-1].style.display = "block";
}

var slideIndexSearh = 1;
showDivstoEmail(slideIndexSearh);
function showDivstoEmail(n) {
    var i;
    var x = document.getElementsByName("searchDiv");
    if (n > x.length) {slideIndexSearh = 1}
    if (n < 1) {slideIndexSearh = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    //x[slideIndexSearh-1].style.display = "block";
}
function plusDivstoEmail(n) {
    showDivstoEmail(slideIndexSearh += n);
}

