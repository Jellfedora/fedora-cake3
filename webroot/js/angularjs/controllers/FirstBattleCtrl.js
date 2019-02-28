App.controller('firstBattleController', function firstBattleController($scope, $http) {
    console.log('hello firstbattleAngularJs!');

    $scope.introduction = 'Psss hé petit, reveilles toi...';

    $scope.buttonIntroduction = buttonIntroduction;

    var i = 0;

    function buttonIntroduction () {
        i++;
        $scope.introduction = 'Réveilles toi il arrive!';
        if (i === 2) {
            $scope.introduction = '...';
        }
        if (i === 3) {
            $scope.introduction = 'Trop tard je t \'avais prévenu! Ramasse cette épée et bats toi!';
        }
        if (i === 4) {
            $scope.hideIntroduction = !$scope.hideIntroduction;
            $("#battle")[0].play();
        }
    }


});
