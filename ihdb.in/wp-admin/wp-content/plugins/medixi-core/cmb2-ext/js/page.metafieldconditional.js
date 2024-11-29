(function($){
    "use strict";
    
    let $medixi_page_breadcrumb_area      = $("#_medixi_page_breadcrumb_area");
    let $medixi_page_settings             = $("#_medixi_page_breadcrumb_settings");
    let $medixi_page_breadcrumb_image     = $("#_medixi_breadcumb_image");
    let $medixi_page_title                = $("#_medixi_page_title");
    let $medixi_page_title_settings       = $("#_medixi_page_title_settings");

    if( $medixi_page_breadcrumb_area.val() == '1' ) {
        $(".cmb2-id--medixi-page-breadcrumb-settings").show();
        if( $medixi_page_settings.val() == 'global' ) {
            $(".cmb2-id--medixi-breadcumb-image").hide();
            $(".cmb2-id--medixi-page-title").hide();
            $(".cmb2-id--medixi-page-title-settings").hide();
            $(".cmb2-id--medixi-custom-page-title").hide();
            $(".cmb2-id--medixi-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--medixi-breadcumb-image").show();
            $(".cmb2-id--medixi-page-title").show();
            $(".cmb2-id--medixi-page-breadcrumb-trigger").show();
    
            if( $medixi_page_title.val() == '1' ) {
                $(".cmb2-id--medixi-page-title-settings").show();
                if( $medixi_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--medixi-custom-page-title").hide();
                } else {
                    $(".cmb2-id--medixi-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--medixi-page-title-settings").hide();
                $(".cmb2-id--medixi-custom-page-title").hide();
    
            }
        }
    } else {
        $medixi_page_breadcrumb_area.parents('.cmb2-id--medixi-page-breadcrumb-area').siblings().hide();
    }


    // breadcrumb area
    $medixi_page_breadcrumb_area.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--medixi-page-breadcrumb-settings").show();
            if( $medixi_page_settings.val() == 'global' ) {
                $(".cmb2-id--medixi-breadcumb-image").hide();
                $(".cmb2-id--medixi-page-title").hide();
                $(".cmb2-id--medixi-page-title-settings").hide();
                $(".cmb2-id--medixi-custom-page-title").hide();
                $(".cmb2-id--medixi-page-breadcrumb-trigger").hide();
            } else {
                $(".cmb2-id--medixi-breadcumb-image").show();
                $(".cmb2-id--medixi-page-title").show();
                $(".cmb2-id--medixi-page-breadcrumb-trigger").show();
        
                if( $medixi_page_title.val() == '1' ) {
                    $(".cmb2-id--medixi-page-title-settings").show();
                    if( $medixi_page_title_settings.val() == 'default' ) {
                        $(".cmb2-id--medixi-custom-page-title").hide();
                    } else {
                        $(".cmb2-id--medixi-custom-page-title").show();
                    }
                } else {
                    $(".cmb2-id--medixi-page-title-settings").hide();
                    $(".cmb2-id--medixi-custom-page-title").hide();
        
                }
            }
        } else {
            $(this).parents('.cmb2-id--medixi-page-breadcrumb-area').siblings().hide();
        }
    });

    // page title
    $medixi_page_title.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--medixi-page-title-settings").show();
            if( $medixi_page_title_settings.val() == 'default' ) {
                $(".cmb2-id--medixi-custom-page-title").hide();
            } else {
                $(".cmb2-id--medixi-custom-page-title").show();
            }
        } else {
            $(".cmb2-id--medixi-page-title-settings").hide();
            $(".cmb2-id--medixi-custom-page-title").hide();

        }
    });

    //page settings
    $medixi_page_settings.on("change",function(){
        if( $(this).val() == 'global' ) {
            $(".cmb2-id--medixi-breadcumb-image").hide();
            $(".cmb2-id--medixi-page-title").hide();
            $(".cmb2-id--medixi-page-title-settings").hide();
            $(".cmb2-id--medixi-custom-page-title").hide();
            $(".cmb2-id--medixi-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--medixi-breadcumb-image").show();
            $(".cmb2-id--medixi-page-title").show();
            $(".cmb2-id--medixi-page-breadcrumb-trigger").show();
    
            if( $medixi_page_title.val() == '1' ) {
                $(".cmb2-id--medixi-page-title-settings").show();
                if( $medixi_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--medixi-custom-page-title").hide();
                } else {
                    $(".cmb2-id--medixi-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--medixi-page-title-settings").hide();
                $(".cmb2-id--medixi-custom-page-title").hide();
    
            }
        }
    });

    // page title settings
    $medixi_page_title_settings.on("change",function(){
        if( $(this).val() == 'default' ) {
            $(".cmb2-id--medixi-custom-page-title").hide();
        } else {
            $(".cmb2-id--medixi-custom-page-title").show();
        }
    });
    
})(jQuery);