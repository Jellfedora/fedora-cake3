App.controller('menuController', function menuController($scope) {
    console.log('hey menu');
    $(function () {
        $('.tlt').textillate();
    })
    // Fait apparaitre le menu des options
    $scope.showMenu = false;
    $scope.toggleShowMenu = function () {
        $scope.showMenu = !$scope.showMenu;
    }

});
