jQuery(document).ready(function ($) {
  "use strict";

  //Cirion Sticky Script
  if ($('header').is('.cron-sticky')) {
    $('body').addClass('has-sticky');
  } else {
    $('body').removeClass('has-sticky');
  }
  if ($('div').is('.cron-main-navigation')) {
    $('body').removeClass('no-main-nav');
  } else {
    $('body').addClass('no-main-nav');
  }
  $('body.has-sticky').css('margin-top', $('header.cron-sticky').outerHeight() + 'px');

  $(document).ready(function () {
    // Guarda referencias a las ubicaciones originales
    var navigationWrap = $('.cron-header .navigation-wrap');
    var topbarNavWrap = $('.cron-header .cron-topbar-nav-wrap');
    var originalParent = navigationWrap.parent(); // Padre original
  
    function adjustLayout() {
      if ($(window).width() <= 974) {
        // Mueve el menú a la barra superior en vista móvil
        navigationWrap.prependTo(topbarNavWrap);
  
        // Eventos para abrir/cerrar el menú móvil
        $('.cron-mobile-trigger').off('click').on('click', function () {
          $('.cron-topbar-navigation').addClass('active');
        });
        $('.cron-mobile-close').off('click').on('click', function () {
          $('.cron-topbar-navigation').removeClass('active');
          $('.dropdown-nav').removeClass('active');
        });
  
        // Submenús en vista móvil
        $('.cron-navigation .has-dropdown .mob-dropdown').off('click').on('click', function () {
          $(this).parent('.has-dropdown').find('ul.dropdown-nav').first().addClass('active');
          $('.cron-topbar-nav-wrap').scrollTop(0);
        });
        $('li.cron-back').off('click').on('click', function () {
          $(this).parent('.dropdown-nav').removeClass('active');
          $('.cron-topbar-navigation').removeClass('sub-active');
        });
      } else {
        // Restaura el menú al contenedor original en vista de escritorio
        navigationWrap.prependTo(originalParent);
  
        // Restaura el comportamiento de hover para submenús
        $('.cron-navigation .has-dropdown').off().on({
          mouseenter: function () {
            $(this).find('ul.dropdown-nav').first().stop(true, true).fadeIn(300);
          },
          mouseleave: function () {
            $(this).find('ul.dropdown-nav').first().stop(true, true).fadeOut(300);
          }
        });
      }
    }
  
    // Llama a la función al cargar la página y al redimensionar
    $(window).on('resize', adjustLayout);
    adjustLayout(); // Inicialización
  });

  //Cirion Search Box Script
  $('html').on('click', function () {
    if ($(".cron-search-box #keyword").val() !== "") {
      $('.cron-search-box').addClass('search-active');
    } else {
      $('.cron-search-box').removeClass('search-active');
    }
  });
  if ($(".cron-search-box #keyword").val() !== "") {
    $('.cron-search-box').addClass('search-active');
  } else {
    $('.cron-search-box').removeClass('search-active');
  }
  $('.cron-search-box').on('click', function (e) {
    e.stopPropagation();
    $(this).addClass('search-active');
    $(this).find('input[type="text"]').focus();
  });

  // Dynamic Alt Tag
  $('.cron-picture').each(function () {
    var $altDesktop = $(this).attr("data-desktop-alt");
    var $altTablet = $(this).attr("data-tab-alt");
    var $altMobile = $(this).attr("data-mobile-alt");

    if ($(window).width() <= 750) {
      $(this).find("img").prop("alt", $altMobile);
    } else if ($(window).width() <= 1182) {
      $(this).find("img").prop("alt", $altTablet);
    } else {
      $(this).find("img").prop("alt", $altDesktop);
    }
  });

  var lastScrollTop = 0;
  $(window).scroll(function () {
    if ($(window).scrollTop() > 0) {
      $("header").addClass("is-sticky");
    } else {
      $("header").removeClass("is-sticky");
    }
    // if ($(window).scrollTop() > 300) {
    //   var st = $(this).scrollTop();
    //   if (st > lastScrollTop){
    //    $('header').addClass('cron-scrolling-down');
    //    $('header').removeClass('cron-scrolling-up');
    //   } else {
    //    $('header').addClass('cron-scrolling-up');
    //    $('header').removeClass('cron-scrolling-down');
    //   }
    //   lastScrollTop = st;
    // } else {
    //    $('header').removeClass('cron-scrolling-up');
    //    $('header').removeClass('cron-scrolling-down');
    // }    
  });

  //Cirion Owl Carousel Slider Script
  $('.owl-carousel').each(function () {
    var $carousel = $(this);
    // Slider Arrows Bug
    var slideCount = $carousel.find('.item').length;
    var RTLTrueFalse = true;
    if (slideCount >= 6 || slideCount <= 3) {
      RTLTrueFalse = false;
    }
    if ($(this).parent().hasClass('hero-banner-carousel')) {
      RTLTrueFalse = false;
    }
    var SlideBYCount = ($carousel.data('slideby') !== undefined) ? $carousel.data('slideby') : 3;
    if (slideCount < 6 && SlideBYCount <= 2) {
      SlideBYCount = 3;
    }
    // Item
    var $items = ($carousel.data('items') !== undefined) ? $carousel.data('items') : 1;
    var $items_mobile = ($carousel.data('items-mobile') !== undefined) ? $carousel.data('items-mobile') : 1;
    var $items_tab_portrait = ($carousel.data('items-tab-portrait') !== undefined) ? $carousel.data('items-tab-portrait') : 1;
    var $items_tab_landscape = ($carousel.data('items-tab-landscape') !== undefined) ? $carousel.data('items-tab-landscape') : 1;
    // Center
    var $center_mobile = ($carousel.data('mobile-center') !== undefined) ? $carousel.data('mobile-center') : false;
    var $center_tab_portrait = ($carousel.data('tab-portrait-center') !== undefined) ? $carousel.data('tab-portrait-center') : false;
    var $center_tab_landscape = ($carousel.data('tab-landscape-center') !== undefined) ? $carousel.data('tab-landscape-center') : false;
    // Loop
    var $loop_mobile = ($carousel.data('mobile-loop') !== undefined) ? $carousel.data('mobile-loop') : true;
    var $loop_tab_portrait = ($carousel.data('tab-portrait-loop') !== undefined) ? $carousel.data('tab-portrait-loop') : true;
    var $loop_tab_landscape = ($carousel.data('tab-landscape-loop') !== undefined) ? $carousel.data('tab-landscape-loop') : true;
    // Dots
    var $dots_mobile = ($carousel.data('mobile-dots') !== undefined) ? $carousel.data('mobile-dots') : true;
    var $dots_tab_portrait = ($carousel.data('tab-portrait-dots') !== undefined) ? $carousel.data('tab-portrait-dots') : true;
    var $dots_tab_landscape = ($carousel.data('tab-landscape-dots') !== undefined) ? $carousel.data('tab-landscape-dots') : true;
    // Nav
    var $nav_mobile = ($carousel.data('mobile-nav') !== undefined) ? $carousel.data('mobile-nav') : false;
    var $nav_tab_portrait = ($carousel.data('tab-portrait-nav') !== undefined) ? $carousel.data('tab-portrait-nav') : false;
    var $nav_tab_landscape = ($carousel.data('tab-landscape-nav') !== undefined) ? $carousel.data('tab-landscape-nav') : false;
    // Autoplay
    var $autoplay_mobile = ($carousel.data('mobile-autoplay') !== undefined) ? $carousel.data('mobile-autoplay') : true;
    var $autoplay_tab_portrait = ($carousel.data('tab-portrait-autoplay') !== undefined) ? $carousel.data('tab-portrait-autoplay') : false;
    var $autoplay_tab_landscape = ($carousel.data('tab-landscape-autoplay') !== undefined) ? $carousel.data('tab-landscape-autoplay') : false;
    // Mousedrag
    var $mousedrag_mobile = ($carousel.data('mobile-mouse-drag') !== undefined) ? $carousel.data('mobile-mouse-drag') : false;
    var $mousedrag_tab_portrait = ($carousel.data('tab-portrait-mouse-drag') !== undefined) ? $carousel.data('tab-portrait-mouse-drag') : false;
    var $mousedrag_tab_landscape = ($carousel.data('tab-landscape-mouse-drag') !== undefined) ? $carousel.data('tab-landscape-mouse-drag') : false;
    // Margin
    var $margin_mobile = ($carousel.data('mobile-margin') !== undefined) ? $carousel.data('mobile-margin') : 0;
    var $margin_tab_portrait = ($carousel.data('tab-portrait-margin') !== undefined) ? $carousel.data('tab-portrait-margin') : 0;
    var $margin_tab_landscape = ($carousel.data('tab-landscape-margin') !== undefined) ? $carousel.data('tab-landscape-margin') : 0;
    // slideBy
    var $slide_mobile = ($carousel.data('mobile-slideby') !== undefined) ? $carousel.data('mobile-slideby') : 1;
    var $slide_tab_portrait = ($carousel.data('tab-portrait-slideby') !== undefined) ? $carousel.data('tab-portrait-slideby') : 1;
    var $slide_tab_landscape = ($carousel.data('tab-landscape-slideby') !== undefined) ? $carousel.data('tab-landscape-slideby') : 1;

    $carousel.owlCarousel({
      loop: ($carousel.data('loop') !== undefined) ? $carousel.data('loop') : true,
      items: $carousel.data('items'),
      margin: ($carousel.data('margin') !== undefined) ? $carousel.data('margin') : 0,
      dots: ($carousel.data('dots') !== undefined) ? $carousel.data('dots') : true,
      nav: ($carousel.data('nav') !== undefined) ? $carousel.data('nav') : false,
      navText: ["<div class='slider-no-current'><span class='current-no'></span><span class='total-no'></span></div><span class='current-monials'></span>", "<div class='slider-no-next'></div><span class='next-monials'></span>"],
      autoplay: ($carousel.data('autoplay') !== undefined) ? $carousel.data('autoplay') : false,
      autoplayTimeout: ($carousel.data('autoplay-timeout') !== undefined) ? $carousel.data('autoplay-timeout') : 5000,
      animateIn: ($carousel.data('animatein') !== undefined) ? $carousel.data('animatein') : false,
      animateOut: ($carousel.data('animateout') !== undefined) ? $carousel.data('animateout') : false,
      mouseDrag: ($carousel.data('mouse-drag') !== undefined) ? $carousel.data('mouse-drag') : true,
      autoWidth: ($carousel.data('auto-width') !== undefined) ? $carousel.data('auto-width') : false,
      autoHeight: ($carousel.data('auto-height') !== undefined) ? $carousel.data('auto-height') : false,
      center: ($carousel.data('center') !== undefined) ? $carousel.data('center') : false,
      // rtl: ($carousel.data('rtl') !== undefined) ? $carousel.data('rtl') : false,
      rtl: RTLTrueFalse,
      video: true,
      slideBy: SlideBYCount,
      responsiveClass: true,
      dotsEachNumber: true,
      smartSpeed: 600,
      autoplayHoverPause: false,
      lazyLoad: true,
      // onInitialized: function() {
      //   $('.eqheight').matchHeight({ property: 'min-height' });
      // },
      // onResize: function() {
      //   $('.eqheight').matchHeight({ property: 'min-height' });
      // },
      // onTranslated: function() {
      //   $('.eqheight').matchHeight({ property: 'min-height' });
      // },
      responsive: {
        // breakpoint from 0 up
        0: {
          items: $items_mobile,
          autoplay: $autoplay_mobile,
          dots: $dots_mobile,
          nav: $nav_mobile,
          loop: $loop_mobile,
          center: $center_mobile,
          mouseDrag: $mousedrag_mobile,
          margin: $margin_mobile,
          slideBy: $slide_mobile,
        },
        // breakpoint from 767 up
        767: {
          items: $items_tab_portrait,
          autoplay: $autoplay_tab_portrait,
          dots: $dots_tab_portrait,
          nav: $nav_tab_portrait,
          loop: $loop_tab_portrait,
          center: $center_tab_portrait,
          mouseDrag: $mousedrag_tab_portrait,
          margin: $margin_tab_portrait,
          slideBy: $slide_tab_portrait,
        },
        // breakpoint from 991 up
        991: {
          items: $items_tab_landscape,
          autoplay: $autoplay_tab_landscape,
          dots: $dots_tab_landscape,
          nav: $nav_tab_landscape,
          loop: $loop_tab_landscape,
          center: $center_tab_landscape,
          mouseDrag: $mousedrag_tab_landscape,
          margin: $margin_tab_landscape,
          slideBy: $slide_tab_landscape,
        },
        // breakpoint from 1199 up
        1199: {
          items: $items,
        }
      }
    });
    var totLength = $('.owl-dot', $carousel).length;
    $('.total-no', $carousel).html(totLength);
    $('.current-no', $carousel).html(totLength);
    $carousel.owlCarousel();
    $('.current-no', $carousel).html(1);
    $carousel.on('changed.owl.carousel', function (event) {
      var total_items = event.page.count;
      var currentNum = event.page.index + 1;
      $('.total-no', $carousel).html(total_items);
      $('.current-no', $carousel).html(currentNum);
    });
  });

  // Start code - Hero Banner Slider Enhancement feature is added by Verticurl - 27/10/2023
  $('.hero-banner-carousel .owl-carousel').on('changed.owl.carousel', function (event) {
    $('.hero-banner-carousel .owl-carousel').trigger('play.owl.autoplay');
    var currentItem = event.item.index;
    var $items = $('.hero-banner-carousel .owl-carousel').find('.owl-item');
    var $currentItem = $items.eq(currentItem);

    // Pause all videos
    $items.find('iframe').each(function () {
      var iframeSrc = $(this).attr('src');

      if (iframeSrc.includes('youtube.com')) {
        // Use postMessage API to pause YouTube videos
        var youtubeIframe = $('.active .youtube-video')[0];
        if (youtubeIframe && youtubeIframe.contentWindow) {
          youtubeIframe.contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
        }

      } else if (iframeSrc.includes('vimeo.com')) {
        // Use Vimeo API for Vimeo videos
        var vimeoPlayer = new Vimeo.Player(this);
        vimeoPlayer.pause();
      }
    });
    if ($currentItem.find('video').length > 0) {
      $items.find('video').each(function () {
        var video = $currentItem.find('video')[0];
        video.play();
      });
    }
  });

  // When the slide enters the video
  $('.hero-banner-carousel .owl-carousel').on('translated.owl.carousel', function (event) {

    var currentItem = event.item.index;
    var $items = $('.hero-banner-carousel .owl-carousel').find('.owl-item');
    var $currentItem = $items.eq(currentItem);

    // Autoplay the video and unmute
    var $video = $currentItem.find('iframe');
    $video.parent().find('.unmute-video').removeClass('mute-unmute-hidden');
    $video.parent().find('.mute-video').hide();
    $video.parent().find('.pause-video').removeClass('play-pause-hidden');
    $video.parent().find('.play-video').hide();
    var iframeId = $video.attr('id');

    if ($video.length > 0) {
      var iframeSrc = $video.attr('src');
      if (iframeSrc.includes('youtube.com')) {
        $('.active .youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
        $('.active .youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'mute' + '","args":""}', '*');

        var youtubeiframe = document.getElementById(iframeId);
        youtubeiframe.addEventListener('load', function () {
          var player = new YT.Player(iframeId);
          // Add an event listener for the 'onStateChange' event
          player.addEventListener('onStateChange', function (event) {
            if (event.data === YT.PlayerState.ENDED) {
              // The video has ended              
              $('.hero-banner-carousel .owl-carousel').trigger('play.owl.autoplay');
            }
          });
        });

      } else if (iframeSrc.includes('vimeo.com')) {
        // Use Vimeo API for Vimeo videos
        var vimeoPlayer = new Vimeo.Player($video[0]);
        vimeoPlayer.play();
        vimeoPlayer.setVolume(0);
        vimeoPlayer.on('ended', function () {
          $('.hero-banner-carousel .owl-carousel').trigger('play.owl.autoplay');
        });
      }
    }

    if ($currentItem.find('video').length > 0) {
      setTimeout(function () {
        var video = $currentItem.find('video')[0];
        var videoTag = $currentItem.find('video');
        videoTag.parent().find('.unmute-video').removeClass('mute-unmute-hidden');
        videoTag.parent().find('.mute-video').hide();
        videoTag.parent().find('.pause-video').removeClass('play-pause-hidden');
        videoTag.parent().find('.play-video').hide();
        video.play();
      }, 2000);
    }
  });

  // Pause the auto-slider when the video is unmuted
  $('.unmute-video').click(function () {
    $('.hero-banner-carousel .owl-carousel').trigger('stop.owl.autoplay');

    // For vimeo video
    if ($(this).parent().hasClass('vimeo-video-item')) {
      var vimeovideoframe = $(this).parent().find('iframe');
      var vimeoPlayer = new Vimeo.Player(vimeovideoframe[0]);
      vimeoPlayer.setVolume(1);

      $(this).addClass('mute-unmute-hidden');
      vimeovideoframe.parent().find('.mute-video').css("display", "flex");
    }
    // For youtube video
    if ($(this).parent().hasClass('youtube-video-item')) {
      var Yframe = $(this).parent().find('iframe');
      var youtubeiframe = $(this).parent().find('iframe').prop('id');
      var player = new YT.Player(youtubeiframe);

      player.addEventListener('onStateChange', function (event) {
        if (event.data === YT.PlayerState.ENDED) {
          $('.hero-banner-carousel .owl-carousel').trigger('play.owl.autoplay');
        }
      });
      $('.active .youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'unMute' + '","args":""}', '*');
      $(this).addClass('mute-unmute-hidden');
      Yframe.parent().find('.mute-video').css("display", "flex");
    }
    // For media library video
    if ($(this).parent().hasClass('hosted-video-item')) {
      var video = $(this).parent().find("video");
      video.prop("muted", false);
      $(video).bind("ended", function () {
        $('.hero-banner-carousel .owl-carousel').trigger('play.owl.autoplay');
        video.get(0).play();
      });

      $(this).addClass('mute-unmute-hidden');
      video.parent().find('.mute-video').css("display", "flex");
    }
  });

  $('.mute-video').click(function () {
    // $('.hero-banner-carousel .owl-carousel').trigger('play.owl.autoplay');
    // For vimeo video
    if ($(this).parent().hasClass('vimeo-video-item')) {
      var vimeovideoframe = $(this).parent().find('iframe');
      var vimeoPlayer = new Vimeo.Player(vimeovideoframe[0]);
      vimeoPlayer.setVolume(0);
      $(this).hide();
      vimeovideoframe.parent().find('.unmute-video').css("display", "flex");
    }
    // For youtube video
    if ($(this).parent().hasClass('youtube-video-item')) {
      var Yframe = $(this).parent().find('iframe');
      var youtubeiframe = $(this).parent().find('iframe').prop('id');
      var player = new YT.Player(youtubeiframe);

      player.addEventListener('onStateChange', function (event) {
        if (event.data === YT.PlayerState.ENDED) {
          $('.hero-banner-carousel .owl-carousel').trigger('play.owl.autoplay');
        }
      });
      $('.active .youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'mute' + '","args":""}', '*');

      $(this).hide();
      Yframe.parent().find('.unmute-video').css("display", "flex");
    }
    // For media library video
    if ($(this).parent().hasClass('hosted-video-item')) {
      var video = $(this).parent().find("video");
      video.prop("muted", true);

      $(this).hide();
      video.parent().find('.unmute-video').css("display", "flex");
    }
    setTimeout(function () {
      $('.hero-banner-carousel .owl-nav .owl-next').click();
    }, 1000);
  });
  // Pause the video player
  $('.pause-video').click(function () {
    $('.hero-banner-carousel .owl-carousel').trigger('stop.owl.autoplay');
    // For vimeo video
    if ($(this).parent().hasClass('vimeo-video-item')) {
      var vimeovideoframe = $(this).parent().find('iframe');
      var vimeoPlayer = new Vimeo.Player(vimeovideoframe[0]);
      vimeoPlayer.pause();
      $(this).addClass('play-pause-hidden');
      vimeovideoframe.parent().find('.play-video').css("display", "flex");
    }
    // For youtube video
    if ($(this).parent().hasClass('youtube-video-item')) {
      var Yframe = $(this).parent().find('iframe');
      var youtubeiframe = $(this).parent().find('iframe').prop('id');
      var player = new YT.Player(youtubeiframe);
      $('.active .youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
      $(this).addClass('play-pause-hidden');
      Yframe.parent().find('.play-video').css("display", "flex");
    }
    // For media library video
    if ($(this).parent().hasClass('hosted-video-item')) {
      var video = $(this).parent().find("video");
      video.prop("muted", false);
      video.get(0).pause();
      $(this).addClass('play-pause-hidden');
      video.parent().find('.play-video').css("display", "flex");
    }
  });

  // Play the video player
  $('.play-video').click(function () {
    // $('.hero-banner-carousel .owl-carousel').trigger('stop.owl.autoplay');
    // For vimeo video
    if ($(this).parent().hasClass('vimeo-video-item')) {
      var vimeovideoframe = $(this).parent().find('iframe');
      var vimeoPlayer = new Vimeo.Player(vimeovideoframe[0]);
      vimeoPlayer.play();
      $(this).hide();
      vimeovideoframe.parent().find('.pause-video').css("display", "flex");
    }
    // For youtube video
    if ($(this).parent().hasClass('youtube-video-item')) {
      var Yframe = $(this).parent().find('iframe');
      var youtubeiframe = $(this).parent().find('iframe').prop('id');
      var player = new YT.Player(youtubeiframe);

      player.addEventListener('onStateChange', function (event) {
        if (event.data === YT.PlayerState.ENDED) {
          $('.hero-banner-carousel .owl-carousel').trigger('stop.owl.autoplay');
        }
      });
      $('.active .youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
      $(this).hide();
      Yframe.parent().find('.pause-video').css("display", "flex");
    }
    // For media library video
    if ($(this).parent().hasClass('hosted-video-item')) {
      var video = $(this).parent().find("video");
      video.prop("muted", false);
      video.get(0).play();
      $(video).bind("ended", function () {
        $('.hero-banner-carousel .owl-carousel').trigger('stop.owl.autoplay');
        video.get(0).play();
      });
      $(this).hide();
      video.parent().find('.pause-video').css("display", "flex");
    }
  });
  // End code

  //Cirion Hover Script
  $(window).load(function () {
    $('.compare-item').hover(
      function () {
        $(this).addClass('cron-hover');
      },
      function () {
        $(this).removeClass('cron-hover');
      }
    );
  });

  //Cirion Smooth Scrolling Script
  $('.smooth-scrolling').on('click', function () {
    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top - 120
    }, 1000);
    return false;
  });

  // Cirion Smooth Scroll on load with id
  $(window).on('load', function () {
    // Asegura que est�s trabajando con la URL correcta
    var crrurl = new URL(location.href);

    // Obt�n el hash (ancla) de la URL y manipula el acorde�n si existe
    var hash = crrurl.hash.substring(1);
    if (hash) {
      jQuery("#" + hash).find(".collapse").collapse("show").siblings().collapse("hide");
    }

    // Convierte la URL a cadena para usar m�todos de manipulaci�n de texto
    let urlval = crrurl.href.replace(/\/\s*$/, "").split('/').pop();
    var cr_frstltr = urlval.substring(0, 1);

    // Si la URL contiene un ancla (#), despl�zate a la secci�n correspondiente
    if (cr_frstltr === "#") {
      var reqsection = urlval.substring(1, urlval.length);
      $("html,body").animate({
        scrollTop: $("#" + reqsection).offset().top - $("header.cron-sticky").outerHeight()
      }, 100);
    }
  });

  //Cirion Back Top Script
  if ($('div').hasClass('cron-back-top')) {
    var backtop = $('.cron-back-top');
    var position = backtop.offset().top;
    $(window).scroll(function () {
      var windowposition = $(window).scrollTop();
      if (windowposition + $(window).height() == $(document).height()) {
        backtop.removeClass('active');
      }
      else if (windowposition > 150) {
        backtop.addClass('active');
      }
      else {
        backtop.removeClass('active');
      }
    });
    jQuery('.cron-back-top a').click(function () {
      jQuery('body,html').animate({
        scrollTop: 0
      }, 3000);
      return false;
    });
  }

  // Interactive Map Elemento CSS Overwrite
  // Find all child divs with the ID "cron-interactive-map"
  var $childDivs = $('div[id="cron-mapv2-interactive"]');

  // Traverse up the DOM tree to find the topmost parent (elementor-container) for each child div
  $childDivs.each(function () {
    var $childDiv = $(this);
    var $topParent = $childDiv.parents('.elementor-container');
    var $topParent2 = $childDiv.parents('.elementor-container .elementor-widget-wrap');

    // Apply CSS to the top parent element
    $topParent.css({
      'width': '100%',
      'max-width': '100%',
      'padding': '0'
    });

    $topParent2.css('padding', '0');
  });

  // Accordion Scroll To Active Selector
  $('.accordion-item').on('shown.bs.collapse', function (e) {
    var offset = $(this).find('.collapse.show').prev('.accordion-header');
    if (offset) {
      $('html,body').animate({
        scrollTop: $(offset).offset().top - $('header.cron-sticky').outerHeight() - 40
      }, 100);
    }
  });
  if ($('div').is('.cron-accordion-table')) {
    var $accordion = $('.accordion-item');
    $('.accordion-title').on('click', function (e) {
      $('.accordion-title').not(this).addClass('collapsed');
      $('.accordion-title').not(this).parents('.accordion-item').find('.accordion-collapse').collapse('hide');
    });
  }
  // if (location.hash !== null && location.hash !== "") {
  //   $(location.hash).find(".collapse").collapse("show").siblings().collapse('hide');
  // }

  $('.eqheight').matchHeight({ property: 'min-height' });

  $(".cron-info-carousel .cron-culture-content").css({ "display": "flex", "flex-wrap": "wrap", "flex-direction": "column" });
  $(".cron-info-carousel .cron-culture-content .cron-btn-wrap").css({ "margin-top": "auto" });

  // Tab Navigation
  var scrollDuration = 100;
  // get how much have we scrolled to the left
  var getMenuPosition = function () {
    return $('.nav-tabs').scrollLeft();
  };
  $(".nav-tabs").on("scroll", function () {
    var cur = $(this).scrollLeft();
    if (cur == 0) {
      $('.cron-nav-wrap').addClass('show-right').removeClass('show-left');
    }
    else {
      var max = $(this)[0].scrollWidth - $(this).parent().width();
      if (cur == max) {
        $('.cron-nav-wrap').addClass('show-left').removeClass('show-right');
      } else {
        $('.cron-nav-wrap').addClass('show-right show-left');
      }
    }
  });
  $(".nav-tabs").trigger("scroll");
  // scroll to left 
  $('.nav-right').on('click', function () {
    $('.nav-tabs').animate({ scrollLeft: getMenuPosition() + 150 }, scrollDuration);
    var cur = $(this).scrollLeft();
    var max = $(this)[0].scrollWidth - $(this).parent().width();
    if (cur == max) {
      $('.cron-nav-wrap').addClass('show-right').removeClass('show-left');
    } else {
      $('.cron-nav-wrap').addClass('show-left').removeClass('show-right');
    }
  });
  // scroll to right
  $('.nav-left').on('click', function () {
    $('.nav-tabs').animate({ scrollLeft: getMenuPosition() - 150 }, scrollDuration);
  });

  $(".nav-tabs").on('mousewheel DOMMouseScroll', function () {
    return false;
  });

  // Cross-site scripting
  $("#genericsearch").submit(function () {
    var keyword_text = $("#keyword_inner").val();
    if (keyword_text.indexOf('<script>') >= 0) {
      $("#keyword_inner").css("border-color", "red");
      return false;
    } else {
      $("form#genericsearch").submit();
    }
  });

  $("#searchform").submit(function () {
    var keyword_text = $("#keyword").val();
    if (keyword_text.indexOf('<script>') >= 0) {
      $("#keyword").css("border-color", "red");
      return false;
    } else {
      $("form#searchform").submit();
    }
  });
  // Special character validation
  $("#keyword").keypress(function (e) {
    var keyCode = e.which;
    if (((keyCode > 33 && keyCode <= 47) || (keyCode >= 58 && keyCode <= 62) || (keyCode >= 91 && keyCode <= 96) || (keyCode >= 123 && keyCode <= 126) || keyCode == 64)) {
      e.preventDefault();
    }
  });
  $("#keyword_inner").keypress(function (e) {
    var keyCode = e.which;
    if (((keyCode > 33 && keyCode <= 47) || (keyCode >= 58 && keyCode <= 62) || (keyCode >= 91 && keyCode <= 96) || (keyCode >= 123 && keyCode <= 126) || keyCode == 64)) {
      e.preventDefault();
    }
  });
  // Disable paste key
  // $('#keyword').bind('paste',function(e) {
  //   var keyCode = e.which;
  //   if ( ( (keyCode >33 && keyCode <= 47) || (keyCode >= 58 && keyCode <= 62) || (keyCode >= 91 && keyCode <= 96) || (keyCode >= 123 && keyCode <= 126) || keyCode == 64 )) {
  //     e.preventDefault();
  //   }
  // });
  // $('#keyword_inner').bind('paste',function(e) {
  //   var keyCode = e.which;
  //   if ( ( (keyCode >33 && keyCode <= 47) || (keyCode >= 58 && keyCode <= 62) || (keyCode >= 91 && keyCode <= 96) || (keyCode >= 123 && keyCode <= 126) || keyCode == 64 )) {
  //     e.preventDefault();
  //   }
  // });
  // Start code - UTM Script Enhancement feature is added by Verticurl - 28/09/2023
  $('a[href*="#"]').click(function (event) {
    var thishash = $(this).attr('href');
    var hash = thishash.split("#")[1];
    if (hash) {
      $('div#' + hash).prop("id", "");
      $('section#' + hash).prop("id", "");
    }
    window.location.href = thishash;
    location.reload(true);
    history.scrollRestoration = "manual";
  });
  if (window.location.hash) {
    setTimeout(function () {
      var target = window.location.hash;
      $('html, body').animate({
        scrollTop: $(target).offset().top - 150
      }, 1000);
    }, 500);
  }
  // End code

  // Start code - Feature Popup Video
  $('.popup-video').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: true,
    callbacks: {
      close: function () {
        // Your code to handle the click event outside the video frame
        console.log("play vy");
        $('.cron-info-carousel .owl-carousel').trigger('play.owl.autoplay');

      }

    }
  });

  $('.popup-video-html5').magnificPopup({
    type: 'inline',
    items: {
      src: '#cron-html5-popup',
      type: 'inline'
    },
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: true,
    callbacks: {
      close: function () {
        // Your code to handle the click event outside the video frame
        console.log("play ht");
        $('.cron-info-carousel .owl-carousel').trigger('play.owl.autoplay');

      }

    }
  });

  $(".popup-video").on("click", function () {
    // Add a small delay using setTimeout
    setTimeout(function () {
      // Select the video tag inside the iframe with the class "mfp-iframe"
      $(".mfp-iframe").contents().find("video").css("width", "100%");
    }, 100); // Adjust the delay time in milliseconds as needed
  });

  $(".popup-video-html5").on("click", function () {
    var $element = $(this);
    var videoUrl = $element.data('video');
    $("#myVideo source").attr("src", videoUrl);
    $("#myVideo")[0].load();

  });

  $('.cron-info-carousel .popup-video').on('click', function () {
    console.log("stop c");
    $('.cron-info-carousel .owl-carousel').trigger('stop.owl.autoplay');
  });

  // End code

  // Start code - Tab Component Enhancement feature is added by Verticurl - 26/09/2023
  // Get the value of the "tab_link" query parameter from the URL
  var urlParams = new URLSearchParams(window.location.search);
  var tabLink = urlParams.get('tab');

  // Find the active tab title within the list of tab titles
  var activeTab = jQuery('.nav-tabs h2.nav-link.active');

  // Check if an active tab title was found
  if (activeTab.length > 0) {
    // Get the offset of the active tab title relative to its container
    var offsetLeft = activeTab.offset().left - 100;

    // Calculate the scroll position to make the active tab visible
    var scrollPosition = offsetLeft - jQuery('.nav-tabs').offset().left;

    // Scroll to the active tab
    jQuery('.nav-tabs').animate({ scrollLeft: scrollPosition }, 500);
  }

  if (tabLink) {
    // Scroll to the tab with the matching ID using smooth scrolling
    var targetTab = jQuery('#' + tabLink);
    if (targetTab.length) {
      setTimeout(function () {
        if ($(window).width() < 768) {
          jQuery('html, body').animate({
            scrollTop: targetTab.offset().top - $('header.cron-sticky').outerHeight()
          }, 1000); // Modify the delay as needed
        } else {
          jQuery('html, body').animate({
            scrollTop: targetTab.offset().top - 250
          }, 1000); // Modify the delay as needed
        }
      }, 1000);
    }
  }

  // Feature Popup
  jQuery(window).on('load', function ($) {
    // Select all elements with a data-video attribute
    jQuery('a[data-video]').each(function () {
      var $element = jQuery(this);
      var videoUrl = $element.data('video');

      // Remove the data-video attribute
      $element.removeAttr('data-video');

      // Set the href attribute to the videoUrl
      $element.attr('href', videoUrl);
    });
  });
  // End code

  // Start code - Tab Component Enhancement feature is added by Verticurl - 04/10/2023
  jQuery(window).on('load', function () {
    var urlParams = new URLSearchParams(window.location.search);
    var tabLink = urlParams.get('tab');
    if (tabLink) {
      jQuery('a').each(function () {
        var href = jQuery(this).attr('href'); // Get the href attribute
        var indexOfQuestionMark = href.indexOf('?'); // Find the index of the first '?'
        if (indexOfQuestionMark !== -1) {
          // If '?' is found in the href, check if there's a '#' after it
          var indexOfHash = href.indexOf('#');

          if (indexOfHash !== -1 && indexOfHash > indexOfQuestionMark) {
            // If '#' is found after '?', remove everything from '?' onward but keep the '#' and what comes after it
            var newHref = href.substring(0, indexOfQuestionMark) + href.substring(indexOfHash);
            jQuery(this).attr('href', newHref); // Update the href attribute
          } else {
            // If '#' is not found after '?', remove everything from '?' onward
            var newHref = href.substring(0, indexOfQuestionMark);
            jQuery(this).attr('href', newHref); // Update the href attribute
          }
        }
      });
    }

    setTimeout(function () {
      // Loop through all <a> tags that match the criteria
      jQuery('a[data-hreftab]').each(function () {
        var $this = jQuery(this);
        var dataHreftab = $this.attr('data-hreftab');

        // Update the href attribute by combining the base URL and data-hreftab
        $this.attr('href', dataHreftab);
      });
    }, 1000); // Modify the delay as needed
  });
});
