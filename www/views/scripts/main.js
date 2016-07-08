jQuery(function($) {
    $(".close").on('click', function() {
        $('.overlayLogin, .overlayRegister').css('display', 'none');
    });

    $("#loginLink").on('click', function() {
        $('.overlayLogin').css('display', 'block');
    });

    $("#registerLink").on('click', function() {
        $('.overlayRegister').css('display', 'block');
    });

});
