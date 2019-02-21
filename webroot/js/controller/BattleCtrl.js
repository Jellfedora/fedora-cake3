

App.controller('battleController', function battleController($scope) {
    console.log('hello battleAngularJs!');

    // Fait apparaitre le menu des options
    $scope.showBattleMenu = false;
    $scope.toggleShowBattleMenu = function () {
        console.log("Menu de bataille")
        $scope.showBattleMenu = !$scope.showBattleMenu;
    }

});
