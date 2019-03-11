App.controller('firstBattleController', function firstBattleController($scope, $http) {
    console.log('hello firstbattleAngularJs!');

    $scope.introduction = 'Jeune femme : ' + ' Pssst hé toi, reveilles toi...';

    $scope.buttonIntroduction = buttonIntroduction;

    var i = 0;

    function buttonIntroduction () {
        i++;
        $scope.introduction = 'Jeune femme : ' + ' Ah enfin tu ouvres les yeux! Je commencais à me sentir bien seule içi.';
        if (i === 2) {
            $scope.introduction = 'Jeune femme : ' + ' Oh non ils m\'ont retrouvée, j\'entends leurs grognements ils arrivent!';
        }
        if (i === 3) {
            $scope.introduction = 'Jeune femme : ' + ' Tu sais te battre? Prends mon épée, je suis blessée';
        }
        if (i === 4) {
            $scope.hideIntroduction = !$scope.hideIntroduction;
            $("#battle")[0].play();
        }
    }


});
