'user strict';

var IcerllyApp = angular.module('IcerllyApp', []);

IcerllyApp.controller('SearchCtrl', function($scope, $http){
	$scope.xCode = function(user_id, apply_id){
        $http.get('../../ajax/xCode', {
			params: {user_id: user_id, apply_id: apply_id}
		}).success(function(data){
			alert('Aprobado :)');
		});
    }

    $scope.numbA = function(editor_number){
        $http.get('../../ajax/numbA', {
			params: {editor_number: editor_number}
		}).success(function(data){
			alert('Aprobado :)');
		});
    }

});