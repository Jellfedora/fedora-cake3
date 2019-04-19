var App = angular.module('App', []);

App.controller('appController', function appController($scope, $timeout) {
    // console.log('app chargé');
    $('.home__play-now').hover(
        function () {
            console.log('test');
            $('.home__play-now').addClass('shake-slow');
        }
    )
});
