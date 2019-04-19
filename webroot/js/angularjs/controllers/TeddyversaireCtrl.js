App.controller('teddyversaireController', function teddyversaireController($scope, $http) {
    console.log('hello teddyAngularJs!');

    function playMusic() {
        console.log('Play musique');
        $("#happy-birthday")[0].play();
    }
    playMusic();
});
