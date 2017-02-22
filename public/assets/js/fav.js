'user strict';

var IcerllyApp = angular.module('IcerllyApp', []);

IcerllyApp.controller('SearchCtrl', function($scope, $http){
	$scope.favPost = function(user_id,post_id){
        $http.get('../../ajax/fav', {
			params: {user_id: user_id,post_id: post_id}
		}).success(function(data){
			$scope.unfaved = true;
		});
    }

    $scope.unfavPost = function(user_id,post_id){
        $http.get('../../ajax/unfav', {
			params: {user_id: user_id,post_id: post_id}
		}).success(function(data){
			$scope.unfaved = false;
		});
    }

    $scope.rePost = function(user_id,post_id){
        $http.get('../../ajax/repost', {
			params: {user_id: user_id,post_id: post_id}
		}).success(function(data){
			$scope.unrepost = true;
		});
    }

    $scope.unrePost = function(user_id,post_id){
        $http.get('../../ajax/unrepost', {
			params: {user_id: user_id,post_id: post_id}
		}).success(function(data){
			$scope.unrepost = false;
		});
    }

});