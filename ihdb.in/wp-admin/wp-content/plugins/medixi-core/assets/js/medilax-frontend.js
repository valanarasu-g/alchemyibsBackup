;(function($) {
    'use strict';
    $(window).on( 'elementor/frontend/init', function() {

        // Team Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/medilaxdoctors.default',function($scope) {
            let $slickcarousels = $scope.find('.vs-carousel');
            $slickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: $slickcarousels.data('slick-arrows'),
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: $slickcarousels.data('slick-autoplay'),
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false
                  }
                }
              ]
            });
        });
        // Service toggle
        elementorFrontend.hooks.addAction('frontend/element_ready/medilaxservicetab.default',function($scope) {
            if ($('.service-circle__item').length) {
                $('.service-circle__item').each(function(index){
                  $(this).attr('data-tab-no', index)
                });
              
                $('.service-circle__menu li a').each(function (index) {
                    let tabLink = $(this);
                    tabLink.attr('data-tab-link', index);
              
                    tabLink.on('click', function(e){
                        e.preventDefault();
                        let Tabcurrent = $(this).data('tab-link');
                        $(this).parent().addClass('active').siblings().removeClass('active');
                        $(`.service-circle__item[data-tab-no="${Tabcurrent}"]`).addClass('active')
                        .siblings().removeClass('active');
                    })
                });
            };
            
        });
        // Events Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/medilaxevent.default',function($scope) {
            let $slickcarousels = $scope.find('.event-vs-carousel');
            $slickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                fade: true,
                speed: 1000,
                slidesToShow: 1,
                slidesToScroll: 1,
            });

            $.fn.countdown = function () {
                $(this).each(function () {
                  var $counter = $(this),
                    countDownDate = new Date($counter.data('offer-date')).getTime(), // Set the date we're counting down toz
                    exprireCls = 'expired';
            
                  // Finding Function
                  function s$(element) {
                    return $counter.find(element);
                  }
            
                  // Update the count down every 1 second
                  var counter = setInterval(function () {
                    // Get today's date and time
                    var now = new Date().getTime();
            
                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;
            
                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
                    // If the count down is over, write some text 
                    if (distance < 0) {
                      clearInterval(counter);
                      $counter.addClass(exprireCls);
                      $counter.find('.message').css('display', 'block');
                    } else {
                      // Output the result in elements
                      s$('.day').html(days + ' ')
                      s$('.hour').html(hours + ' ')
                      s$('.minute').html(minutes + ' ')
                      s$('.seconds').html(seconds + ' ')
                    }
                  }, 1000);
                })
            }
            
            if ($('.offer-counter').length) {
                $('.offer-counter').countdown();
            }

            if ($('[data-bg-src]').length > 0) {
                $('[data-bg-src]').each(function () {
                    var src = $(this).attr('data-bg-src');
                    $(this).css('background-image', 'url(' + src + ')');
                });
            };
        });

        // Service Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/medilaxservices.default',function($scope) {
            let $slickcarousels = $scope.find('.vs-carousel');
            $slickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: $slickcarousels.data('slick-autoplay'),
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: $slickcarousels.data('slide-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false
                  }
                }
              ]
            });

            let $slickcarousels2 = $scope.find('.vs-carousel2');
            $slickcarousels2.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: $slickcarousels2.data('slick-autoplay'),
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: $slickcarousels2.data('slide-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false
                  }
                }
              ]
            });
        });

        // Feature Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/medilaxfeatures.default',function($scope) {
            let $slickcarousels = $scope.find('.vs-feature-carousel');
            $slickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: $slickcarousels.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false
                  }
                }
              ]
            });

            if ($('[data-bg-src]').length > 0) {
                $('[data-bg-src]').each(function () {
                    var src = $(this).attr('data-bg-src');
                    $(this).css('background-image', 'url(' + src + ')');
                });
            };
        });

        // Testimonials
        elementorFrontend.hooks.addAction('frontend/element_ready/medilaxtestimonials.default',function($scope) {
            
            let $slickcarousels = $scope.find('.vs-carousel');
            $slickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: $slickcarousels.data('arrows'),
                autoplay: true,
                arrows: false,
                autoplaySpeed: 6000,
                fade: $slickcarousels.data('fade'),
                speed: 1000,
                slidesToShow: $slickcarousels.data('data-slide-show'),
                asNavFor: ($slickcarousels.data('asnavfor') ? $slickcarousels.data('asnavfor') : false),
                slidesToScroll: 1,
                slidesToShow: 2,
                focusOnSelect: true,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false
                  }
                }
              ]
            });

            let $testislider = $scope.find('.vs-testislider');
            $testislider.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                autoplay: true,
                arrows: false,
                autoplaySpeed: 6000,
                speed: 1000,
                slidesToScroll: 1,
                slidesToShow: 3,
                focusOnSelect: true,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false
                  }
                }
              ]
            });

            let $testinav = $scope.find('.testi-nav1');
            $testinav.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                autoplay: false,
                arrows: false,
                autoplaySpeed: 6000,
                speed: 1000,
                slidesToScroll: 1,
                slidesToShow: 4,
                focusOnSelect: true,
                asNavFor: '#testibox1',
            });

            let $testislide = $scope.find('.testi-slide1');
            $testislide.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                autoplay: false,
                arrows: false,
                autoplaySpeed: 6000,
                speed: 1000,
                slidesToScroll: 1,
                slidesToShow: 1,
                focusOnSelect: true,
                asNavFor: '#testiavater1',
                fade: true,
            });

            if ($('[data-bg-src]').length > 0) {
                $('[data-bg-src]').each(function () {
                  var src = $(this).attr('data-bg-src');
                  $(this).css('background-image', 'url(' + src + ')');
                });
            };
            

        });

        // Client Logo
        elementorFrontend.hooks.addAction('frontend/element_ready/medilaxclientlogo.default',function($scope) {
            let $logoslider = $scope.find('.vs-carousel');
            $logoslider.not('.slick-initialized').slick({
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 5000,
                speed: 1000,
                fade: false,
                slidesToShow: $logoslider.data('data-slide-show'),
                slidesToScroll: 1,
                slidesToShow: 5,
                centerMode: $logoslider.data('centermode'),
                centerPadding: $logoslider.data('centerpadding'),
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                  }
                }
              ]
            });
        });
        // Facility Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/medilaxfacilityslider.default',function($scope) {
            let $logoslider = $scope.find('.facility-img-slider');
            $logoslider.not('.slick-initialized').slick({
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 5000,
                speed: 1000,
                fade: false,
                slidesToShow: $logoslider.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                  }
                }
              ]
            });
        });

        // Medical Box Logo
        elementorFrontend.hooks.addAction('frontend/element_ready/medilaxmedicalslider.default',function($scope) {
            let $logoslider = $scope.find('.medical-carousel');
            $logoslider.not('.slick-initialized').slick({
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 5000,
                speed: 1000,
                fade: false,
                slidesToShow: $logoslider.data('data-slide-show'),
                slidesToScroll: 1,
                slidesToShow: 5,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                  }
                }
              ]
            });
        });

        // Project
        elementorFrontend.hooks.addAction('frontend/element_ready/medilaxproject.default',function($scope) {
            let $project_slide = $scope.find('.vs-carousel');
            $project_slide.not('.slick-initialized').slick({
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 5000,
                speed: 1000,
                fade: false,
                slidesToShow: $project_slide.data('data-slide-show'),
                slidesToScroll: 1,
                slidesToShow: 3,
                centerMode: $project_slide.data('centermode'),
                centerPadding: $project_slide.data('centerpadding'),
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                  }
                }
              ]
            });
        });

        // blog post type
        elementorFrontend.hooks.addAction('frontend/element_ready/medilaxblog.default',function($scope) {
            let $blog_post = $scope.find('.vs-carousel');
            // Blog Layout 1 Slider
             $blog_post.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 8000,
                fade: false,
                speed: 1300,
                slidesToShow: $blog_post.data('data-slide-show'),
                slidesToScroll: 1,
                slidesToShow: 3,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2
                    }
                },  {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },  {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
              ]
            });

        });

        // Client Logo
        elementorFrontend.hooks.addAction('frontend/element_ready/medilaxofferdate.default',function($scope) {
            let $countdown = $scope.find('.offer-counter');
            $.fn.countdown = function () {
                $(this).each(function () {
                  var $counter = $(this),
                    countDownDate = new Date($counter.data('offer-date')).getTime(), // Set the date we're counting down toz
                    exprireCls = 'expired';

                  // Finding Function
                  function s$(element) {
                    return $counter.find(element);
                  }

                  // Update the count down every 1 second
                  var counter = setInterval(function () {
                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // If the count down is over, write some text
                    if (distance < 0) {
                      clearInterval(counter);
                      $counter.addClass(exprireCls);
                      $counter.find('.message').css('display', 'block');
                    } else {
                      // Output the result in elements
                      s$('.day').html(days + ' ')
                      s$('.hour').html(hours + ' ')
                      s$('.minute').html(minutes + ' ')
                      s$('.seconds').html(seconds + ' ')
                    }
                  }, 1000);
                })
            }
        $countdown.countdown();

        });



        
    });
}(jQuery));

