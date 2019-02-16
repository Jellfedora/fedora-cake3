var app = {
    init: function () {
        console.log('Jquery chargé!');

        // Nom des joueurs
        var playerName = $("#playerName").text();
        var bossName = $("#bossName").text();

        // Potion du joueur
        var playerPotion = parseInt($('#j1-potion').text());
        var potionHp = 20;

        // Point de vie initiaux
        var playerOneLifeActuelle = parseInt($('#j1initiaux-hp').text());
        var playerTwoLifeActuelle = parseInt($('#j2initiaux-hp').text());


        var playerOneLife = parseInt($('#j1-hp').text());
        var playerTwoLife = parseInt($('#j2-hp').text());
        //console.log(playerOneLife);



        // Barre de vie
        var playerBarWidth = (200);






        // Attaque des joueurs
        var j1Power = parseInt($('#j1-power').text());
        var j2Power = parseInt($('#j2-power').text());

        var time;

        // Coupe le son du jeu
        $('#sound-player').on('click', stopMusic);
        function stopMusic() {
            $(".audio-player")[0].pause();
        }

        // Lance un combat automatique
        $('#auto').on('click', fightAuto);
        function fightAuto() {
            setTimeout(joueur1Attaque, 5000);
            //$("#fight-logo").removeClass("d-none");
            $("#player-battle")[0].play();
        }

        // Relance un combat (à débuguer!!)
        $('#reload-fight').on('click', reloadFight);
        function reloadFight() {
            $('#j1-hp').text(100);
            $('#j2-hp').text(150);
            setTimeout(joueur1Attaque, 5000);
            $("#player-battle")[0].play();
        }

        // Utilise une potion
        $('#j1-use-potion').on('click', restoreLife);
        function restoreLife() {
            console.log(playerName + ' se soigne');
            if (playerPotion > 0) {
                playerPotion--;
                playerOneLife = playerOneLife + potionHp;
                $('#j1-potion').text(playerPotion);
                $('#j1-hp').text(playerOneLife);
            }
        }

        // Combat Automatique

            function joueur1Attaque() {
                // Point de vie restants
                var playerOnedegat = playerOneLifeActuelle - playerOneLife;
                var playerOnevieRestante = playerOneLifeActuelle - playerOnedegat;
                console.log('Vie restant du joueur 1: ' + playerOnevieRestante + 'hp');



                $('#player-one-portrait').addClass('border-active');
                $('#player-two-portrait').removeClass('border-active');
                //console.log(playerName + ' attaque');
                j1Atq = Math.round(Math.random() * (j1Power - 0) + 0);
                playerTwoLife = playerTwoLife - j1Atq;


                $('#j2-hp').text(playerTwoLife);
                //console.log(j1Atq);
                $('#message').text(playerName + ' donne un coup d\'épée à '+ bossName +',ce qui lui fait perdre '+ j1Atq + ' point de vie' );

                // Point de vie restants du joueur2
                var playerTwodegat = playerTwoLifeActuelle - playerTwoLife;

                var playerTwovieRestante = playerTwoLifeActuelle - playerTwodegat;

                // Barre de vie du joueur2
                var playerTwoPourcentage = ((100 * playerTwovieRestante) / playerTwoLifeActuelle);
                var playerTwoHpBar = 200 * (playerTwoPourcentage / 100);

                $('.player-two-hp-bar').css({ width: playerTwoHpBar + 'px' });

                // Si le coup vaut zéro le personnage perd de la vie
                if (j1Atq === 0) {
                    playerOneLife = playerOneLife - 3;
                    $('#j1-hp').text(playerOneLife);
                    $('#message').text(playerName + ' se rate et perd 3 point de vie!');
                }



                if (($('#j2-hp').text()) <= 0) {
                    $('#j2-hp').text('0');
                    console.log(bossName + ' is dead');
                    $("#player-battle")[0].pause();
                    $("#player-victory")[0].play();
                    clearInterval(time);
                }
                else {
                    setTimeout(joueur2Attaque,4000);
                }
            }

            function joueur2Attaque() {

                $('#player-one-portrait').removeClass('border-active');
                $('#player-two-portrait').addClass('border-active');
                console.log(bossName + ' attaque');
                j2Atq = Math.round(Math.random() * (j2Power - 0) + 0);
                playerOneLife = playerOneLife - j2Atq;
                $('#j1-hp').text(playerOneLife);
                $('#message').text(bossName + ' donne un coup de Masamune sur '+ playerName +' et lui fait perdre '+ j2Atq + ' point de vie!');

                // Point de vie restants du joueur1
                var playerOnedegat = playerOneLifeActuelle - playerOneLife;
                var playerOnevieRestante = playerOneLifeActuelle - playerOnedegat;

                // Barre de vie du joueur1
                var playerOnePourcentage = ((100 * playerOnevieRestante) / playerOneLifeActuelle);
                var playerOneHpBar = 200 * (playerOnePourcentage / 100);
                $('.player-one-hp-bar').css({ width: playerOneHpBar + 'px' });

                // Si le coup vaut zéro le personnage perd de la vie
                if (j2Atq === 0) {
                    playerTwoLife = playerTwoLife - 3;
                    $('#j2-hp').text(playerTwoLife);
                    $('#message').text(bossName + ' se rate et perd 3 point de vie!');
                }

                if (($('#j1-hp').text()) <= 0) {
                    $('#j1-hp').text('0');
                    console.log(playerName + ' is dead');
                    $("#player-battle")[0].pause();
                    $("#game-over")[0].play();
                    clearInterval(time);
                }
                else {
                    setTimeout(joueur1Attaque, 4000);
                }
            }



        //Combat manuel

        // Attaque du joueur 1
        $('#j1-attaque').on('click', function () {
            j1Atq = Math.round(Math.random() * (j1Power - 0) + 0);
            playerTwoLife = playerTwoLife - j1Atq;
            console.log(j1Atq);
            $('#j2-hp').text(playerTwoLife).delay(2000);

            if (($('#j2-hp').text()) <= 0) {
                $('#j2-hp').text('Game over');
            }

            // Point de vie restants du joueur2
            var playerTwodegat = playerTwoLifeActuelle - playerTwoLife;

            var playerTwovieRestante = playerTwoLifeActuelle - playerTwodegat;

            // Barre de vie du joueur2
            var playerTwoPourcentage = ((100 * playerTwovieRestante) / playerTwoLifeActuelle);
            var playerTwoHpBar = 200 * (playerTwoPourcentage / 100);

            $('.player-two-hp-bar').css({ width: playerTwoHpBar + 'px' });
        });


        // Attaque du joueur 2
        $('#j2-attaque').on('click', function () {

            j2Atq = Math.round(Math.random() * (j2Power - 0) + 0);
            playerOneLife = playerOneLife - j2Atq;
            $('#j1-hp').text(playerOneLife);
            if (($('#j1-hp').text()) <= 0) {
                $('#j1-hp').text('Game over');
            }

            // Point de vie restants
            var playerOnedegat = playerOneLifeActuelle - playerOneLife;

            var playerOnevieRestante = playerOneLifeActuelle - playerOnedegat;

            // Barre de vie
            var pourcentage = ((100 * playerOnevieRestante) / playerOneLifeActuelle);
            var playerOneHpBar = 200*(pourcentage/100);

            $('.player-one-hp-bar').css({ width: playerOneHpBar + 'px' });
        });
    }
}

$(app.init);
