$(window).on('load', function() {
    $('.selectable').first().trigger('click');
});

$(document).ready(function() {
    $('.selectable').on('click', function() {
        // Remove 'selected' class from all images
        $('.selectable').removeClass('selected');
        // Add 'selected' class to the clicked image
        $(this).addClass('selected');
        $('.card-img-top').attr('src', $(this).find('img').attr('src'));
    });

    $('div.social-connected').click(function () {
        $('div.social-connected').removeClass('connector-selected');
        $('div.social-connected').find('div.social-icon-approved').remove();
        $(this).addClass('connector-selected');
        $(this).find('div.social-card-icon').append(
           `<div class="social-icon-approved"><img alt="" src="${socialApprovedIconUrl}"></div>`
        );
    });
});