App.controller('menuController', function menuController($scope, $timeout) {

    $timeout(function () {
        console.log('hey menu');
        // Fait apparaitre le menu des options
        $scope.showMenu = false;
        $scope.toggleShowMenu = function () {
            $scope.showMenu = !$scope.showMenu;
        }

    }, 2500);





});
