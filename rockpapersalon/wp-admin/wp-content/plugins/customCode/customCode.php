<?php
/*
Plugin Name: Custom Code
Description: Custom Code.
Version: 1.0.0
Author: Valan
*/

include_once( plugin_dir_path( __FILE__ ) . 'assets/mobilePopup.php' );

function custom_slider_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('slick-slider', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);

    wp_enqueue_style('slick-slider-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
    wp_enqueue_style('slick-slider-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');
}
add_action('wp_enqueue_scripts', 'custom_slider_scripts');

function custom_slider_shortcode() {
    ob_start();
    ?>
<div class="custom-slider">
    <div class="slider">
        <?php
            $offer_banners = new WP_Query(array(
                'post_type' => 'offer_banner',
                'posts_per_page' => -1, // Get all posts
            ));

            if ($offer_banners->have_posts()) {
                while ($offer_banners->have_posts()) {
                    $offer_banners->the_post();
                    // Get offer_image field value
                    $offer_image = get_field('offer_image');
                    // Get popup content
                    $popup_content = get_field('popup_content');
                    ?>
        <div class="slider-item" data-popup="<?php echo esc_attr($popup_content); ?>">
            <img src="<?php echo esc_url($offer_image['url']); ?>" alt="<?php echo esc_attr($offer_image['alt']); ?>">
        </div>
        <?php
                }
            }
            wp_reset_postdata();
            ?>
    </div>
</div>

<script>
    jQuery(document).ready(function ($) {

        var popupHtml = '<div class="overlay-popup">' +
            '<div class="popup-content">' +
            '<span class="close">&times;</span>' +
            '<div class="popup-text"></div>' +
            '</div>' +
            '</div>';
        $('body').prepend(popupHtml);


        $('.slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
            arrows: false,
             speed: 2000,
              autoplay: true, 
        autoplaySpeed: 4000,
             customPaging: function (slider, i) {
            return '<button class="dot-custom"></button>'; // Custom dot with additional class
        }
          
        });

        $('.slick-slide').css('margin-right', '20px');

        $('.slider').on('click', '.slider-item', function () {
            var popupContent = $(this).data('popup');
             var button = $('<button>').addClass('popup-BAA').text('Book Appointment');
    
            $('.popup-text').html('').append(popupContent, button);
            $('.overlay-popup').fadeIn();
        });

        $('.overlay-popup .close').click(function () {
            $('.overlay-popup').fadeOut();
        });
        
        
$(document).on('click', '.popup-BAA', function(e) {
      $('.overlay-popup').fadeOut();
        $('html, body').animate({
            scrollTop: $('#contactForm').offset().top 
        }, 100);
     
 });
        $(document).mouseup(function (e) {
            var container = $('.popup-content');
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.overlay-popup').fadeOut();
            }
        });
    });
</script>
<?php
    return ob_get_clean();
}
add_shortcode('custom_slider', 'custom_slider_shortcode');





