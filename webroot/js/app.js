var app = {
    init: function () {
        console.log('Jquery chargé!');

        // Nom des joueurs
        var playerName = $("#playerOneName").text();
        var playerTwoName = $("#playerTwoName").text();

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
        var playerBarWidth = (100);






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

        console.log('ici:  ' + j2Power);
        // Combat Automatique

            function joueur1Attaque() {
                // Bloque le clic des boutons de joueur 1
                $(".attack-input").off();
                // Grise les boutons du joueurs
                $(".attack-input").css("color", "grey");
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
                $('#message').text(playerName + ' donne un coup d\'épée à '+ playerTwoName +', ce qui lui fait perdre '+ j1Atq + ' point de vie' );

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
                    console.log(playerTwoName + ' is dead');
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
                console.log(playerTwoName + ' attaque');
                j2Atq = Math.round(Math.random() * (j2Power - 0) + 0);
                playerOneLife = playerOneLife - j2Atq;

                // Lance les animations de degat sur le joueur 1
                setTimeout(PlayerOneDegatAnimation, 200);

                $('#j1-hp').text(playerOneLife);
                $('#message').text(playerTwoName + ' frappe '+ playerName +' et lui fait perdre '+ j2Atq + ' point de vie!');

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
                    $("#fail")[0].play();
                    $('#j2-hp').text(playerTwoLife);
                    $('#message').text(playerTwoName + ' se rate et perd 3 point de vie!');
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
            $("#battle")[0].play();
            // Bloque le clic des boutons de joueur 1
            $(".attack-input").off();

            // Grise les boutons du joueurs
            $(".attack-input").css("background-color", "grey");

            // Calcul des degats
            // TODO ajouter chance de fail
            // return Math.random() * (max - min) + min;
            j1Atq = Math.round(Math.random() * (j1Power - (j1Power - (j1Power / 2))) + (j1Power - (j1Power / 2)));
            playerTwoLife = playerTwoLife - j1Atq;
            console.log('joueur1: '+j1Atq);

            if (j1Atq > 0) {
                $("#sword2")[0].play();
                // Affichage des dégats
                $("#playerTwoLifeDegat").css("color", "red");
                $("#playerTwoLifeDegat").text('-' + j1Atq);
                // Supprime hp flottant
                setTimeout(deleteHpMessage, 1000);
            }

            // Si le coup vaut zéro le personnage perd de la vie
            if (j1Atq === 0) {
                playerOneLife = playerOneLife - 3;
                $("#fail")[0].play();
                PlayerOneDegatAnimation();
                $('#j1-hp').text(playerOneLife);
                $('#message').text(playerOneName + ' se rate et perd 3 point de vie!');
            } else {
                // Lance les animations de degat sur le joueur 2
                setTimeout(PlayerTwoDegatAnimation, 200);
                // Affiche message de combat
                $('#message').text(playerName + ' donne un coup d\'épée à ' + playerTwoName + ', ce qui lui fait perdre ' + j1Atq + ' point de vie');
            }

            // Met à jour les pv du joueur 2
            $('#j2-hp').text(playerTwoLife);

            // Point de vie restants du joueur2
            var playerTwodegat = playerTwoLifeActuelle - playerTwoLife;
            var playerTwovieRestante = playerTwoLifeActuelle - playerTwodegat;

            // Barre de vie du joueur2
            var playerTwoPourcentage = ((100 * playerTwovieRestante) / playerTwoLifeActuelle);
            // 200 = 200px (la longueur de la barre de vie)
            var playerTwoHpBar = 100 * (playerTwoPourcentage / 100);

            // Ajuste la longueur de barre hp du joueur 2
            $('.player-two-hp-bar').css({ width: playerTwoHpBar + '%' });
            console.log('playerTwoHpBar' + playerTwoHpBar);
            // Si la vie est en dessous de 10%
            if (playerTwoHpBar <= 20) {
                console.log('j2 hp --' + playerTwoHpBar);
                // ne rentre pas dans la condition
                $('.player-two-hp-bar').css("background", "red");
                $(".sprites-player2").css("background-position", "-94px -357px");
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
            // TODO ajouter chance de fail
            // return Math.random() * (max - min) + min;
            j2Atq = Math.round(Math.random() * (j2Power - (j2Power - (j2Power / 2))) + (j2Power - (j2Power / 2)));
            playerOneLife = playerOneLife - j2Atq;
            console.log('joueur2: ' + j2Atq);

            if (j2Atq > 0) {
                $("#sword")[0].play();
                // Affichage des dégats
                $("#playerOneLifeDegat").css("color", "red");
                $("#playerOneLifeDegat").text('-' + j2Atq);
                // Supprime hp flottant
                setTimeout(deleteHpMessage, 1000);
            }
            // Si le coup vaut zéro le personnage perd de la vie
            if (j2Atq === 0) {
                playerTwoLife = playerTwoLife - 3;
                $("#fail")[0].play();
                PlayerTwoDegatAnimation();
                $('#j2-hp').text(playerTwoLife);
                $('#message').text(playerTwoName + ' se rate et perd 3 point de vie!');
            } else {
                // Lance les animations de degat sur le joueur 1
                setTimeout(PlayerOneDegatAnimation, 200);
                // Affiche message de combat
                $('#message').text(playerTwoName + ' frappe ' + playerName + ' et lui fait perdre ' + j2Atq + ' point de vie!');
            }

            // Met à jour les pv du joueur 1
            $('#j1-hp').text(playerOneLife);
            console.log('Vie joueur 1: ' + playerOneLife);

            // Calcul des points de vie restants
            var playerOnedegat = playerOneLifeActuelle - playerOneLife;
            var playerOnevieRestante = playerOneLifeActuelle - playerOnedegat;

            // Barre de vie
            var pourcentage = ((100 * playerOnevieRestante) / playerOneLifeActuelle);
            // 200 = 200px (la longueur de la barre de vie)
            var playerOneHpBar = 100*(pourcentage/100);

            // Ajuste la longueur de barre hp du joueur 1
            $('.player-one-hp-bar').css({ width: playerOneHpBar + '%' });

            // Si la vie est en dessous de 10%
            if (playerOneHpBar <= 20) {
                $('.player-one-hp-bar').css( "background", "red" );
                $("#low-life")[0].play();
                $(".sprites").css("background-position", "-104px -383px")
            }

            // Si plus de vie Game over
            if (($('#j1-hp').text()) <= 0) {
                $('#j1-hp').text('0');
                setTimeout(defeatPlayerOne, 2000);
            }

            setTimeout(unblockPlayerOne, 1500);
        }
        //);

        // Lorsque le joueur 1 prend des degats
        function PlayerOneDegatAnimation() {
            // Fait vibrer l'avatar
            $('#playerOneAvatar').addClass('shake-constant');
            $('#playerOneAvatar').addClass('shake-opacity');
            // Colore la border en red
            // $('#playerOneAvatar').css("border","red 2px solid");
            setTimeout(StopPlayerOneDegatAnimation, 1000);
        }
        // Stop l'animation des degats du joueur 1
        function StopPlayerOneDegatAnimation() {
            // Arrete la vibration de l'avatar
            $('#playerOneAvatar').removeClass('shake-constant');
            $('#playerOneAvatar').removeClass('shake-opacity');
            // Remet la border en black
            // $('#playerOneAvatar').css("border", "none");
        }

        // Efface les hp flottants
        function deleteHpMessage() {
            $("#playerOneLifeDegat").text('');
            $("#playerTwoLifeDegat").text('');
        }

        // Si le joueur 1 utilise une potion
        $('#j1-use-potion').on('click', restoreLife);

        function restoreLife() {
            console.log(playerName + ' se soigne');
            // Bloque le clic des boutons de joueur 1
            $(".attack-input").off();
            // Grise les boutons du joueurs
            $(".attack-input").css("background-color", "grey");


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
                // Affichage des dégats
                $("#playerOneLifeDegat").css("color", "green");
                $("#playerOneLifeDegat").text('+' + potionHp);
                // Message de combat
                $('#message').text(playerName + ' se soigne');
                // Calcul des points de vie restants
                var playerOnedegat = playerOneLifeActuelle - playerOneLife;
                var playerOnevieRestante = playerOneLifeActuelle - playerOnedegat;
                // Barre de vie
                var pourcentage = ((100 * playerOnevieRestante) / playerOneLifeActuelle);
                var playerOneHpBar = 100 * (pourcentage / 100);
                // Ajuste la longueur de barre hp du joueur 1
                $('.player-one-hp-bar').css({
                    width: playerOneHpBar + '%'
                });
                // Supprime hp flottant
                setTimeout(deleteHpMessage, 1000);
                // Relance l'action du joueur 2
                setTimeout(playerTwoAttack, 3000);

            }
        }

        // Re donne la main au joueur
        function unblockPlayerOne() {
            // Re autorise le clic sur les boutons d'attaque/potion
            $('#j1-attaque').on('click', playerOneAttack);
            $('#j1-use-potion').on('click', restoreLife);
            // Recolore les boutons du joueur
            $(".attack-input").css("background-color", "#450000");
        }

        // Si défaite
        function defeatPlayerOne() {
            $(".sprites").css("background-position", "-107px -258px");
            // Message de défaite
            $('#message-loose').removeClass('d-none');
            // Coupe les musiques et lance celle de game over
            $("#battle")[0].pause();
            $("#low-life")[0].pause();
            $("#game-over")[0].play();
        }

        // Si victoire
        function winPlayerOne() {
            $('#playerTwoAvatar').addClass('d-none');
            // Message de victoire
            $('#message-win').removeClass('d-none');
            // Coupe les musiques et lance celle de game over
            $("#battle")[0].pause();
            $("#low-life")[0].pause();
            $("#player-victory")[0].play();
        }

        // Lorsque le joueur 2 prend des degats
        function PlayerTwoDegatAnimation() {
            // Fait vibrer l'avatar
            $('#playerTwoAvatar').addClass('shake-constant');
            $('#playerTwoAvatar').addClass('shake-opacity');
            // Colore la border en red
            // $('#playerTwoAvatar').css("border", "red 2px solid");

            setTimeout(StopPlayerTwoDegatAnimation, 1000);
        }
        // Stop l'animation des degats du joueur 2
        function StopPlayerTwoDegatAnimation() {
            // Arette la vibration de l'avatar
            $('#playerTwoAvatar').removeClass('shake-constant');
            $('#playerTwoAvatar').removeClass('shake-opacity');
            // Remet la border en black
            // $('#playerTwoAvatar').css("border", "none");
        }
    }
}

$(app.init);
