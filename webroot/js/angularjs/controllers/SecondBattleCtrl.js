App.controller('secondBattleController', function secondBattleController($scope, $http) {
    console.log('hello secondbattleAngularJs!');

    $scope.introduction = 'Hé bien il était coriace ce lascard!';

    $scope.buttonIntroduction = buttonIntroduction;

    var i = 0;

    function buttonIntroduction() {
        i++;
        $scope.introduction = 'Je me présentes je m\'appelle Eugenya.';
        if (i === 2) {
            $scope.introduction = 'Tout comme toi je ne sais pas ce que je fait içi, ça fait 2 jours que je cherches un échappatoire.';
        }
        if (i === 3) {
            $scope.introduction = 'J\'ai trouvé cette épée sur un cadavre, il y avait aussi ces 3 fioles, tiens je te les donnes ça peut sûrement te servir.';
        }
        if (i === 4) {
            $scope.introduction = 'Oh non voiçi encore un de ces monstres et il est encore plus gros que le premier!';
        }
        if (i === 5) {
            $scope.hideIntroduction = !$scope.hideIntroduction;
            $("#battle")[0].play();
        }
    }


});
