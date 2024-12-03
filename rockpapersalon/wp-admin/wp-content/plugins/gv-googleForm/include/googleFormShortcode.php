<?php
function google_form_shortcode($atts) {
   
    $form_url = 'https://docs.google.com/forms/u/0/d/e/1FAIpQLSfD7_78R1QrTkEcm1egn9HheKmALKuWEdD0psHB99ZnImQacA/formResponse';

    if (isset($_POST['form-submit'])) {
       
            
            $post_fields = array();
           
            $post_fields['entry.441788810'] = $_POST['your-name']; 
            $post_fields['entry.203131635'] = $_POST['your-phone']; 
            $post_fields['entry.698862390'] = $_POST['form-location']; 
            $post_fields['entry.1867244301'] = $_POST['form-service']; 
            $post_fields['entry.1744886259'] = $_POST['myMessage']; 
          
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $form_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $post_fields,
               
            ));

            $response = curl_exec($curl);

            $http_status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        curl_close($curl);
        if($http_status_code==200){
            
            
              $phone_number=  '9895328333';
          $name=$_POST['your-name']; 
          $phon_num=$_POST['your-phone']; 
          $location=$_POST['form-location']; 
          $service=$_POST['form-service']; 
          $user_message=$_POST['myMessage']; 
            $message = urlencode("Name: $name\nNumber: $phon_num\nLocation: $location\nService:$service\nMessage:$user_message");
$whatsapp_url = "https://api.whatsapp.com/send?phone=$phone_number&text=$message";
  echo "<script>window.location.href='$whatsapp_url';</script>";
        exit(); 
        
        
        }
  

    }

    ob_start();

    echo '
    <div class="wpcf7 js alert_inited">
    <form class="gvGoogleForm" method="post">
       <div class="form-style-1">
      
           <p>
             <input type="text" class="wpcf7-form-control wpcf7-text" name="your-name" value="" size="40"  placeholder="Your Name" required>
           </p>
           <p>
             <input type="text" class="wpcf7-form-control wpcf7-text" name="your-phone" value="" size="40"  placeholder="Phone" required>
           </p>
           <p>
               <select name="form-location" id="form_location" required>
               <option value="">-- Choose Location --</option>';
                
    $args = array(
        'post_type' => 'location_slider',
        'posts_per_page' => -1, 
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_title = get_the_title();
             $pdf_url = get_field('menu_pdf');
            echo '<option data-pdf="' . esc_attr($pdf_url['url']) . '" value="' . esc_attr($post_title) . '">' . esc_html($post_title) . '</option>';
        }
        wp_reset_postdata();
    } 
    
    
           echo '</select>
           <a class="download_menu" href="">Download menu</a>
           </p>
           
           <p>
             <select name="form-service" id="service-dropdown" required>
             <option data-parentOption="" value="">-- Choose Service --</option>';
              $args = array(
        'post_type' => 'location_slider', 
        'posts_per_page' => -1, 
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_title = get_the_title();
            $services = get_field('services');
            if ($services) {
                foreach ($services as $service) {
                    $service_name = $service['name']; 
                    echo '<option data-parentOption="' . esc_attr($post_title) . '" value="' . esc_attr($service_name) . '">' . esc_html($service_name) . '</option>';
                }
            }
        }
        wp_reset_postdata();
    }
             
            echo '</select>
           </p>
           <p>
           <textarea name="myMessage" placeholder="Message"></textarea>
           </p>
              
        
           <p><input type="submit" name="form-submit" value="Send Message"></p>
        
    
       </div>
   </form>
   </div>';

    return ob_get_clean(); 

}
add_shortcode('google_form', 'google_form_shortcode');