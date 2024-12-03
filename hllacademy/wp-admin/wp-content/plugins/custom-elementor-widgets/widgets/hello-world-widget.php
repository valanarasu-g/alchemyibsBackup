<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Elementor_Hello_World_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hello_world';
    }

    public function get_title() {
        return __('Hll Services', 'custom-elementor-widgets');
    }

    public function get_icon() {
        return 'eicon-post';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'custom-elementor-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'hello_text',
            [
                'label' => __('Hello Text', 'custom-elementor-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Hello World!', 'custom-elementor-widgets'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="blockchain">
   
    <div class="grid-block">
        <div class="content">
            <h2>Artificial Intelligence</h2>
            <div class="content-para">
                Accelerate your business to new heights with Accubits AI Development Services. We pride ourselves on delivering cutting-edge, tailor-made AI solutions that drive growth, efficiency, and customer satisfaction. Our AI experts are dedicated to harnessing the transformative power of technology to empower your organization, enabling you to stay ahead of the competition in today's fast-paced digital landscape.            
            </div>
           <ul>
                                <a href=""><img src="https://accubits.com/wp-content/themes/accubits/images/services/dot.png" alt="">Generative AI Services</a>
                                <a href=""><img src="https://accubits.com/wp-content/themes/accubits/images/services/dot.png" alt="">Computer Vision</a>
                                <a href=""><img src="https://accubits.com/wp-content/themes/accubits/images/services/dot.png" alt="">Conversational Tools</a>
                                <a href=""><img src="https://accubits.com/wp-content/themes/accubits/images/services/dot.png" alt="">AI powered Automation</a>
                                <a href=""><img src="https://accubits.com/wp-content/themes/accubits/images/services/dot.png" alt="">AI consulting services</a>
                                <a href=""><img src="https://accubits.com/wp-content/themes/accubits/images/services/dot.png" alt="">Business Intelligence solutions</a>
                            </ul>
            <a target="_blank"
                href="#">View more</a>
        </div>
        <div class="slider-block">
            <div class="slider" id="service_slider">
                <div class="swiper-wrapper">
                   
                    <div class="card swiper-slide">
                          <img src="https://accubits.com/wp-content/uploads/2020/08/accu-intel-partner-1.png" alt="">
                        <h4>Accubits Partners with INTEL to Accelerate CPU Powered AI</h4>
                        <p>Accubits technologies have partnered with Intel to build highly efficient AI applications using Intel’s AI accelerators. Accubits aims to increase performance and optimize its products and other offerings on Intel-based platforms with this partnership. As a first step, Accubits migrated one of its core products, Emotyx, from a GPU-based architecture to Intel’s CPU-based architecture.</p>
                                                <a target="_blank">Read More</a>
                    </div>
                  
                </div>
 
            </div>
             <img class="service-left-arrow"
                src="<?php echo plugin_dir_url(__FILE__) . 'img/left-arrow.png'?>" alt="">
            <img class="service-right-arrow"
                src="<?php echo plugin_dir_url(__FILE__) . 'img/right-arrow.png'?>" alt="">

          

        </div>
    </div>
  
</section>
        <?php
       
    }
}
