<?php

function add_custom_styles_and_scripts_to_footer() {
    ?>
    <style>
    body{
	overflow-x: hidden;
}
.thumbnails-container {
	    display: flex;
    justify-content: center;
    gap: 10px;
}
.elementor-kit-9 button, .elementor-kit-9 input[type="button"], {
	background-color: #047E04;
	border-radius: 8px;
}
.elementor-kit-9 input[type="submit"]{
	background-color: #024A02;
	border-radius: 8px;
	border-color:#047E04;
	color: white;
}
.elementor-kit-9 input[type="submit"]:hover{
	background-color: #024a02; 
	text-decoration:unset;
}
.thumbnails-container img{
	    width: 150px;
    height: 150px;
    object-fit: contain; 
	cursor:pointer;
}
.popup-overlay .popup .close{
	    cursor: pointer;
    font-size: 30px;
    color: white;
}
.gallery-slider .slick-list img{
	height: 62vh; 
	object-fit:cover;
}
.dropdown-content{
	    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
	margin-bottom: 36px;
}
.dropdown-content a{
	  
    border-width: 1px 1px 1px 1px;
}
.dropdown-content a:hover{
	    background: #047E04;
    color: white;
    text-decoration: unset;
}
.popup-overlay .popup{
	    width: 70%;
    height: 73%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.elementor-kit-9 button{
	color: #047E04;
	border-color: #047E04;
}
.custom-slider button:focus {
    border-color: unset !important;
    background: unset !important;
    text-decoration: unset;
}
.singleSlider button:focus {
    border-color: unset !important;
    background: unset !important;
    text-decoration: unset;
}
.single-slider{
	   
    padding: 50px;
}
.elementor-kit-9 button:hover{
	background:#047E04;
	color:white;
	text-decoration: unset;
}
.popup-overlay{
	display:none;
	    position: fixed;
    width: 100%;
    height: 100vh;
    background: #00000069;
    z-index: 9999;
    top: 0;
}

button.popup-BAA{
    background-color: #047E04;
    border-radius: 8px;
    border-color: #047E04;
    color: white;
    cursor: pointer;
}
button.popup-BAA:hover{
	    background-color: #024a02;
    text-decoration: unset;
}
  .dropdown-button {
   width: 200px;
    border: none;
    cursor: pointer;
  }
.elementor-kit-9 button:focus{
	border-color: #047E04;
	background:#047E04;
	text-decoration: unset;
}
.slick-dots li{
	width: 14px; 
	margin: 0;
}

  .dropdown-content a {
    color: black;
    padding: 6px 16px;
    text-decoration: none;
    display: block;
  }
  .dropdown.selected .dropdown-button {
        background-color: #047E04;
    text-decoration: unset;
    color: white;
  }
.slick-dots li button:before{
	font-size: 9px;
}
.slick-dots li.slick-active button:before{
	font-size: 9px;
	    opacity: 1;
    color: #024a02;
}

.singleSlider .slider-item{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
	gap: 60px;
}
.singleSlider .slider-item .content-block p{
	margin-top: 20px;
}
.singleSlider .slider-item .content-block a:hover{
	background-color: #047E04;
	color:white;
}
.custom-slider .slick-dots{
	bottom: -46px;
}
.singleSlider .slider-item .content-block a{
       font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    background-color: #024A02;
    border-style: solid;
    border-width: 1px 1px 1px 1px;
    border-color: #047E04;
    padding: 17px 30px 17px 30px;
    display: inline-block;
    line-height: 1.2;
    color: white;
    border-radius: 8px;
}
.elementor-kit-9 a {
   color: #093309;
}
.slick-dots button:hover{
	    background: unset;
    color: white;
    text-decoration: unset;
    border: unset;
}

.elementor.elementor-13{
	overflow-x: hidden;
}
.overlay-popup{
	    position: fixed;
    width: 100%;
    height: 100vh;
    z-index: 999;
    background: #0000007d;
	display:none;
}

body{
	margin:0;
}
.slick-next {
    right: -5px;
}
.slick-prev:before{
	 color: black;
    font-size: 28px;
}
.slick-next:before{
    color: black;
    font-size: 28px;
}
.elementor-kit-9 .elementor-button{
	color: #047E04;
	border-color: #047E04;
}
.elementor-kit-9 .elementor-button:hover{
	background-color: #047E04;
	color: white;
	}
.popup-content .close{
	    font-size: 30px;
    color: white;
    margin-left: 12px;
	cursor: pointer;
}
.popup-content .popup-text{
	    width: 60%;
    color: balck;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    border-radius: 8px;
   padding: 40px 30px;
	border: 2px solid green;
}
@media(max-width:500px){
	.single-slider{
		padding: 50px 0;
	}
	.singleSlider .slider-item{
		display: unset;
	}
	.appointment-link{
		margin-bottom: 20px;
	}
}
       	
.main-btn {
    animation: ripple 2s linear infinite;
    position: fixed;
    right: 50px;
    bottom: 50px;
    z-index: 9999 !important;
    border: 0;
    outline: 0;
    border-radius: 50px !important;
   background: #047e04 !important;
    width: 70px;
    height: 70px;
    color: #ffff !important;
    box-shadow: 0px 0px 25px #3500d3;
    transition: all 0.4s ease;
    cursor: pointer;
}
@keyframes ripple {
  0% {
  box-shadow: 0 0 0 0.7rem #3500d32b;
              
  }
  50% {
    box-shadow: 0 0 0 1.5rem #3500d32b;
              
  }
	100%{
		box-shadow: 0 0 0 0.7rem #3500d32b;
	}
}
	

.btn-top.active {
  opacity: 1;
 	z-index: 99999;
}

.btn-bottom {
	bottom: 147px;
    position: fixed;
    opacity: 0;
    right: 50px;
    border: 0;
    outline: 0;
    width: 70px;
    height: 70px;
    border-radius: 50px;
    background: #25d366 !important;
    color: #ffff !important;
    font-size: 2.3em;
    box-shadow: 0px 0px 25px #25d366;
    transition: all 0.4s ease;
    z-index: -1;
}

.btn-bottom.active {
  opacity: 1;
	z-index: 99999;
}

.btn-right {
    position: fixed;
    opacity: 0;
    bottom: 146px;
    right: 131px;
    border: 0;
    outline: 0;
    width: 70px;
    height: 70px;
    border-radius: 50px;
    background: deeppink !important;
    color: #ffff !important;
    box-shadow: 0px 0px 25px deeppink;
    transition: all 0.4s ease;
    z-index: -1;
}

.btn-right.active {
 z-index: 99999;
  opacity: 1;
}

.btn-left {
  position: absolute;
  opacity: 0;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -38.5%);
  border: 0;
  outline: 0;
  width: 70px;
  height: 70px;
  border-radius: 50px;
  background: black !important;
  color: #ffff !important;
  font-size: 1.7em;
  box-shadow: 0px 0px 25px black;
  transition: all 0.4s ease;
  z-index: -1;
}
	.phone.book-an-app{ 
		    right: 18px;
    bottom: -21px;
	}
	.whatsapp.book-an-app{
		   right: 19px;
    bottom: -21px;
	}
	.envelope.book-an-app{ 
		    right: 18px;
    bottom: -21px;
	}
	.book-an-app{
		color: #8A879F;
		      position: absolute;
   right: -41px;
    font-size: 14px;
    width: max-content;
    bottom: -25px;
	}
.btn-left.active {
  opacity: 1;
  left: 38%;
}
	.popup-appointment span{
		letter-spacing:0 !important;
	}
	.popup-appointment button{
		border-radius: 50px !important;
		border: unset !important;
	}
	.popup-appointment i{
		transform: scale(2.5);
	}
	.call-container{
		display: none;
    width: 100%;
    height: 100vh;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0,0,0,0.4);
    z-index: 9999;
	}
	.whatsApp-container{
		display: none;
    width: 100%;
    height: 100vh;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0,0,0,0.4);
    z-index: 9999;
	}
	#it-intro{
		transform: translate(-50%, -50%);
		    width: 540px;
    position: fixed;
    top: 50%;
    left: 50%;
  
    padding: 10px;
    text-align: center;
    border-radius: 3px;
    background: rgb(66, 66, 66);
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.5);
    border: 2px solid rgba(0, 0, 0, 0.7)
    border-radius: 3px;
    z-index: 999999;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#E9E9E9));
    background-image: -webkit-linear-gradient(top, #FFFFFF, #E9E9E9);
    background-image: -moz-linear-gradient(top, #FFFFFF, #E9E9E9);
    background-image: -ms-linear-gradient(top, #FFFFFF, #E9E9E9);
    background-image: -o-linear-gradient(top, #FFFFFF, #E9E9E9);
    background-image: linear-gradient(top, #FFFFFF, #E9E9E9);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#FFFFFF', EndColorStr='#E9E9E9');
	}
	#whatsApp-intro{
		transform: translate(-50%, -50%);
		    width: 540px;
    position: fixed;
    top: 50%;
    left: 50%;
   
    padding: 10px;
    text-align: center;
    border-radius: 3px;
    background: rgb(66, 66, 66);
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.5);
    border: 2px solid rgba(0, 0, 0, 0.7)
    border-radius: 3px;
    z-index: 999999;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#E9E9E9));
    background-image: -webkit-linear-gradient(top, #FFFFFF, #E9E9E9);
    background-image: -moz-linear-gradient(top, #FFFFFF, #E9E9E9);
    background-image: -ms-linear-gradient(top, #FFFFFF, #E9E9E9);
    background-image: -o-linear-gradient(top, #FFFFFF, #E9E9E9);
    background-image: linear-gradient(top, #FFFFFF, #E9E9E9);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#FFFFFF', EndColorStr='#E9E9E9');
	}
	#it-intro p{
		    margin-bottom: 10px;
    margin-top: 0;
    display: flex;
    justify-content: center;
	}
	#whatsApp-intro p{
		    margin-bottom: 10px;
    margin-top: 0;
    display: flex;
    justify-content: center;
	}
	.extensionText span{
		    color: #797979;
    font-size: 15px;
	}
	.it-test-panel i{
		    position: absolute;
    top: 6px;
    right: 6px;
    font-size: 20px;
    color: #000;
    cursor: pointer;
	}
	#it-intro p a{
		    margin-left: 65px;
    line-height: 1.42857143;
    padding: 8px 12px 6px 12px;
		font-size: 14px;
		color: #E7E7E7;
		border-radius: 4px;
    display: inline-block;
    text-decoration: unset;
	}
	#whatsApp-intro p a{
		    margin-left: 65px;
    line-height: 1.42857143;
    padding: 8px 12px 6px 12px;
		font-size: 14px;
		color: #E7E7E7;
		border-radius: 4px;
    display: inline-block;
    text-decoration: unset;
	}
	
	.call-error{
		color: red;
	}
	.whatsApp-error{
		color: red;
	}
	#branchDropdown{
		    background-color: #02010100;
    border-style: solid;
    border-width: 1px 1px 1px 1px;
    border-color: var( --e-global-color-text );
    border-radius: 0px 0px 0px 0px;
    padding: 16px 20px 16px 20px;
	}
	#callButton{
		margin-bottom: 30px;
		    background-color: #047E04;
    border-radius: 8px;
    border-color: #047E04;
    color: white;
		cursor:pointer;
	}
	#callButton:hover{
		    background-color: #024a02;
    text-decoration: unset;
	}

	#whatsAppDropdown{
		    background-color: #02010100;
    border-style: solid;
    border-width: 1px 1px 1px 1px;
    border-color: var( --e-global-color-text );
    border-radius: 0px 0px 0px 0px;
    padding: 16px 20px 16px 20px;
	}
	#whatsAppButton{
		margin-bottom: 30px;
		    background-color: #047E04;
    border-radius: 8px;
    border-color: #047E04;
    color: white;
		cursor:pointer;
	}
	#whatsAppButton:hover{
		    background-color: #024a02;
    text-decoration: unset;
	}
	
		.whatsApp-containerOverlay{
    width: 100%;
    height: 100vh;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
	}
	.call-containerOverlay{
    width: 100%;
    height: 100vh;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
	}
	@media(max-width:500px)
{
	#whatsApp-intro{
		width: 300px;
	}
	#it-intro{
		width: 300px;
	}
	}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <span class="popup-appointment">
        <button class="main-btn">
            <i class="fas fa-calendar-days"></i>
            <span class="book-an-app">Book an Appointment</span>
        </button>
        <button class="btn-bottom"><i class="fab fa-whatsapp"></i><span class="whatsapp book-an-app">Lakshmi Nada</span></button>
        <button class="btn-right"><i class="fa-solid fa-phone"></i><span class="phone book-an-app"></span></button>
    </span>

    <div class="call-container">
        <div class="call-containerOverlay"></div>
        <div id="it-intro">
            <div class="it-test-panel">
                <i class="fa fa-times-circle closePopUp"></i>
                <h3>Choose Branch</h3>
                <p class="extensionText"><select id="branchDropdown">
                    <option value="">-- Choose Branch --</option>
                    <option value="9895325333">Lekshminada, Kollam</option>
                    <option value="9895328333">Vendermukku, Kollam</option>
                    <option value="9895329444">Kottiyam</option>
                    <option value="9895333151">Kazhakootam, tvm</option>
                    <option value="8089456333">Vendermukku, Kollam</option>
                    <option value="9746058742">Koramangala, Bengaluru</option>
                    <option value="9895328433">HSR layout, Bengaluru</option>
                </select>
                </p>
                <p class="call-error"></p>
                <button id="callButton">Call Branch</button>
            </div>
        </div>
    </div>

    <div class="whatsApp-container">
        <div class="whatsApp-containerOverlay"></div>
        <div id="whatsApp-intro">
            <div class="it-test-panel">
                <i class="fa fa-times-circle closePopUp"></i>
                <h3>Choose Branch</h3>
                <p class="extensionText"><select id="whatsAppDropdown">
                    <option value="">-- Choose Branch --</option>
                    <option value="9895325333">Lekshminada, Kollam</option>
                    <option value="9895328333">Vendermukku, Kollam</option>
                    <option value="9895329444">Kottiyam</option>
                    <option value="9895333151">Kazhakootam, tvm</option>
                    <option value="8089456333">Vendermukku, Kollam</option>
                    <option value="9746058742">Koramangala, Bengaluru</option>
                    <option value="9895328433">HSR layout, Bengaluru</option>
                </select>
                </p>
                <p class="whatsApp-error"></p>
                <button id="whatsAppButton">WhatsApp Branch</button>
            </div>
        </div>
    </div>
    
    
    <script>
        jQuery(document).ready(function( $ ){
	
		$('.call-containerOverlay').click(function() {
		$('.call-container').removeClass('open');
        $('.call-container').hide();
		 });
	
	$('.whatsApp-containerOverlay').click(function() {
		$('.whatsApp-container').removeClass('open');
        $('.whatsApp-container').hide();
		 }); 
	
	
 $('#callButton').click(function() {
        var branchOption = $('#branchDropdown option:selected');
        var phoneNumber = branchOption.val();

        if (phoneNumber) {
            window.location.href = 'tel:' + phoneNumber;
        } else {
            $('.call-error').text('Select Your Branch');
        }
    });
	

	$('#whatsAppButton').click(function() {
        var branchOption = $('#whatsAppDropdown option:selected');
        var phoneNumber = branchOption.val();

		if (phoneNumber) {
        var whatsappURL = 'https://api.whatsapp.com/send?phone=' + phoneNumber;
        window.open(whatsappURL, '_blank');
    } else {
        $('.call-error').text('Select Your Branch');
    }
    });

	$('.btn-bottom').on('click', function(e) {
		e.preventDefault();
		  $('.btn-bottom').removeClass('active');
  		$('.btn-right').removeClass('active');
		$('.whatsApp-container').addClass('open');
        $('.whatsApp-container').show();
    });


	
    $('.btn-right').on('click', function(e) {
		 e.preventDefault();
		  $('.btn-bottom').removeClass('active');
  			$('.btn-right').removeClass('active');
		$('.call-container').addClass('open');
        $('.call-container').show();
    });
   
    $('.it-test-panel i').on('click', function(e) {
        e.preventDefault();
		$('.call-container').removeClass('open');
        $('.call-container').hide();
		$('.whatsApp-container').hide();
    });
	
	
  
 
	
		$('.menu-item').click(function() {
		$('#ekit-megamenu-main-menu').removeClass('active');
        $('.elementskit-menu-overlay').removeClass('active');
		 });
	 
	
	
 $('#service-dropdown').prop('disabled', true);
	  $('#service-dropdown option').hide();
	   $('.download_menu').removeAttr('href').hide();

    $('#form_location').change(function() {
        
        
        var selectedOption = $(this).find(':selected');
        var pdfUrl = selectedOption.attr('data-pdf');
         if (pdfUrl && pdfUrl !== '') {
            $('.download_menu').attr('href', pdfUrl).show();
        } else {
            $('.download_menu').removeAttr('href').hide();
        }
        
        
      var selectedOption = $(this).val();
      $('#service-dropdown option').hide();
		 $('#service-dropdown').prepend('<option value="" data-parentOption="">-- Choose Service --</option>');

      $('#service-dropdown option[data-parentOption="' + selectedOption + '"]').show();
		 $('#service-dropdown').prop('disabled', false);
		
		
		 $('#service-dropdown').val('');
    });
	
	   $('#service-dropdown').change(function() {
        if ($(this).val() === '') {
            $(this).prop('disabled', true);
        }
    });
	
	 $('#service-dropdown').change(function() {
        var selectedLocation = $('#form_location').val();
        if ($(this).val() !== '' && selectedLocation === '') {
            $(this).val('');
        }
    });


	
   	const btn = $('.main-btn');
const btnBottom = $('.btn-bottom');
const btnRight = $('.btn-right');
	
$(document).on('click', function(e) {
    if (!$(e.target).closest('.main-btn, .btn-bottom, .btn-right').length) {
        btn.removeClass('active');
        btnBottom.removeClass('active');
        btnRight.removeClass('active');
    }
});

btn.on('click', function () {
  btnBottom.toggleClass('active');
  btnRight.toggleClass('active');
  btn.addClass('active');
  setTimeout(function() {
    btn.removeClass('active');
  }, 600);
});


 
	
	
	

});




    </script>
    <?php
}
add_action('wp_footer', 'add_custom_styles_and_scripts_to_footer');