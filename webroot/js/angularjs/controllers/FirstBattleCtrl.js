App.controller('firstBattleController', function firstBattleController($scope, $http) {
    console.log('hello firstbattleAngularJs!');

    $scope.pseudo = 'Jeune femme';
    $scope.introduction = 'Pssst hé toi, reveilles toi...';

    $scope.buttonIntroduction = buttonIntroduction;

    var i = 0;

    function buttonIntroduction() {
        i++;

        $scope.introduction = 'Ah enfin tu ouvres les yeux! Je commencais à me sentir bien seule içi.';
        if (i === 2) {
            $("#monster-roars")[0].play();
            $scope.introduction = '...';
        }
        if (i === 3) {
            $scope.introduction = 'Oh non ils m\'ont retrouvée, ils arrivent!';
        }
        if (i === 4) {
            $scope.introduction = 'Tu sais te battre? Prends mon épée, je suis blessée';
        }
        if (i === 5) {
            $scope.hideIntroduction = !$scope.hideIntroduction;
            $("#battle")[0].play();
        }
    }
});
