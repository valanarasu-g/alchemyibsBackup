(function ($) {
  "use strict";
/*
Template Name: Medixi
Template URL: https://themeforest.net/user/vecuro_themesproducts/html/medixi
Description: Medixi - Medical and Health Care HTML Template
Author: Vecuro
Author URI: https://themeforest.net/user/vecuro_themes
Version: 1.0.0
*/
/*=================================
    JS Index Here
==================================*/
/*
  01. On Load Function
  02. Preloader
  03. Mobile Menu Active
  04. Sticky fix
  05. Scroll To Top
  06. Set Background Image & Color
  07. Popup Sidemenu
  08. Search Box Popup
  09. Hero Slider Active
  10. Magnific Popup
  11. Blog Card Animation
  12. Count Down
  13. Section Position
  14. Member Details Toggle
  15. Tab Indicator
  16. Quantity Adder
  17. Woocommerce Toggle
  18. Shop Big Image Src Set
  19. Filter Menu
  20. Date & Time Picker
  21. Parallax Effect
  22. WOW Js
*/
/*=================================
    JS Index End
==================================*/
/*

 /*---------- 01. On Load Function ----------*/

  $(window).on('load', function () {
    $('.preloader').fadeOut();
    slickRefresh();
  });

   svgFixer();
   function slickRefresh() {
    setTimeout(function () {
      if ($('.slick-slider'.length)) {
        $('.slick-slider').each(function () {
          $(this).slick('refresh');
        });
      }
    }, 150)
  };

  /*---------- 02. Preloader ----------*/
  if ($('.preloader').length > 0) {
    $('.preloaderCls').each(function () {
      $(this).on('click', function (e) {
        e.preventDefault();
        $('.preloader').css('display', 'none');
      })
    });
  };



  /*---------- 03. Mobile Menu Active ----------*/
  $.fn.vsmobilemenu = function (options) {
    var opt = $.extend({
      menuToggleBtn: '.vs-menu-toggle',
      bodyToggleClass: 'vs-body-visible',
      subMenuClass: 'vs-submenu',
      subMenuParent: 'vs-item-has-children',
      subMenuParentToggle: 'vs-active',
      meanExpandClass: 'vs-mean-expand',
      subMenuToggleClass: 'vs-open',
      toggleSpeed: 400,
    }, options);

    return this.each(function () {
      var menu = $(this); // Select menu

      // Menu Show & Hide
      function menuToggle() {
        menu.toggleClass(opt.bodyToggleClass);

        // collapse submenu on menu hide or show
        var subMenu = '.' + opt.subMenuClass;
        $(subMenu).each(function () {
          if ($(this).hasClass(opt.subMenuToggleClass)) {
            $(this).removeClass(opt.subMenuToggleClass);
            $(this).css('display', 'none')
            $(this).parent().removeClass(opt.subMenuParentToggle);
          };
        });
      };

      // Class Set Up for every submenu
      menu.find('li').each(function () {
        var submenu = $(this).find('ul');
        submenu.addClass(opt.subMenuClass);
        submenu.css('display', 'none');
        submenu.parent().addClass(opt.subMenuParent);
        submenu.prev('a').addClass(opt.meanExpandClass);
        submenu.next('a').addClass(opt.meanExpandClass);
      });

      // Toggle Submenu 
      function toggleDropDown($element) {
        if ($($element).next('ul').length > 0) {
          $($element).parent().toggleClass(opt.subMenuParentToggle);
          $($element).next('ul').slideToggle(opt.toggleSpeed);
          $($element).next('ul').toggleClass(opt.subMenuToggleClass);
        } else if ($($element).prev('ul').length > 0) {
          $($element).parent().toggleClass(opt.subMenuParentToggle);
          $($element).prev('ul').slideToggle(opt.toggleSpeed);
          $($element).prev('ul').toggleClass(opt.subMenuToggleClass);
        };
      };

      // Submenu toggle Button
      var expandToggler = '.' + opt.meanExpandClass;
      $(expandToggler).each(function () {
        $(this).on('click', function (e) {
          e.preventDefault();
          toggleDropDown(this);
        });
      });

      // Menu Show & Hide On Toggle Btn click
      $(opt.menuToggleBtn).each(function () {
        $(this).on('click', function () {
          menuToggle();
        })
      })

      // Hide Menu On out side click
      menu.on('click', function (e) {
        e.stopPropagation();
        menuToggle()
      })

      // Stop Hide full menu on menu click
      menu.find('div').on('click', function (e) {
        e.stopPropagation();
      });

    });
  };

  $('.vs-menu-wrapper').vsmobilemenu();





  /*---------- 04. Sticky fix ----------*/
  var lastScrollTop = '';
  var scrollToTopBtn = '.scrollToTop'

  function stickyMenu($targetMenu, $toggleClass, $parentClass) {
    var st = $(window).scrollTop();
    var height = $targetMenu.css('height');
    $targetMenu.parent().css('min-height', height);
    if ($(window).scrollTop() > 800) {
      $targetMenu.parent().addClass($parentClass);

      if (st > lastScrollTop) {
        $targetMenu.removeClass($toggleClass);
      } else {
        $targetMenu.addClass($toggleClass);
      };
    } else {
      $targetMenu.parent().css('min-height', '').removeClass($parentClass);
      $targetMenu.removeClass($toggleClass);
    };
    lastScrollTop = st;
  };
  $(window).on("scroll", function () {
    stickyMenu($('.sticky-active'), "active", "will-sticky");
    if ($(this).scrollTop() > 500) {
      $(scrollToTopBtn).addClass('show');
    } else {
      $(scrollToTopBtn).removeClass('show');
    }
  });



  /*---------- 05. Scroll To Top ----------*/
  $(scrollToTopBtn).each(function () {
    $(this).on('click', function (e) {
      e.preventDefault();
      $('html, body').animate({
        scrollTop: 0
      }, lastScrollTop / 3);
      return false;
    });
  })




  /*---------- 06.Set Background Image & Color ----------*/
  if ($('[data-bg-src]').length > 0) {
    $('[data-bg-src]').each(function () {
      var src = $(this).attr('data-bg-src');
      $(this).css('background-image', 'url(' + src + ')');
    });
  };

  if ($('[data-bg-color]').length > 0) {
    $('[data-bg-color]').each(function () {
      var color = $(this).attr('data-bg-color');
      $(this).css('background-color', color);
    });
  };





  /*---------- 07. Popup Sidemenu ----------*/
  function popupSideMenu($sideMenu, $sideMunuOpen, $sideMenuCls, $toggleCls) {
    // Sidebar Popup
    $($sideMunuOpen).on('click', function (e) {
      e.preventDefault();
      $($sideMenu).addClass($toggleCls);
    });
    $($sideMenu).on('click', function (e) {
      e.stopPropagation();
      $($sideMenu).removeClass($toggleCls)
    });
    var sideMenuChild = $sideMenu + ' > div';
    $(sideMenuChild).on('click', function (e) {
      e.stopPropagation();
      $($sideMenu).addClass($toggleCls)
    });
    $($sideMenuCls).on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $($sideMenu).removeClass($toggleCls);
    });
  };
  popupSideMenu('.sidemenu-wrapper', '.sideMenuToggler', '.sideMenuCls', 'show');





  /*---------- 08. Search Box Popup ----------*/
  function popupSarchBox($searchBox, $searchOpen, $searchCls, $toggleCls) {
    $($searchOpen).on('click', function (e) {
      e.preventDefault();
      $($searchBox).addClass($toggleCls);
    });
    $($searchBox).on('click', function (e) {
      e.stopPropagation();
      $($searchBox).removeClass($toggleCls);
    });
    $($searchBox).find('form').on('click', function (e) {
      e.stopPropagation();
      $($searchBox).addClass($toggleCls);
    });
    $($searchCls).on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $($searchBox).removeClass($toggleCls);
    });
  };
  popupSarchBox('.popup-search-box', '.searchBoxTggler', '.searchClose', 'show');

  /*----------- 10. Magnific Popup ----------*/
  /* magnificPopup img view */
  $('.popup-image').magnificPopup({
    type: 'image',
    gallery: {
      enabled: true
    }
  });

  /* magnificPopup video view */
  $('.popup-video').magnificPopup({
    type: 'iframe'
  });

  /*----------- 13. Section Position   ----------*/
  // Interger Converter
  function convertInteger(str) {
    return parseInt(str, 10)
  }
  
  $.fn.sectionPosition = function (mainAttr, posAttr) {   
    $(this).each(function () {
      var section = $(this);
      
      function setPosition (){
        var sectionHeight = Math.floor(section.height() / 2), // Main Height of section
        posData = section.attr(mainAttr), // where to position
        posFor  = section.attr(posAttr), // On Which section is for positioning  
        topMark = 'top-half', // Pos top
        bottomMark = 'bottom-half', // Pos Bottom
        parentPT = convertInteger($(posFor).css('padding-top')), // Default Padding of  parent
        parentPB = convertInteger($(posFor).css('padding-bottom')); // Default Padding of  parent

        if (posData === topMark) {
          $(posFor).css('padding-bottom', parentPB + sectionHeight + 'px');
          section.css('margin-top', "-" + sectionHeight + 'px');
        } else if (posData === bottomMark) {
          $(posFor).css('padding-top', parentPT + sectionHeight + 'px');
          section.css('margin-bottom', "-" + sectionHeight + 'px');
        }
      }
      setPosition(); // Set Padding On Load
    });
  }


  if ($('[data-sec-pos]').length) {
    $('[data-sec-pos]').sectionPosition('data-sec-pos', 'data-pos-for');
  }

  




  /*----------- 14. Member Details Toggle   ----------*/
  $('.member-angle-links .middle-icon').each(function(){
    $(this).on('click', function(e){
      e.preventDefault();
      $(this).toggleClass('active');
      $(this).parent().toggleClass('show');
    });
  });



  /*----------- 15. Tab Indicator ----------*/
  $.fn.indicator = function () {
    var $menu = $(this),
      $linkBtn = $menu.find('a'),
      $btn = $menu.find('button');
    // Append indicator
    $menu.append('<span class="indicator"></span>');
    var $line = $menu.find('.indicator');
    // Check which type button is Available
    if ($linkBtn.length) {
      var $currentBtn = $linkBtn;
    } else if ($btn.length) {
      var $currentBtn = $btn
    }
    // On Click Button Class Remove
    $currentBtn.on('click', function (e) {
      e.preventDefault();
      $(this).addClass('active');
      $(this).siblings('.active').removeClass('active');
      linePos()
    });
    // Indicator Position
    function linePos() {
      var $btnActive = $menu.find('.active'),
        $height = $btnActive.css('height'),
        $width = $btnActive.css('width'),
        $top = $btnActive.position().top + 'px',
        $left = $btnActive.position().left + 'px';
      $line.css({
        top: $top,
        left: $left,
        width: $width,
        height: $height,
      });
    }
    linePos()
  }

  if ($('.product-tab').length) {
    $('.product-tab').indicator();
  }


  /*---------- 18. Quantity Added ----------*/
  $.fn.qtyAdder = function (input, cartBtn){
    $(this).each(function(){
      $(this).on('click', function (e) {
        e.preventDefault();
        // Get current quantity values
        var qty = $(this).siblings(input);
        var val = parseFloat(qty.val());
        var max = parseFloat(qty.attr('max'));
        var min = parseFloat(qty.attr('min'));
        var step = parseFloat(qty.attr('step'));
  
        // Change the value if plus or minus
        if ($(this).is('.quantity-plus')) {
          if (max && (max <= val)) {
            qty.val(max);
          } else {
            qty.val(val + step);
          }
        } else {
          if (min && (min >= val)) {
            qty.val(min);
          } else if (0 < val) {
            qty.val(val - step);
          }
        }
  
        if ($(cartBtn).length) {
          $(cartBtn).prop('disabled', false);
        }
      });
    })
  };

  $('.quantity-plus, .quantity-minus').qtyAdder('.qty-input', '.cart_table button[name="update_cart"]');


  /*----------- 17. Woocommerce Toggle ----------*/
  // Woocommerce Rating Toggle
  $('.rating-select .stars a').each(function () {
    $(this).on('click', function (e) {
      e.preventDefault();
      $(this).siblings().removeClass('active');
      $(this).parent().parent().addClass('selected');
      $(this).addClass('active');
    });
  });



  /*----------- 18. Shop Big Image Src Set ----------*/
  if ($('.product-thumb').length) {
    $('.product-thumb').each(function () {
      $(this).on('click', function () {
        var src = $(this).find('img').data('big-img');
        $('.img-fullsize img').attr('src', src);
        $('.img-fullsize .popup-image').attr('href', src);
      });
    });
  }


   /*----------- 19. Filter Menu ----------*/
   $(window).on('load', function(){
    var $filter = '.filter-active',
      $filterItem = '.filter-item',
      $filterMenu = '.filter-menu-active';

    if ($($filter).length > 0) {
      var $grid = $($filter).isotope({
        itemSelector: $filterItem,
        filter: '*',
        masonry: {
          // use outer width of grid-sizer for columnWidth
          columnWidth: $filterItem
        }
      });

      // filter items on button click
      $($filterMenu).on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
          filter: filterValue
        });
      });

      // Menu Active Class 
      $($filterMenu).on('click', 'button', function (event) {
        event.preventDefault();
        $(this).addClass('active');
        $(this).siblings('.active').removeClass('active');
      });
    };
  });


