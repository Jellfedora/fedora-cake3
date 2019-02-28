

App.controller('battleController', function battleController($scope, $http) {
    console.log('hello battleAngularJs!');


    $scope.loadHero = function() {
    // Récupére les infos sur le joueur
    return $http({
        method: 'GET',
        url: 'hero_info'
    }).then(function (response) {
        console.log(response.data);
        $scope.hero_name = response.data.name;
        $scope.hero_attaque = parseInt(response.data.attaque);
        $scope.hero_hp = parseInt(response.data.hp);
        $scope.hero_hp_init = parseInt(response.data.hp);
        $scope.hero_potion = parseInt(response.data.potion);
        $scope.hero_level = parseInt(response.data.level);

    }, function (response) {
        // code to execute in case of error
    });
}
    // Définit que le joueur ne bloque pas par défaut
    var playerOneBlockStatut = false;





    // Fait apparaitre le menu des options
    $scope.toggleShowBattleMenu = toggleShowBattleMenu;

    function toggleShowBattleMenu() {
        console.log('menu');
        $scope.showBattleMenu = true;
    }

    // Fait disparaitre le menu des options
    $scope.toggleHideBattleMenu = toggleHideBattleMenu;

    function toggleHideBattleMenu() {
        console.log('menuhide');
        $scope.showBattleMenu = false;
    }

    // Fait apparaitre le menu des compétences de magie
    $scope.toggleShowMagicMenu = toggleShowMagicMenu;
    function toggleShowMagicMenu() {
        $scope.hideMagicMenu = true;
    }

    // Fait disparaitre le menu des compétences de magie
    $scope.toggleHideMagicMenu = toggleHideMagicMenu;
    function toggleHideMagicMenu() {
        $scope.hideMagicMenu = false;
    }

    // Divise le prochain coup par 5
    $scope.playerOneBlock = playerOneBlock;
    function playerOneBlock() {
        // Bloque le clic des boutons de joueur 1
        $(".attack-input").off();

        // Grise les boutons du joueurs
        $(".attack-input").css("background-color", "grey");
        console.log($scope.hero_name + ' bloque le coup');
        playerOneBlockStatut = true;
        console.log(playerOneBlockStatut);
        playerTwoAttack();
    }

    // Coupe le son du jeu
    $scope.stopMusic = stopMusic;

    function stopMusic() {
        console.log('musique en pause');
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

    //Combat manuel
    $scope.playerOneAttack = playerOneAttack;

    // Attaque du joueur 1
     function playerOneAttack() {
        // Nom des joueurs
        var playerName = $scope.hero_name;
        var playerTwoName = $("#playerTwoName").text();



        // Point de vie initiaux
        var playerOneLifeActuelle = $scope.hero_hp;
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
        var j1Power = $scope.hero_attaque;



        var time;
        //$('#j1-attaque').on('click', function () {
        $("#battle")[0].play();
        // Bloque le clic des boutons de joueur 1
        $(".attack-input").off();

        // Grise les boutons du joueurs
        $(".attack-input").css("background-color", "grey");

        //Animations
        $(".battle__map").css("justify-content", "flex-end");
        $(".battle__map__player-one-avatar").css("justify-content", "flex-end");
        $(".battle__map__player-two-avatar").css("justify-content", "flex-start");

        $('.weapons').removeClass("d-none");
        $('.sprites-attack').removeClass("d-none");



        // Calcul des degats
        // TODO ajouter chance de fail
        // return Math.random() * (max - min) + min;
        j1Atq = Math.round(Math.random() * (j1Power - (j1Power - (j1Power / 2))) + (j1Power - (j1Power / 2)));
        playerTwoLife = playerTwoLife - j1Atq;
        console.log('joueur1 attaque: ' + j1Power);

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
            $('#message').text($scope.hero_name + ' se rate et perd 3 point de vie!');
        } else {
            // Lance les animations de degat sur le joueur 2
            setTimeout(PlayerTwoDegatAnimation, 200);
            // Affiche message de combat
            $('#message').text($scope.hero_name + ' donne un coup d\'épée à ' + playerTwoName + ', ce qui lui fait perdre ' + j1Atq + ' point de vie');
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
        $('.player-two-hp-bar').css({
            width: playerTwoHpBar + '%'
        });
        console.log('playerTwoHpBar' + playerTwoHpBar);
        // Si la vie est en dessous de 10%
        if (playerTwoHpBar <= 20) {
            console.log('j2 hp --' + playerTwoHpBar);
            // ne rentre pas dans la condition
            $('.player-two-hp-bar').css("background", "red");
            $(".sprites-player2").css("background-position", "-94px -357px");
            $(".sprites-boss-malboro").css("background-position", "1px 10px");
            $(".sprites-boss-bomb").css("background-position", "-41px -599px");
        }

        // Si l'ennemi n'a plus de vie, victoire
        if (($('#j2-hp').text()) <= 0) {
            $('#j2-hp').text('0');
            setTimeout(winPlayerOne, 2000);
        } else {
            // Replace les joueurs
            setTimeout(replacePlayers,1000);
            // Sinon il attaque
            setTimeout(playerTwoAttack, 3000);
        }

    }
    //);


    // Attaque du joueur 2
    function playerTwoAttack() {
        $('.weapons').addClass("d-none");
        $('.sprites-attack').addClass("d-none");





        //$('#j2-attaque').on('click', function () {
        // Calcul des degats
        // TODO ajouter chance de fail
        // return Math.random() * (max - min) + min;
        var j2Power = parseInt($('#j2-power').text());
        var playerHpInitial = parseInt($('#j1initiaux-hp').text());
        var playerOneLife = parseInt($('#j1-hp').text());


        j2Atq = Math.round(Math.random() * (j2Power - (j2Power - (j2Power / 2))) + (j2Power - (j2Power / 2)));
        // Si le joueur 1 se protége
        if (playerOneBlockStatut === true) {
            // TODO Ajouter animation pour rendre ca visuel A REGLER
            playerOneBlockAnnimation();
            // Divise les degats par 5
            j2Atq = (j2Atq / 5);
            playerOneBlockStatut = false;
        }

        $scope.hero_hp = $scope.hero_hp - j2Atq;

        Math.round($scope.hero_hp, 0);
        if (j2Atq > 0) {
            $("#sword")[0].play();
            // Affichage des dégats
            // $("#playerOneLifeDegat").css("color", "red");
            // $("#playerOneLifeDegat").text('-' + j2Atq);
            // Supprime hp flottant
            // setTimeout(deleteHpMessage, 1000);
        }

        // Si le coup vaut zéro le personnage perd de la vie
        if (j2Atq === 0) {
            playerTwoLife = playerTwoLife - 3;
            $("#fail")[0].play();
            PlayerTwoDegatAnimation();
            $('#j2-hp').text(playerTwoLife);
            //$('#message').text(playerTwoName + ' se rate et perd 3 point de vie!');
        } else {
            // Lance les animations de degat sur le joueur 1
            setTimeout(PlayerOneDegatAnimation, 200);
            // Affiche message de combat
            //$('#message').text(playerTwoName + ' frappe ' + $scope.hero_name + ' et lui fait perdre ' + j2Atq + ' point de vie!');
        }

        // Met à jour les pv du joueur 1
        $('#j1-hp').text($scope.hero_hp);

        // Calcul des points de vie restants
        var playerOnedegat = $scope.hero_hp - playerOneLife;
        var playerOnevieRestante = $scope.hero_hp - playerOnedegat;

        // Barre de vie
        var pourcentage = ((100 * playerOnevieRestante) / playerHpInitial);
        // 200 = 200px (la longueur de la barre de vie)
        var playerOneHpBar = 100 * (pourcentage / 100);

        console.log(pourcentage);
        // Ajuste la longueur de barre hp du joueur 1
        $('.player-one-hp-bar').css({
            width: playerOneHpBar + '%'
        });

        // Si la vie est en dessous de 10%
        if (playerOneHpBar <= 20) {
            $('.player-one-hp-bar').css("background", "red");
            $("#low-life")[0].play();
            $(".sprites").css("background-position", "-104px -387px")
        }

        // Si plus de vie Game over
        if (($('#j1-hp').text()) <= 0) {
            $('#j1-hp').text('0');
            setTimeout(defeatPlayerOne, 2000);
        }

        // Replace les joueurs
        setTimeout(replacePlayers, 1000);
        // Débloque le joueur 1
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
        //$(".battle__map__player-two-avatar").css("justify-content", "flex-start");
        //$(".battle__map").css("width", "45%");
        //$(".battle__map").css("justify-content", "flex-end");
        setTimeout(StopPlayerOneDegatAnimation, 1000);
    }

    // Lorsque le joueur bloque une attaque
    function playerOneBlockAnnimation () {
        $('.weapons').removeClass("d-none");
        $(".weapons").css("right", "31px");
        $(".weapons").css("background-position", "-225px -243px");
        $(".weapons").css("height", "27px");
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

    // Remet les joueurs à leur position d'origine
    function replacePlayers() {
        $(".battle__map").css("justify-content", "space-between");
        $(".battle__map__player-one-avatar").css("justify-content", "center");
        $(".battle__map__player-two-avatar").css("justify-content", "center");
    }

    // Efface les hp flottants
    function deleteHpMessage() {
        $("#playerOneLifeDegat").text('');
        $("#playerTwoLifeDegat").text('');
    }

    // Si le joueur 1 utilise une potion
    $('#j1-use-potion').on('click', restoreLife);

    function restoreLife() {
        $("#battle")[0].play();
        var potionHp = 20;
        var playerHpInitial = parseInt($('#j1initiaux-hp').text());
        var playerOneLifeActuelle = $scope.hero_hp;
        console.log($scope.hero_name + ' se soigne');
        // Bloque le clic des boutons de joueur 1
        $(".attack-input").off();
        // Grise les boutons du joueurs
        $(".attack-input").css("background-color", "grey");


        if ($scope.hero_potion > 0) {
            $scope.hero_potion--;
            $('#j1-potion').text($scope.hero_potion);
            // TODO Ajouter barre de vie
            if ($scope.hero_hp > playerHpInitial) {
                $scope.hero_hp = playerHpInitial;
            }
            // Affichage des dégats
            $("#playerOneLifeDegat").css("color", "green");
            $("#playerOneLifeDegat").text('+' + potionHp);
            // Message de combat
            $('#message').text($scope.hero_name + ' se soigne');
            // Calcul des points de vie restants
            $scope.hero_hp = $scope.hero_hp + potionHp;
            console.log($scope.hero_hp);
            // Barre de vie
            var pourcentage = ((100 * $scope.hero_hp) / playerHpInitial);
            var playerOneHpBar = 100 * (pourcentage / 100);
            // Ajuste la longueur de barre hp du joueur 1
            $('.player-one-hp-bar').css({
                width: playerOneHpBar + '%'
            });
            // Supprime hp flottant
            setTimeout(deleteHpMessage, 1000);
            // Relance l'action du joueur 2
            setTimeout(playerTwoAttack, 3000);
            // TODO régler le cas ou le joueur n'a plus de potions
            // if ($scope.hero_potion < 0) {
            //     // Bloque le clic des boutons de joueur 1
            //     $("#j1-use-potion").off();

            //     // Grise les boutons du joueurs
            //     $("#j1-use-potion").css("background-color", "grey");
            // }
        }
    }

    // Re donne la main au joueur
    function unblockPlayerOne() {
        // Re autorise le clic sur les boutons d'attaque/potion
         $('#j1-attaque').on('click', playerOneAttack);
         $('#j1-use-potion').on('click', restoreLife);
         $('#j1-block').on('click', playerOneBlock);
        // Recolore les boutons du joueur
        $(".attack-input").css("background-color", "#450000");
        $(".battle__map").css("width", "100%");
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
        // requete ajax pour dire que le joueur a finit le level

        // requete en get fonctionnelle!
        // return $http({
        //     method: 'GET',
        //     url: 'victory'
        // }).then(function (response) {
        //     console.log(response.data);
        // }, function (response) {
        //     // code to execute in case of error
        // });
        return $http({
            beforeSend: function (xhr) { // Add this line
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            },
            method: 'POST',
            url: 'updateHero'
        }).then(function (response) {
            console.log(response.data);
            $scope.lvlmessage = response.data;
        }, function (response) {
            // code to execute in case of error
        });

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

});

