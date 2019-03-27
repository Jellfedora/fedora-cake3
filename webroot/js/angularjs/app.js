var App = angular.module('App', []);

App.controller('appController', function appController($scope, $timeout) {
    console.log('app chargé');

    // $timeout(function () {
    //     console.log('hello appAngularJs!');
    //     $scope.showContent = !$scope.showContent;

    // }, 3000);
});
