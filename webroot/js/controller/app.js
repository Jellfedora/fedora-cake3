
var App = angular.module('App', []);

App.controller('appController', function appController($scope) {
    console.log('hello appAngularJs!');
    // Fait apparaitre le menu des options
    $scope.showMenu = false;
    $scope.toggleShowMenu = function () {
        $scope.showMenu = !$scope.showMenu;
    }
});
