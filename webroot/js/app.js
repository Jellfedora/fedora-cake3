var app = {
    init: function () {
        console.log('init');

        var playerName = $("#playerName").text();
        var bossName = $("#bossName").text();
        var time;

        var playerPotion = parseInt($('#j1-potion').text());
        var potionHp = 20;
        //var j1Atq = parseInt(10);
        var j1Power = parseInt($('#j1-power').text());
        var j1Hp = parseInt($('#j1-hp').text());

        var j2Power = parseInt($('#j2-power').text());
        var j2Hp = parseInt($('#j2-hp').text());

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
                j1Hp = j1Hp + potionHp;
                $('#j1-potion').text(playerPotion);
                $('#j1-hp').text(j1Hp);
            }
        }

        // Combat Automatique

            function joueur1Attaque() {
                $('#player-one-portrait').addClass('border-active');
                $('#player-two-portrait').removeClass('border-active');
                console.log(playerName + ' attaque');
                j1Atq = Math.round(Math.random() * (j1Power - 0) + 0);
                j2Hp = j2Hp - j1Atq;
                $('#j2-hp').text(j2Hp);
                console.log(j1Atq);
                $('#message').text(playerName + ' donne un coup d\'épée à '+ bossName +',ce qui lui fait perdre '+ j1Atq + ' point de vie' );

                // Si le coup vaut zéro le personnage perd de la vie
                if (j1Atq === 0) {
                    j1Hp = j1Hp - 3;
                    $('#j1-hp').text(j1Hp);
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
                j1Hp = j1Hp - j2Atq;
                $('#j1-hp').text(j1Hp);
                $('#message').text(bossName + ' donne un coup de Masamune sur '+ playerName +' et lui fait perdre '+ j2Atq + ' point de vie!');

                // Si le coup vaut zéro le personnage perd de la vie
                if (j2Atq === 0) {
                    j2Hp = j2Hp - 3;
                    $('#j2-hp').text(j2Hp);
                    $('#message').text(bossName + ' se rate et perd 3 point de vie!');
                }

                if (($('#j1-hp').text()) <= 0) {
                    $('#j1-hp').text('0');
                    console.log(bossName + ' is dead');
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
            j2Hp = j2Hp - j1Atq;
            console.log(j1Atq);
            $('#j2-hp').text(j2Hp).delay(2000);

            if (($('#j2-hp').text()) <= 0) {
                $('#j2-hp').text('Game over');
            }
        });


        // Attaque du joueur 2
        $('#j2-attaque').on('click', function () {
            j2Atq = Math.round(Math.random() * (j2Power - 0) + 0);
            j1Hp = j1Hp - j2Atq;
            $('#j1-hp').text(j1Hp);
            if (($('#j1-hp').text()) <= 0) {
                $('#j1-hp').text('Game over');
            }
        });
    }
}

$(app.init);
