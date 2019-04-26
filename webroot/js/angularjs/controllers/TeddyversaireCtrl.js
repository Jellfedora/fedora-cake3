App.controller('teddyversaireController', function teddyversaireController($scope, $http) {
    console.log('hello teddyAngularJs!');


    $scope.play = playMusic;

    function playMusic() {
        console.log('Play musique');
        // Lance la musique
        $("#happy-birthday")[0].play();
        // Fait apparaitre le contenu
        $(".teddy__content").removeClass('d-none');
        // Change le background
        $(".teddy").css("background-image", "url('https://media1.tenor.com/images/a970086e5f872de9e6ba68a7926a1fc5/tenor.gif?itemid=13107775')");
        // Fait disparaitre le button et le small
        $("#sound-button").addClass('d-none');
        $(".teddy__small").addClass('d-none');
    }
    // playMusic();
});
