var fixePaddingBody = function() {

    $('body').css('padding-top', $('header').height() + 'px');
}

var equilibre = function (selecteur) {

    var hauteurMinimum = 0;

    $(this).css('min-height', '0px');


    $(selecteur).each(function () {

        var hauteur = $(this).height() + parseInt($(this).css('padding-top')) + parseInt($(this).css('padding-bottom'));

        if (hauteur > hauteurMinimum) {
            hauteurMinimum = hauteur;
        }

    });


    $(selecteur).each(function () {

        $(this).css('min-height', hauteurMinimum + 'px');
    });

}


var equilibreLineHeight = function (selecteur) {

    var hauteurMinimum = 0;


    $(selecteur).each(function () {

        var hauteur = $(this).height() + parseInt($(this).css('padding-top')) + parseInt($(this).css('padding-bottom'));

        if (hauteur > hauteurMinimum) {
            hauteurMinimum = hauteur;
        }

    });


    $(selecteur).each(function () {

        $(this).css('line-height', hauteurMinimum + 'px');

    });

}


var writeDataHeight = function (selecteur) {

    $(selecteur).each(function () {

        var originalHeight = $(this).css('height');

        $(this).css('height', 'auto');
        $(this).attr('data-height', $(this).height());

        $(this).css('height', originalHeight);

    });

};


$('a[data-anchor]').click(function () {

    $('html,body').animate({scrollTop: $('#' + $(this).data('anchor')).offset().top}, 'slow');

    return false;
});



$(window).ready(function () {
    fixePaddingBody();

});

$(window).load(function () {
    fixePaddingBody();

});

$(window).resize(function () {
    fixePaddingBody();

});