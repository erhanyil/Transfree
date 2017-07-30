angular.module('starter.services', [])

.factory("Handler",function(){
  var _data;
  return {
    errorHandler: function(errorConsole,errorAlert){
      if(errorAlert != undefined && errorAlert != null){
        alert(errorAlert);
      }
      console.log("Error:" , errorConsole);
    },
    successHandler: function(successConsole,successAlert){
      if(successAlert != undefined && successAlert != null){
        alert(successAlert);
      }
      console.log("Success:" , successConsole );
    },
    messageHandler: function(messageConsole,messageAlert){
      if(messageAlert != undefined && messageAlert != null){
        alert(messageAlert);
      }
      console.log("Message:" , messageConsole );
    },
    varSetHandler: function(data){
      _data = data;
    },
    varGetHandler: function(){
      return _data;
    }
  };
})

.factory('Server', function($http, Handler, $window) {

  //var main_API_URL = "http://localhost/Bakcups/transfreeMobile/www/";
  var main_API_URL = "http://stdiosoft.com/transfree/";

  var file_upload_parser_API_URL = main_API_URL+'php/file_upload_parser.php';

  return {
    uploadFile: function(data,file){
      var fd = new FormData();
         fd.append('file1', file);
         fd.append('yEmail', data.yEmail);
         var toEmail = '';
         for(var i =0;i<data.toEmailList.length;i++) {
              toEmail += data.toEmailList[i].data + ",";
         }

         fd.append('toEmail', toEmail);
         fd.append('message', data.message);
         fd.append('password', data.password);
         $http.post(file_upload_parser_API_URL, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         })
         .success(function(response){
            alert("File Uploaded Successfully");
         })
         .error(function(response){
            alert("Something went wrong");
         });
    }
  };
});
