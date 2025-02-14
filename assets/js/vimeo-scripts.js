/* eslint-env jquery */
/* global Vimeo */
$(function() {
    'use strict';

    // Create the player
    var player = new Vimeo.Player($('iframe'));
    window.demoPlayer = player;

    // Method buttons
    $('.js-methods').on('click', '.js-method', function() {
        var button = $(this);
        var method = button.attr('data-method');

        if (player[method]) {
            player[method]();
        }
    });

});