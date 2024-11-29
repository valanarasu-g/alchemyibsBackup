<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Single Contact Info Widget .
 *
 */
class Medilax_Single_Contact_Info_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxsinglecontactinfo';
	}

	public function get_title() {
		return __( 'Medilax Single Contact Info', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'chose_us_content',
			[
				'label'		=> __( 'Contact Info','medilax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'info_style',
			[
				'label' 		=> __( 'Chose Style', 'medilax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'medilax' ),
					'two' 			=> __( 'Style Two', 'medilax' ),
				],
			]
		);
		$this->add_control(
			'contact_type',
			[
				'label' 		=> __( 'Contact Type', 'medilax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'email',
				'options'		=> [
					'email'  			=> __( 'Contact Type Email', 'medilax' ),
					'phone' 			=> __( 'Contact Type Phone', 'medilax' ),
					'address' 			=> __( 'Contact Type Address', 'medilax' ),
					'website' 			=> __( 'Contact Type Website', 'medilax' ),
				],
			]
		);

		//--------------------------------------Email Control-------------------------------------//

		$this->add_control(
			'contact_email_url',
            [
				'label'         => __( 'Email', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'info@yourdomain.com' , 'medilax' ),
				'label_block'   => true,
				'condition'  => [
                    'contact_type' => 'email',
                ],
			]
		);
		$this->add_control(
			'contact_email_url2',
            [
				'label'         => __( 'Alternate Email', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'info@yourdomain.com' , 'medilax' ),
				'label_block'   => true,
				'condition'  => [
                    'contact_type' => 'email',
                ],
			]
		);


		//--------------------------------------Phone Control-------------------------------------//


		$this->add_control(
			'contact_phone',
            [
				'label'         => __( 'Phone', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '+(00) 7712 653 7514' , 'medilax' ),
				'label_block'   => true,
				'condition'  => [
                    'contact_type' => 'phone',
                ],
			]
		);
		$this->add_control(
			'contact_phone2',
            [
				'label'         => __( 'Alternate Phone', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '+(00) 7712 653 7514' , 'medilax' ),
				'label_block'   => true,
				'condition'  => [
                    'contact_type' => 'phone',
                ],
			]
		);

		//--------------------------------------Address Control-------------------------------------//


		$this->add_control(
			'contact_address',
            [
				'label'         => __( 'Address', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '21/7A, Josua Street, Queens, NY, United States' , 'medilax' ),
				'label_block'   => true,
				'condition'  => [
                    'contact_type' => 'address',
                ],
			]
		);


        $this->add_control(
            'fontawesome',
            [
                'label'     => __( 'Chose Icon', 'medilax' ),
                'type'      => Controls_Manager::ICONS,
                'default'   => [
                    'value'     => 'fab fa-facebook-f',
                    'library'   => 'solid',
                ],
            ]
        );

        //--------------------------------------website Control-------------------------------------//


		$this->add_control(
			'contact_website_title',
            [
				'label'         => __( 'Website Title', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Angfuz' , 'medilax' ),
				'label_block'   => true,
				'condition'  => [
                    'contact_type' => 'website',
                ],
			]
		);
		$this->add_control(
			'contact_website_url',
            [
				'label'         => __( 'Website URL', 'medilax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'haarmax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'  => [
                    'contact_type' => 'website',
                ],
			]
		);

		$this->add_control(
			'contact_website_title2',
            [
				'label'         => __( 'Alternate Website Title', 'medilax' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'vecurosoft' , 'medilax' ),
				'label_block'   => true,
				'condition'  => [
                    'contact_type' => 'website',
                ],
			]
		);
		$this->add_control(
			'contact_website_url2',
            [
				'label'         => __( 'Alternate Website URL', 'medilax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'haarmax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'  => [
                    'contact_type' => 'website',
                ],
			]
		);

		
		$this->end_controls_section();


		/*-----------------------------------------title styling------------------------------------*/

		$this->start_controls_section(
			'general',
			[
				'label' 	=> __( 'General Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Background', 'medilax' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .info-media',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'medilax' ),
				'selector' 	=> '{{WRAPPER}} .info-media',
			]
		);
		$this->add_control(
			'width',
			[
				'label' 	=> __( 'Box Radious', 'medilax' ),
				'type' 		=> Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .info-media' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();


        //-----------------------------------------Content styling-----------------------------------------//


        $this->start_controls_section(
			'Content_styling',
			[
				'label' 	=> __( 'Content Styling', 'medilax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'content_color',
			[
				'label' 		=> __( 'Content Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .info-media_text a'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .info-box_text a'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'content_hover_color',
			[
				'label' 		=> __( 'Content Hover Color', 'medilax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .info-media_text a:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .info-box_text a:hover'	=> 'color: {{VALUE}}!important;',
				],
				'condition'  => [
                    'contact_type!' => 'address',
                ],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'content_typography',
		 		'label' 		=> __( 'Content Typography', 'medilax' ),
		 		'selectors' 	=> [
		 			'{{WRAPPER}} .info-media_text a',
		 			'{{WRAPPER}} .info-box_text a',
		 		]
			]
		);

        $this->add_responsive_control(
			'content_margin',
			[
				'label' 		=> __( 'Content Margin', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .info-media_text a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .info-box_text a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'content_padding',
			[
				'label' 		=> __( 'Content Padding', 'medilax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .info-media_text a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .info-box_text a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();
 

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Features Area----------------------->';
		if( $settings['info_style'] == 'one' ){
			$email1 			= $settings['contact_email_url'];
			$email2 			= $settings['contact_email_url2'];

			$phone1 			= $settings['contact_phone'];
			$phone2 			= $settings['contact_phone2'];

			$email1 			= is_email( $email1 );
			$email2 			= is_email( $email2 );

			$replace 		= array(' ','-',' - ');
			$with 			= array('','','');

			$emailurl1 		= str_replace( $replace, $with, $email1 );
			$emailurl2 		= str_replace( $replace, $with, $email2 );

			$mobileurl1 	= str_replace( $replace, $with, $phone1 );
			$mobileurl2 	= str_replace( $replace, $with, $phone2 );

			echo '<div class="info-media">';
				if( ! empty( $settings['fontawesome'] ) ){
	                echo '<div class="info-media_icon">';
	                	\Elementor\Icons_Manager::render_icon( $settings['fontawesome'], [ 'aria-hidden' => 'true' ] );
	                echo '</div>';
	            }
                echo '<div class="media-body">';
                	if( $settings['contact_type'] == 'phone' ){
                		if(!empty($mobileurl1)){
                			echo '<p class="info-media_text"><a href="'.esc_attr( 'tel:'.$mobileurl1 ).'">'.esc_html( $phone1 ).'</a></p>';
                		}
                		if(!empty($mobileurl2)){
                			echo '<p class="info-media_text"><a href="'.esc_attr( 'tel:'.$mobileurl2 ).'">'.esc_html( $phone2 ).'</a></p>';
                		}
	                }elseif( $settings['contact_type'] == 'email' ){
	                	if(!empty($emailurl1)){
	                		echo'<p class="info-media_text"><a href="'.esc_attr( 'mailto:'.$emailurl1 ).'">'.esc_html( $email1 ).'</a></p>';
	                	}
	                	if(!empty($emailurl2)){
	                		echo'<p class="info-media_text"><a href="'.esc_attr( 'mailto:'.$emailurl2 ).'">'.esc_html( $email2 ).'</a></p>';
	                	}
	                }elseif( $settings['contact_type'] == 'website' ){
	                	if(!empty($settings['contact_website_title'])){
	                		echo'<p class="info-media_text"><a href="'.esc_url($settings['contact_website_url']['url']).'">'.esc_html( $settings['contact_website_title'] ).'</a></p>';
	                	}
	                	if(!empty($settings['contact_website_title2'])){
	                		echo'<p class="info-media_text"><a href="'.esc_url($settings['contact_website_url2']['url']).'">'.esc_html( $settings['contact_website_title2'] ).'</a></p>';
	                	}

	            	}else{
	                	if(!empty($settings['contact_address'])){
		                	echo '<p class="info-media_text">'.esc_html( $settings['contact_address'] ).'</p>';
		                }
	                }
                echo '</div>';
            echo '</div>';
		}else{
			$email1 			= $settings['contact_email_url'];
			$email2 			= $settings['contact_email_url2'];

			$phone1 			= $settings['contact_phone'];
			$phone2 			= $settings['contact_phone2'];

			$email1 			= is_email( $email1 );
			$email2 			= is_email( $email2 );

			$replace 		= array(' ','-',' - ');
			$with 			= array('','','');

			$emailurl1 		= str_replace( $replace, $with, $email1 );
			$emailurl2 		= str_replace( $replace, $with, $email2 );

			$mobileurl1 	= str_replace( $replace, $with, $phone1 );
			$mobileurl2 	= str_replace( $replace, $with, $phone2 );

			echo '<div class="info-box">';
				if( ! empty( $settings['fontawesome'] ) ){
	                echo '<span class="info-box_icon">';
	                	\Elementor\Icons_Manager::render_icon( $settings['fontawesome'], [ 'aria-hidden' => 'true' ] );
	                echo '</span>';
	            }
            	if( $settings['contact_type'] == 'phone' ){
            		if(!empty($mobileurl1)){
            			echo '<p class="info-box_text"><a href="'.esc_attr( 'tel:'.$mobileurl1 ).'">'.esc_html( $phone1 ).'</a></p>';
            		}
            		if(!empty($mobileurl2)){
            			echo '<p class="info-box_text"><a href="'.esc_attr( 'tel:'.$mobileurl2 ).'">'.esc_html( $phone2 ).'</a></p>';
            		}
                }elseif( $settings['contact_type'] == 'email' ){
                	if(!empty($emailurl1)){
                		echo'<p class="info-box_text"><a href="'.esc_attr( 'mailto:'.$emailurl1 ).'">'.esc_html( $email1 ).'</a></p>';
                	}
                	if(!empty($emailurl2)){
                		echo'<p class="info-box_text"><a href="'.esc_attr( 'mailto:'.$emailurl2 ).'">'.esc_html( $email2 ).'</a></p>';
                	}
                }elseif( $settings['contact_type'] == 'website' ){
	                	if(!empty($settings['contact_website_title'])){
	                		echo'<p class="info-box_text"><a href="'.esc_url($settings['contact_website_url']['url']).'">'.esc_html( $settings['contact_website_title'] ).'</a></p>';
	                	}
	                	if(!empty($settings['contact_website_title2'])){
	                		echo'<p class="info-box_text"><a href="'.esc_url($settings['contact_website_url2']['url']).'">'.esc_html( $settings['contact_website_title2'] ).'</a></p>';
	                	}
                }else{
                	if(!empty($settings['contact_address'])){
	                	echo '<p class="info-box_text">'.esc_html( $settings['contact_address'] ).'</p>';
	                }
                }
            echo '</div>';
		}
		echo '<!-----------------------End Features Area----------------------->';
	}
}