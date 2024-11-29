<?php

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    // header
    get_header();
	echo '<section class="vs-team-wrapper space">';
		echo '<div class="container">';
			echo '<div class="row ">';
				if( have_posts() ){
	            	while (have_posts()) { the_post();
					$medilax_doctors_social_icons	= medixi_meta( 'doctor_social_profile_group' );
					$phone = medixi_meta( 'doctor_phone' );
					$email = medixi_meta( 'doctor_email' );
					$desc  = medixi_meta( 'short_descripton' );

					$email 			= is_email( $email );
					$replace 		= array(' ','-',' - ');
					$with 			= array('','','');
					$emailurl 		= str_replace( $replace, $with, $email );
					$mobileurl 	    = str_replace( $replace, $with, $phone );

					echo '<div class="col-md-6 col-xl-4 mb-30 wow fadeInUp" data-wow-delay="0.3s">';
						echo '<div class="team-card">';
							if(has_post_thumbnail( )) {
								echo '<div class="team-head">';
									the_post_thumbnail();
									if( is_array( $medilax_doctors_social_icons ) && !empty( $medilax_doctors_social_icons ) ) {
										echo '<div class="team-card-links">';
											echo '<a class="team-links-toggler" href="#"><i class="fas fa-share-alt"></i></a>';
											echo '<div class="team-social">';
												foreach( $medilax_doctors_social_icons as $singleicon ) {
													if( ! empty( $singleicon['_medilax_doctor_social_profile_icon'] ) ) {
					                                    echo '<a href="'.esc_url( $singleicon['_medilax_doctor_social_profile_link'] ).'"><i class="fab '.esc_attr( $singleicon['_medilax_doctor_social_profile_icon'] ).'"></i></a>';
					                                }
												}
											echo '</div>';
										echo '</div>';
									}
								echo '</div>';
							}
							echo '<div class="team-body">';
								echo '<h3 class="h4 mb-0"><a href="'.esc_url( get_the_permalink() ).'" class="text-reset">'.get_the_title().'</a></h3>';

								$terms = wp_get_post_terms($post->ID, 'doctors_category', array("fields" => "names"));
								$i = 0;
								foreach( (array)$terms as $term){
									$i++;
									echo '<p class="fs-xs degi text-theme mb-2"><strong>' . esc_html($term) . '</strong></p>';
									if($i == 1){
										break;
									}
								}
								if(!empty($desc)){
									echo '<p class="fs-xs">'.esc_html( $desc ).'</p>';
								}
								echo '<div class="">';
									echo '<p class="fs-xs team-info"><i class="fas fa-phone text-theme"></i><a class="text-reset" href="'.esc_attr( 'tel:'.$mobileurl ).'">'.esc_html( $phone ).'</a></p>';
									echo '<p class="fs-xs team-info"><i class="fas fa-envelope text-theme"></i><a class="text-reset" href="'.esc_attr( 'mailto:'.$emailurl ).'">'.esc_html( $email ).'</a></p>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
					}
					wp_reset_postdata();
				}
			echo '</div>';
		echo '</div>';
	echo '</section>';
    get_footer();