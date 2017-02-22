'user strict';

var IcerllyApp = angular.module('IcerllyApp', []);

IcerllyApp.controller('SearchCtrl', function($scope, $http){
	$scope.search = function() {
		$http.get('search/results', {
			params: {username: $scope.searchInput}
		}).success(function(data){
			$scope.users = data;
		});
	}

	$scope.search_t = function() {
		$http.get('search/results-t', {
			params: {query: $scope.searchInput}
		}).success(function(data){
			$scope.posts = data;
		});
	}
});