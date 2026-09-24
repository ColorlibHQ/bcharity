/**
 * Bcharity front-end behaviour, without jQuery.
 *
 * The plugin calls keep the options they always had; ColorlibUI provides
 * drop-in versions of Owl Carousel, Magnific Popup and AjaxChimp that build
 * the same markup, so the theme's stylesheets apply unchanged.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  UI.magnific('.popup-youtube, .popup-vimeo', {
    // disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  UI.enhanceSelects('select');

  // menu fixed js code
  UI.ready(function () {
    var menus = UI.toElements('.main_menu');
    if (!menus.length) return;
    window.addEventListener('scroll', function () {
      var windowTop = window.pageYOffset + 1;
      menus.forEach(function (menu) {
        if (windowTop > 50) {
          menu.classList.add('menu_fixed', 'animated', 'fadeInDown');
        } else {
          menu.classList.remove('menu_fixed', 'animated', 'fadeInDown');
        }
      });
    }, { passive: true });
  });

  UI.owl('.client_review_part', {
    items: 1,
    loop: true,
    dots: true,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: false,
    smartSpeed: 2000
  });

  UI.owl('.client_logo', {
    items: 6,
    loop: true,
    dots: false,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: false,
    smartSpeed: 2000,
    margin: 20,
    responsive: {
      0: {
        items: 3
      },
      577: {
        items: 3
      },
      991: {
        items: 5
      },
      1200: {
        items: 6
      }
    }
  });

  //counter up
  UI.counter('.count', { time: 2000 });

  //------- Mailchimp js --------//
  UI.ajaxChimp('#mc_embed_signup form');
}());
