App.controller('menuController', function menuController($scope) {
    // Fait apparaitre le menu des options
    $scope.showMenu = false;
    $scope.toggleShowMenu = function () {
        $scope.showMenu = !$scope.showMenu;
        if ($scope.showMenu) {
            // Enleve la scrollbar
            $('body').css('overflow', 'hidden');
        }
        if (!$scope.showMenu) {
            $('body').css('overflow', 'initial');
        }

    }
    $('.menu-icon').click(function (e) {
        e.preventDefault();
        $this = $(this);
        if ($this.hasClass('is-opened')) {
            $this.addClass('is-closed').removeClass('is-opened');
        } else {
            $this.removeClass('is-closed').addClass('is-opened');
        }
    })

    // Fait apparaitre le background du menu lors du scroll
    $header = $('.header');
    $scrollex = $('.scrollex');
    $scrollex.scrollex({
        bottom: $header.height(),

        enter: function () {
            $('.menu__block-title').css('display', 'none');
        },
        leave: function () {
            $('.menu__block-title').css('display', 'initial');
        }

    });






});
