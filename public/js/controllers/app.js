var app = angular.module("tikiTrotter", []);
var url_prefix = "http://192.168.1.101";

// USERS
app.controller("userController", function($scope, $http, $window) {
	
	$scope.login = {};
	$scope.capt = {};

	// generate captcha
    $http.get(url_prefix + "/user/captcha")
    .success(function(response) {
    	$scope.capt = response;
    });	

	$scope.authenticateUser = function() {
		$("#div_busy").show();
		$http({
		    method: 'POST',
		    url: url_prefix + "/user/authenticate_user",
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    data: $.param($scope.login)
		}).success(function (data, response) {
			if(data.response.code === 0) { 
				$("#div_busy").hide();
			}
			else if(data.response.code === 1) { 
				$("#div_busy").hide();
			}
		});		
	}

    $scope.reCaptcha = function() {
    	console.log()
	    $http.get(url_prefix + "/user/captcha")
	    .success(function(response) {
	    	$scope.capt = response;
	    });    	
    }	
});

app.controller("dashboardController", function($scope, $http, $window) {

});

