<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
/**
 *
 * Counter Up Widget .
 *
 */
class Medilax_Counterup_Widget extends Widget_Base {

    public function get_name() {
        return 'counterup';
    }

    public function get_title() {
        return esc_html__( 'Medilax Counter Up', 'medilax' );
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return [ 'medilax' ];
    }

    public function get_script_depends() {
        return [ 'counter-up' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'counter_section',
            [
                'label'     => esc_html__( 'Counter', 'medilax' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'counter_text',
            [
                'label'     => esc_html__( 'Counter Title', 'medilax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => esc_html__( 'Counter Title', 'medilax' ),
                'rows'      => 2
            ]
        );
        $repeater->add_control(
            'counter_desc',
            [
                'label'     => esc_html__( 'Counter Content', 'medilax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => esc_html__( 'Incubate extensive scenarios without top-line quality vectors. Authoritatively engage', 'medilax' ),
            ]
        );
        $repeater->add_control(
            'counter_number',
            [
                'label'     => esc_html__( 'Counter Number', 'medilax' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 5,
                'max'       => 100000,
                'step'      => 10,
                'default'   => 25,
            ]
        );

        $repeater->add_control(
            'counter_suffix_text',
            [
                'label'     => esc_html__( 'Counter Suffix Text', 'medilax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => esc_html__( '+', 'medilax' ),
            ]
        );

        $repeater->add_control(
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
        $repeater->add_control(
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
        $repeater->add_control(
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

        $repeater->add_control(
            'image_icon',
            [
                'label'     => __( 'Image icon', 'medilax' ),
                'type'      => Controls_Manager::MEDIA,
                'condition' => [
                    'icon_type' => 'image_icon'
                ],
            ]
        );

        $this->add_control(
            'counter_item',
            [
                'label'         => esc_html__( 'Counter Item', 'medilax' ),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'default'       => [
                    [
                        'counter_number'    => esc_html__( '250', 'medilax' ),
                        'counter_text'      => esc_html__( 'Client', 'medilax' ),
                    ],
                ],
                'title_field'   => '{{{ counter_text }}}',
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------general styling------------------------------------*/

        $this->start_controls_section(
            'general_styling',
            [
                'label'         => __( 'Genaral', 'medilax' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label'         => __( 'Box Background Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .skill-wrap1' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'          => 'box_shadow',
                'label'         => __( 'Box Shadow', 'medilax' ),
                'selector'     => '{{WRAPPER}} .skill-wrap1',
            ]
        );
        $this->add_control(
            'width',
            [
                'label'     => __( 'Box Radious', 'medilax' ),
                'type'      => Controls_Manager::SLIDER,
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
                    '{{WRAPPER}} .skill-wrap1' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        
        /*-----------------------------------------icon styling------------------------------------*/
        $this->start_controls_section(
            'icon_style_section',
            [
                'label'     => __( 'Icon Settings', 'medilax' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'medilax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ripple-icon i' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label'     => __( 'Icon Hover Color', 'medilax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ripple-icon:hover i' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_background_color',
            [
                'label'     => __( 'Icon Background Color', 'medilax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ripple-icon i' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_background_hover_color',
            [
                'label'     => __( 'Icon Background Hover Color', 'medilax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ripple-icon:hover i' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_ripple_effect_color',
            [
                'label'         => __( 'Icon Ripple Effect Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .ripple-icon:after,{{WRAPPER}} .ripple-icon:before' => 'background-color: {{VALUE}}!important;',
                ]
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Counter styling------------------------------------*/

        $this->start_controls_section(
            'skill_counter_styling',
            [
                'label'     => __( 'Counter Styling', 'medilax' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'skill_counter',
            [
                'label'         => __( 'Counter Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .vs-skill-wrapper h2' => 'color: {{VALUE}}!important;',

                ],
            ]
        );

        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 'skill_counter_typography',
                'label'         => __( 'Counter Typography', 'medilax' ),
                'selector'      => '{{WRAPPER}} .vs-skill-wrapper h2',
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------Title styling------------------------------------*/

        $this->start_controls_section(
            'skill_title_styling',
            [
                'label'     => __( 'Title Styling', 'medilax' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'skill_title',
            [
                'label'         => __( 'Title Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .vs-skill-wrapper .text-title' => 'color: {{VALUE}}!important;',

                ],
            ]
        );

        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 'skill_title_typography',
                'label'         => __( 'Title Typography', 'medilax' ),
                'selector'      => '{{WRAPPER}} .vs-skill-wrapper .text-title',
            ]
        );

        $this->add_responsive_control(
            'skill_title_margin',
            [
                'label'         => __( 'Title Margin', 'medilax' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .vs-skill-wrapper .text-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'skill_title_padding',
            [
                'label'         => __( 'Title Padding', 'medilax' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .vs-skill-wrapper .text-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Content styling------------------------------------*/

        $this->start_controls_section(
            'skill_content_styling',
            [
                'label'     => __( 'Content Styling', 'medilax' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'skill_content',
            [
                'label'         => __( 'Content Color', 'medilax' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .vs-skill-wrapper .count-desc' => 'color: {{VALUE}}!important;',

                ],
            ]
        );

        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 'skill_content_typography',
                'label'         => __( 'Content Typography', 'medilax' ),
                'selector'      => '{{WRAPPER}} .vs-skill-wrapper .count-desc',
            ]
        );

        $this->add_responsive_control(
            'skill_content_margin',
            [
                'label'         => __( 'Content Margin', 'medilax' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .vs-skill-wrapper .count-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'skill_content_padding',
            [
                'label'         => __( 'Content Padding', 'medilax' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .vs-skill-wrapper .count-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        echo '<!---------------------- Start Counter Area-------------------- -->';
        echo '<section class="vs-skill-wrapper  ">';
            echo '<div class="container">';
                echo '<div class="skill-wrap1 bg-white">';
                    echo '<div class="row justify-content-center justify-content-lg-between">';
                        foreach ( $settings['counter_item'] as $item ) :
                        echo '<div class="col-md-6 col-lg-auto  mb-30">';
                            echo '<div class="d-xl-flex text-center text-xl-start skill-box">';
                                if( $item['icon_type'] == 'flaticon' ) {
                                    echo '<span class="ripple-icon align-self-start mb-20 mb-xl-0 mr-20">';
                                            echo '<i class="'.esc_attr( $item['flaticon'] ).'"></i>';
                                    echo '</span>';
                                }elseif( $item['icon_type'] == 'fontawesome' ) {
                                    echo '<span class="ripple-icon align-self-start mb-20 mb-xl-0 mr-20">';
                                            \Elementor\Icons_Manager::render_icon( $item['fontawesome'], [ 'aria-hidden' => 'true' ] );
                                    echo '</span>';
                                }elseif( $item['icon_type'] == 'image_icon' ){
                                    $icon = wp_get_attachment_image_src( $item['image_icon']['url'], 'medilax_70X70' );
                                    echo '<div class="img-icon">';
                                        echo '<img src="'.esc_url($icon[0]).'" alt="'.esc_html__( 'Icon', 'medilax' ).'">';
                                    echo '</div>';
                                }
                                echo '<div class="media-body">';
                                    if( !empty( $item['counter_number'] ) ){
                                        echo '<h2 class="mt-n2 mb-0 text-theme">'.esc_html( $item['counter_number'] );
                                        echo esc_html( $item['counter_suffix_text'] );
                                        echo '</h2>';
                                    }
                                    if( !empty( $item['counter_text'] ) ){
                                        echo '<p class="text-title fs-md fw-medium mt-1 mt-xl-0 mb-2 mb-xl-2">'.esc_html( $item['counter_text'] ).'</p>';
                                    }
                                    if( !empty( $item['counter_desc'] ) ){
                                        echo '<p class="count-desc fs-xs mb-0">'.esc_html( $item['counter_desc'] ).'</p>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                        endforeach;
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</section>';
        
    }

}