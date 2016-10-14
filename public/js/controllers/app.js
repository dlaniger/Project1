var app = angular.module("tikiTrotter", []);
var url_prefix = "http://localhost";

// USERS
app.controller("userController", function($scope, $http, $window) {
	
	$scope.login = {};
	$scope.capt = {};
	$scope.signup = {};

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
			console.log(data);
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

    $scope.signUp = function() {
    	console.log($scope.signup);
    	$scope.signup.user_type = 1;
		$("#div_busy").show();
		$http({
		    method: 'POST',
		    url: url_prefix + "/user/save_user",
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    data: $.param($scope.signup)
		}).success(function (data, response) {
			console.log($scope.signup);
			$('#div_busy').hide();
		});    	
    }
});

app.controller("dashboardController", function($scope, $http, $window) {

});

