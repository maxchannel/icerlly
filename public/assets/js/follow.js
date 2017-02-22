'user strict';

var IcerllyApp = angular.module('IcerllyApp', []);

IcerllyApp.controller('SearchCtrl', function($scope, $http){
	$scope.followUser = function(user_id,follow_to_id){
        $http.get('ajax/follow', {
			params: {user_id: user_id,follow_to_id: follow_to_id}
		}).success(function(data){
			$scope.unfollow = true;
		});
    }

    $scope.unfollowUser = function(user_id,follow_to_id){
        $http.get('ajax/unfollow', {
			params: {user_id: user_id,follow_to_id: follow_to_id}
		}).success(function(data){
			$scope.unfollow = false;
		});
    }

});