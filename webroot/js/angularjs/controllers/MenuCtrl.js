App.controller('menuController', function menuController($scope, $http) {
    console.log('hey menu');
    // Fait apparaitre le menu des options
    $scope.showMenu = false;
    $scope.toggleShowMenu = function () {
        $scope.showMenu = !$scope.showMenu;
    }

});
