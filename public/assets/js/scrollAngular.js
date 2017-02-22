var myApp = angular.module('myApp', ['infinite-scroll']);

myApp.controller('DemoController', function($scope, Reddit,$http) {
    $scope.reddit = new Reddit();

    $scope.favPost = function(user_id,post_id){
        $http.get('../ajax/fav', {
            params: {user_id: user_id,post_id: post_id}
        }).success(function(data){
            $scope.unfaved = true;
        });
    }

    $scope.unfavPost = function(user_id,post_id){
        $http.get('../ajax/unfav', {
            params: {user_id: user_id,post_id: post_id}
        }).success(function(data){
            $scope.unfaved = false;
        });
    }
});

myApp.factory('Reddit', function($http) {
    var Reddit = function() {
        this.items = [];
        this.busy = false;
        this.after = 1;
    };

    Reddit.prototype.nextPage = function() {
        if(this.busy) return;
        this.busy = true;    

        var url = "../api/posts?page="+this.after;
        $http.get(url).success(function(data) 
        { 
            //console.log(data.data[0].favs);
            for(var i = 0; i < data.data.length; i++) {
                this.items.push(data.data[i]);
            }    
            this.after++;
            this.busy = false;
        }.bind(this));
    };  
    return Reddit;
});