/*---------- 20. Date & Time Picker ----------*/
   // Time And Date Picker
   $('.dateTime-pick').datetimepicker({
     timepicker: true,
     datepicker: true,
     format: 'y-m-d H:i',
     hours12: false,
     step: 30
    });
    
    // Only Date Picker
    $('.date-pick').datetimepicker({
      timepicker: false,
      datepicker: true,
      format: 'm-d-y',
      step: 10
    });
    
    // Only Time Picker
    $('.time-pick').datetimepicker({
      datepicker: false,
      timepicker: true,
      format: 'H:i',
      hours12: false,
      step: 10
    });


   
    
    
    /*---------- 21. Parallax Effect ----------*/
    new universalParallax().init();

    
    /*---------- 22. WOW Js ----------*/
    var wow = new WOW({
      boxClass: 'wow',      // default
      animateClass: 'animated', // default
      offset: 0,          // default
      mobile: true,       // default
      live: true,        // default
      resetAnimation: false
    });
    wow.init();

    /*---------- 23. SVG PRELOADER ----------*/
    function svgFixer(){
      $('.logo-img').each(function () {
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        jQuery.get(imgURL, function (data) {
          // Get the SVG tag, ignore the rest
          var $svg = jQuery(data).find('svg');

          // Add replaced image's ID to the new SVG
          if (typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
          }
          // Add replaced image's classes to the new SVG
          if (typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass + ' replaced-svg');
          }

          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr('xmlns:a');

          // Check if the viewport is set, else we gonna set it if we can.
          if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
          }

          // Replace image with new SVG
          $img.replaceWith($svg);

        }, 'xml');
      });
    }
 

})(jQuery);