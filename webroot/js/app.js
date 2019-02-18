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

        // Point de vie supérieur à 10%
        var playerOne10Hp = playerOneLifeActuelle / 10;
        var playerTwo10Hp = playerTwoLifeActuelle / 10;




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

        // Combat Automatique

            function joueur1Attaque() {
                if (playerOneLife > playerOne10Hp) {
                    $('.player-one-hp-bar').css("background", "green");
                }

                // Lance les animations de degat sur le joueur 2
                setTimeout(PlayerTwoDegatAnimation, 200);

                // Point de vie restants
                var playerOnedegat = playerOneLifeActuelle - playerOneLife;
                var playerOnevieRestante = playerOneLifeActuelle - playerOnedegat;
                console.log('Vie restant du joueur 1: ' + playerOnevieRestante + 'hp');



                $('.player-bar').addClass('border-active');
                $('#player-two-portrait').removeClass('border-active');
                //console.log(playerName + ' attaque');
                j1Atq = Math.round(Math.random() * (j1Power - 0) + 0);
                playerTwoLife = playerTwoLife - j1Atq;



                $('#j2-hp').text(playerTwoLife);
                //console.log(j1Atq);
                $('#message').text(playerName + ' donne un coup d\'épée à '+ bossName +', ce qui lui fait perdre '+ j1Atq + ' point de vie' );

                // Point de vie restants du joueur2
                var playerTwodegat = playerTwoLifeActuelle - playerTwoLife;

                var playerTwovieRestante = playerTwoLifeActuelle - playerTwodegat;

                // Barre de vie du joueur2
                var playerTwoPourcentage = ((100 * playerTwovieRestante) / playerTwoLifeActuelle);
                var playerTwoHpBar = 200 * (playerTwoPourcentage / 100);
                $('.player-two-hp-bar').css({ width: playerTwoHpBar + 'px' });

                // Si la vie est en dessous de 10%
                if (playerTwoHpBar <= 20) {
                    $('.player-two-hp-bar').css("background", "red");
                }

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
                    $("#low-life")[0].pause();
                    $("#player-victory")[0].play();
                    clearInterval(time);
                }
                else {
                    setTimeout(joueur2Attaque,4000);
                }
            }

            function joueur2Attaque() {
                if (playerTwoLife > playerTwo10Hp) {
                    console.log('hey');
                    $('.player-two-hp-bar').css("background", "green");
                }



                $('.player-bar').removeClass('border-active');
                $('#player-two-portrait').addClass('border-active');
                console.log(bossName + ' attaque');
                j2Atq = Math.round(Math.random() * (j2Power - 0) + 0);
                playerOneLife = playerOneLife - j2Atq;

                // Lance les animations de degat sur le joueur 1
                setTimeout(PlayerOneDegatAnimation, 200);

                $('#j1-hp').text(playerOneLife);
                $('#message').text(bossName + ' frappe '+ playerName +' et lui fait perdre '+ j2Atq + ' point de vie!');

                // Point de vie restants du joueur1
                var playerOnedegat = playerOneLifeActuelle - playerOneLife;
                var playerOnevieRestante = playerOneLifeActuelle - playerOnedegat;

                // Barre de vie du joueur1
                var playerOnePourcentage = ((100 * playerOnevieRestante) / playerOneLifeActuelle);
                var playerOneHpBar = 200 * (playerOnePourcentage / 100);
                $('.player-one-hp-bar').css({ width: playerOneHpBar + 'px' });

                // Si la vie est en dessous de 10%
                if (playerOneHpBar <= 20) {
                    $('.player-one-hp-bar').css("background", "red");
                    //$("#player-battle")[0].pause();
                    $("#low-life")[0].play();
                }

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
                    $("#low-life")[0].pause();
                    $("#game-over")[0].play();

                    clearInterval(time);
                }
                else {
                    setTimeout(joueur1Attaque, 4000);
                }
            }



        //Combat manuel
        $('#j1-attaque').on('click', playerOneAttack);

        // Attaque du joueur 1
        function playerOneAttack() {
        //$('#j1-attaque').on('click', function () {
            // Bloque le clic des boutons de joueur 1
            $(".attack-input").off();

            // Calcul des degats
            // return Math.random() * (max - min) + min;
            j1Atq = Math.round(Math.random() * (j1Power - 0) + 0);
            playerTwoLife = playerTwoLife - j1Atq;
            console.log('joueur1: '+j1Atq);

            // Met à jour les pv du joueur 2
            $('#j2-hp').text(playerTwoLife);

            // Lance les animations de degat sur le joueur 2
            setTimeout(PlayerTwoDegatAnimation, 200);

            // Point de vie restants du joueur2
            var playerTwodegat = playerTwoLifeActuelle - playerTwoLife;
            var playerTwovieRestante = playerTwoLifeActuelle - playerTwodegat;

            // Barre de vie du joueur2
            var playerTwoPourcentage = ((100 * playerTwovieRestante) / playerTwoLifeActuelle);
            var playerTwoHpBar = 200 * (playerTwoPourcentage / 100);

            // Affiche message de combat
            $('#message').text(playerName + ' donne un coup d\'épée à ' + bossName + ', ce qui lui fait perdre ' + j1Atq + ' point de vie');

            // Ajuste la longueur de barre hp du joueur 2
            $('.player-two-hp-bar').css({ width: playerTwoHpBar + 'px' });

            // Si la vie est en dessous de 10%
            if (playerTwoHpBar <= 20) {
                $('.player-two-hp-bar').css("background", "red");
            }

            // Si l'ennemi n'a plus de vie, victoire
            if (($('#j2-hp').text()) <= 0) {
                $('#j2-hp').text('0');
                setTimeout(winPlayerOne, 2000);
            }else {
                // Sinon il attaque
                setTimeout(playerTwoAttack, 2000);
            }

        }
        //);


        // Attaque du joueur 2
        function playerTwoAttack() {
        //$('#j2-attaque').on('click', function () {

            // Calcul des degats
            // return Math.random() * (max - min) + min;
            j2Atq = Math.round(Math.random() * (j2Power - 0) + 0);
            playerOneLife = playerOneLife - j2Atq;
            console.log('joueur2: ' + j2Atq);
            // Met à jour les pv du joueur 1
            $('#j1-hp').text(playerOneLife);

            // Lance les animations de degat sur le joueur 1
            setTimeout(PlayerOneDegatAnimation, 200);

            // Calcul des points de vie restants
            var playerOnedegat = playerOneLifeActuelle - playerOneLife;
            var playerOnevieRestante = playerOneLifeActuelle - playerOnedegat;

            // Barre de vie
            var pourcentage = ((100 * playerOnevieRestante) / playerOneLifeActuelle);
            var playerOneHpBar = 200*(pourcentage/100);

            // Affiche message de combat
            $('#message').text(bossName + ' frappe ' + playerName + ' et lui fait perdre ' + j2Atq + ' point de vie!');

            // Ajuste la longueur de barre hp du joueur 1
            $('.player-one-hp-bar').css({ width: playerOneHpBar + 'px' });

            // Si la vie est en dessous de 10%
            if (playerOneHpBar <= 20) {
                $('.player-one-hp-bar').css( "background", "red" );
                $("#low-life")[0].play();
            }

            // Si plus de vie Game over
            if (($('#j1-hp').text()) <= 0) {
                $('#j1-hp').text('0');
                setTimeout(defeatPlayerOne, 2000);
            }

            // Re autorise le clic sur les boutons d'attaque/potion
            $('#j1-attaque').on('click', playerOneAttack);
            $('#j1-use-potion').on('click', restoreLife);
        }
        //);

        // Lorsque le joueur 1 prend des degats
        function PlayerOneDegatAnimation() {
            // Fait vibrer l'avatar
            $('.player-bar__avatar').addClass('shake-constant');
            $('.player-bar__avatar').addClass('shake-opacity');
            // Colore la border en red
            $('.player-bar').css("border","red 2px solid");
            setTimeout(StopPlayerOneDegatAnimation, 1000);
        }
        // Stop l'animation des degats du joueur 1
        function StopPlayerOneDegatAnimation() {
            // Arrete la vibration de l'avatar
            $('.player-bar__avatar').removeClass('shake-constant');
            // Remet la border en black
            $('.player-bar').css("border", "black 2px solid");
        }

        // Si le joueur 1 utilise une potion
        $('#j1-use-potion').on('click', restoreLife);

        function restoreLife() {
            console.log(playerName + ' se soigne');
            // Bloque le clic des boutons de joueur 1
            $(".attack-input").off();


            if (playerPotion > 0) {
                playerPotion--;
                playerOneLife = playerOneLife + potionHp;
                $('#j1-potion').text(playerPotion);
                // TODO Ajouter barre de vie
                if (playerOneLife > 100) {
                    $('#j1-hp').text(100);
                    playerOneLife = 100;
                } else {
                    $('#j1-hp').text(playerOneLife);
                }
                // Calcul des points de vie restants
                var playerOnedegat = playerOneLifeActuelle - playerOneLife;
                var playerOnevieRestante = playerOneLifeActuelle - playerOnedegat;
                // Barre de vie
                var pourcentage = ((100 * playerOnevieRestante) / playerOneLifeActuelle);
                var playerOneHpBar = 200 * (pourcentage / 100);
                // Ajuste la longueur de barre hp du joueur 1
                $('.player-one-hp-bar').css({
                    width: playerOneHpBar + 'px'
                });
                // Relance l'action du joueur 2
                setTimeout(playerTwoAttack, 2000);

            }
        }

        // Si défaite
        function defeatPlayerOne() {
            // Message de défaite
            $('#message').text('Game Over');
            // Coupe les musiques et lance celle de game over
            $("#player-battle")[0].pause();
            $("#low-life")[0].pause();
            $("#game-over")[0].play();
        }

        // Si victoire
        function winPlayerOne() {
            // Message de victoire
            $('#message').text('Victoire!');
            // Coupe les musiques et lance celle de game over
            $("#player-battle")[0].pause();
            $("#low-life")[0].pause();
            $("#player-victory")[0].play();
        }

        // Lorsque le joueur 2 prend des degats
        function PlayerTwoDegatAnimation() {
            // Fait vibrer l'avatar
            $('.fight-avatar').addClass('shake-constant');
            $('.fight-avatar').addClass('shake-opacity');
            // Colore la border en red
            $('#player-two-portrait').css("border", "red 2px solid");

            setTimeout(StopPlayerTwoDegatAnimation, 1000);
        }
        // Stop l'animation des degats du joueur 2
        function StopPlayerTwoDegatAnimation() {
            // Arette la vibration de l'avatar
            $('.fight-avatar').removeClass('shake-constant');
            // Remet la border en black
            $('#player-two-portrait').css("border", "black 2px solid");
        }
    }
}

$(app.init);