function single_slider_shortcode() {
    ob_start();
    ?>
<div class="single-slider" id="single_slider">
   
    <div class="singleSlider">
        <?php
            // Query location_slider posts
            $location_sliders = new WP_Query(array(
                'post_type' => 'location_slider',
                'posts_per_page' => -1, // Get all posts
            ));

            // Loop through location_slider posts
            if ($location_sliders->have_posts()) {
                while ($location_sliders->have_posts()) {
                    $location_sliders->the_post();
                    // Get ACF fields
                    $image = get_field('image');
                    $title = get_field('title');
                    $description = get_field('description_');
                     $sub_title = get_field('sub_title');
                    ?>
        <div class="slider-item">
            <div class="img-block">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>">
            </div>
            <div class="content-block">
                <h5><?=$sub_title?></h5>
                <h3><?php echo esc_html($title); ?></h3>
                <a class="location-link" href="<?=get_field('location')?>">Location</a>
                <p><?php echo esc_html($description); ?></p>
                <div class="btn-wrap">
                    <a class="appointment-link" data-location="<?=get_the_title()?>" href="#">Book Appointment</a>
                    <a class="packages-link" href="#">Exclusive Packages</a>
                </div>
            </div>



            <div class="gallery-images" hidden>
                <?php
                $locationSliderTitle=get_the_title();
                $offer_banners = new WP_Query(array(
                    'post_type' => 'offer_banner',
                    'posts_per_page' => -1, 
                ));

                if ($offer_banners->have_posts()) {
                    while ($offer_banners->have_posts()) {
                        $offer_banners->the_post();
                        $location = get_field('location');
                        if (is_array($location) && in_array($locationSliderTitle, $location)) {
                            $image_url = get_field('offer_image')['url'];
                              $popup_content = get_field('popup_content');
                            echo '<div class="hidden-image">'.$image_url . '</div>
                            <div class="hidden-content">'.$popup_content . '</div>';
                        }
                    }
                }
                wp_reset_postdata();
                ?>
            </div>



        </div>
        <?php
                }
            }
            // Reset post data
            wp_reset_postdata();
            ?>
    </div>
</div>




<script>
    jQuery(document).ready(function ($) {
    
    
      $('.appointment-link').click(function(e) {
        e.preventDefault();
          $('html, body').animate({
            scrollTop: $('#contactForm').offset().top 
        }, 100);
        var desiredLocation = $(this).data('location');

        $('#form_location').val(desiredLocation).change();
    });
     
     
      $('<div class="popup-overlay"><div class="popup"><span class="close">&times;</span><div class="gallery-slider"></div> <div class="thumbnails-container"></div></div></div>').appendTo('body');

       var clickedPackagesLink = null;
    var gallerySlider = null; // Variable to store Slick slider instance

    $('.packages-link').click(function(e){
        
        
        
        e.preventDefault();
        clickedPackagesLink = $(this);
       
       
       
       var hiddenItems = $(this).closest('.slider-item').find('.gallery-images .hidden-image, .gallery-images .hidden-content');

    // Extract image URLs and content
    var galleryImages = hiddenItems.filter('.hidden-image').map(function() {
        return $('<img>').attr('src', $(this).text());
    }).get();

    var thumbnails = hiddenItems.filter('.hidden-image').map(function() {
        return $('<div>').addClass('thumbnail').append($('<img>').attr('src', $(this).text())).html();
    }).get();

    var galleryContent = hiddenItems.filter('.hidden-content').map(function() {
        return $('<div>').addClass('popup-content').html($(this).html());
    }).get();

    // Append images, thumbnails, and content to the popup
    $('.gallery-slider').html(galleryImages);
    $('.thumbnails-container').html(thumbnails);
    $('.popup').append(galleryContent);
    
    
    
    
    
    

        if (gallerySlider) {
            gallerySlider.slick('unslick');
        }

        gallerySlider = $('.gallery-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            prevArrow: '<span class="slick-prev">Previous</span>',
            nextArrow: '<span class="slick-next">Next</span>',
            autoplay: false,
   	    autoplaySpeed: 3000
        });
        
          $('.thumbnails-container').on('click', 'img', function() {
        var index = $(this).index();
        gallerySlider.slick('slickGoTo', index); // Move slider to the clicked thumbnail
    });

        $('.popup-overlay').fadeIn();
        
        
        
    });

    $('.popup-overlay .close').click(function(){
        $('.popup-overlay').fadeOut();
        // Clear gallery slider content
        $('.gallery-slider').empty();
        clickedPackagesLink = null; // Reset clickedPackagesLink
    });

    // Close popup if click outside of content area
    $(document).mouseup(function(e){
        var container = $('.popup');
        if (!container.is(e.target) && container.has(e.target).length === 0){
            $('.popup-overlay').fadeOut();
            // Clear gallery slider content
            $('.gallery-slider').empty();
            clickedPackagesLink = null; // Reset clickedPackagesLink
        }
    });

        
        
    $('.branchSlider').click(function() {
         var id = $(this).attr('id');
    var index = id.split('-')[1];
          
            $('.singleSlider').slick('slickGoTo', index);
              $('html, body').animate({
        scrollTop: $('#single_slider').offset().top
    }, 500);
            return false;
        });

       
        
    
        

        $('.singleSlider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
             dots: true,
            arrows: false,
             customPaging: function (slider, i) {
            return '<button class="dot-custom"></button>'; // Custom dot with additional class
        }
        });
    });
</script>
<?php
    return ob_get_clean();
}
add_shortcode('single_slider', 'single_slider_shortcode');