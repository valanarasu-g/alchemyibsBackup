<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Call to action Widget .
 *
 */
class Medilax_CTA_Widget extends Widget_Base{

	public function get_name() {
		return 'medilaxcta';
	}

	public function get_title() {
		return __( 'Call to action', 'medilax' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'medilax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'offer_date',
			[
				'label'		=> __( 'Call to action Countdown','medilax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
            'title', [
                'label'         => __( 'Title', 'medilax' ),
                'type'          => Controls_Manager::TEXTAREA,
                'rows'          => 2,
                'label_block'   => true,
            ]
        );
        $this->add_control(
			'contact_phone', [
				'label' 		=> __( 'Contact Number', 'medilax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
         $this->add_control(
            'icon_type',
            [
                'label'     => esc_html__('Select Your Icon Type', 'medilax'),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'flaticon'     => esc_html__('Theme own Flat Icon', 'medilax'),
                    'image_icon'   => esc_html__('Custom Icon', 'medilax'),
                    'fontawesome'  => esc_html__('Fontawesome', 'medilax'),
                ],
                'default' => 'flaticon',
            ]
        );
        $this->add_control(
            'flaticon',
            [
                'name'       => 'flaticon',
                'label'      => esc_html__('Icon', 'medilax'),
                'type'       => Controls_Manager::ICON,
                'options'    => medilax_flaticons(),
                'include'    => medilax_include_flaticons(),
                'condition'  => [
                    'icon_type' => 'flaticon',
                ],
            ]
        );
        $this->add_control(
            'fontawesome',
            [
                'label'     => __( 'Fontawesome', 'medilax' ),
                'type'      => Controls_Manager::ICONS,
                'default'   => [
                    'value'     => 'fab fa-facebook-f',
                    'library'   => 'solid',
                ],
                'condition'  => [
                    'icon_type' => 'fontawesome',
                ],
            ]
        );

        $this->add_control(
            'image_icon',
            [
                'label'     => __( 'Image icon', 'medilax' ),
                'type'      => Controls_Manager::MEDIA,
                'condition' => [
                    'icon_type' => 'image_icon'
                ],
            ]
        );

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<!-----------------------Start Call to action Area----------------------->';
            echo '<div class="number-meta">';
                if( $settings['icon_type'] == 'flaticon' ) {
                    echo '<div class="icon">';
                            echo '<i class="'.esc_attr( $settings['flaticon'] ).'"></i>';
                    echo '</div>';
                }elseif( $settings['icon_type'] == 'fontawesome' ) {
                    echo '<div class="icon">';
                            \Elementor\Icons_Manager::render_icon( $settings['fontawesome'], [ 'aria-hidden' => 'true' ] );
                    echo '</div>';
                }elseif( $settings['icon_type'] == 'image_icon' ){
                    $icon = wp_get_attachment_image_src( $settings['image_icon']['url'], 'medilax_70X70' );
                    echo '<div class="icon">';
                        echo '<img src="'.esc_url($icon[0]).'" alt="'.esc_html__( 'Icon', 'medilax' ).'">';
                    echo '</div>';
                }
                echo '<div class="media-body">';
                    if(!empty($settings['title'])){
                        echo '<div class="meta-label">'.esc_html($settings['title']).'</div>';
                    }
                    if(!empty($settings['contact_phone'])){
                        $phone      = $settings['contact_phone'];
                        $replace    = array(' ','-',' - ', '(', ')');
                        $with       = array('','','' ,'' ,'');
                        $mobileurl  = str_replace( $replace, $with, $phone );

                        echo '<a href="'.esc_attr( 'tel:'.$mobileurl ).'" class="meta-number">'.esc_html( $phone ).'</a>';
                    }
                echo '</div>';
            echo '</div>';
           
		echo '<!------------------------End Call to action Area------------------------>';
	}
}