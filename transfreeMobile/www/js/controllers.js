
function _(el){
	return document.getElementById(el);
}

angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, $ionicModal, $timeout, Server) {
})

.controller('PlaylistsCtrl', function($scope, Server,$interval) {
  var file = null;
  $scope.yEmail = "";
  $scope.toEmail = "";
  $scope.message = "";
  $scope.password = "";
  $scope.pswDisplay = false;
  $scope.fileSize = 'Upload Your file up to 2GB';
  $scope.fileName = 'Add Your File';
  $scope.toEmailList = [];

  document.getElementById('file1').onchange = function() {
    file = _("file1").files[0];
    if (file.size  <= 2147483648 ){
      $scope.fileName = file.name;
      $scope.fileSize = formatBytes(file.size);
    } else {
      alert("You can select file up to 2GB !");
    }
  };

  $scope.addToEmail = function(data) {
    if($scope.toEmailList.length < 5){
      if(validateEmail(data)){
        $scope.toEmailList.push({data});
      }else{
        alert("You have to enter valid email");
      }
    } else {
      alert("You can olny add 5 email address");
    }
  };

  $scope.deleteToEmail = function(data) {
      $scope.toEmailList.splice(data,1);
  };

  $scope.uploadFile = function() {
    if(validateEmail($scope.yEmail)){
      if($scope.toEmailList.length > 0) {
        if(($scope.pswDisplay == false && $scope.password == "") || $scope.pswDisplay && ($scope.password != "")) {
            $scope.data = {};
            $scope.data.yEmail = $scope.yEmail;
            $scope.data.toEmailList = $scope.toEmailList;
            $scope.data.message = $scope.message;
            $scope.data.password = $scope.password;
            Server.uploadFile($scope.data,file);
        } else {
          alert('You forgot password');
        }
      } else {
       alert("You have to add a To Email"); 
      }
    } else {
      alert("Your email doesnt valid");
    }
  };

  $scope.changePswDisplay = function() {
      $scope.password = "";
  };

  function formatBytes(bytes,decimals) {
    if(bytes == 0) return '0 Byte';
    var k = 1000; // or 1024 for binary
    var dm = decimals + 1 || 3;
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    var i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
  };

  function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  };

  function startprogress()
  {
    $scope.progressval = 0;
    
    if ($scope.stopinterval)
    {
      $interval.cancel($scope.stopinterval);
    }
    
    $scope.stopinterval = $interval(function() {
          $scope.progressval = $scope.progressval + 1;
           if( $scope.progressval >= 100 ) {
                 $interval.cancel($scope.stopinterval);
                 //$state.go('second');
                 return;
            }
     }, 100);
  }

             startprogress();
})

.controller('PlaylistCtrl', function($scope, $stateParams, Server) {
})

.directive('uploadfile', function () {
    return {
      restrict: 'A',
      link: function(scope, element) {

        element.bind('click', function(e) {
            document.getElementById('file1').click();
        });
      }
    };
})

.directive('fileModel', ['$parse', function ($parse) {
    return {
    restrict: 'A',
    link: function(scope, element, attrs) {
        var model = $parse(attrs.fileModel);
        var modelSetter = model.assign;

        element.bind('change', function(){
            scope.$apply(function(){
                modelSetter(scope, element[0].files[0]);
            });
        });
    }
   };
}]);

