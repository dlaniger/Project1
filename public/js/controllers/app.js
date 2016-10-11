var app = angular.module("tikiTrotter", []);
var url_prefix = "http://localhost";

// USERS
app.controller("userController", function($scope, $http, $window) {
	
	$scope.login = {};

	$scope.authenticateUser = function() {
		$("#div_busy").show();
		$http({
		    method: 'POST',
		    url: url_prefix + "/user/authenticate_user",
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    data: $.param($scope.login)
		}).success(function (data, response) {
			if(data.response.code === 0) { 
				/* user account does not exist */
				$("#div_busy").hide();
			}
			else if(data.response.code === 1) { 
				$("#div_busy").hide();
				/* user account exist */
				/* check wheter user account is verified (data.user_auth.acct_statu === 1) */
			}
		});		
	}	
});

app.controller("dashboardController", function($scope, $http, $window) {

});

