<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
jQuery(document).ready(function( $ ){
	
	  var charLimit = 300; // Character limit for "Read More"
    
    // Function to truncate text and add "Read More" link
    function truncateContent() {
        $('.slider1992 .swiper-slide-inner').each(function() {
            var content = $(this).find('.elementskit-commentor-content p');
            var fullText = content.data('full-text') || content.text();
            content.data('full-text', fullText); // Store full text in data attribute
            
            if (fullText.length > charLimit) {
                var truncatedText = fullText.substr(0, charLimit) + '...';
                content.text(truncatedText);
                
                // Add "Read More" link after the <p> tag if not already present
                if (!$(this).find('.read-more').length) {
                    content.after('<a href="#" class="read-more">Read More</a>');
                }
            }
        });
    }
    
    // Initial truncation and setup
    truncateContent();

    // Toggle content visibility on "Read More" click
    $('.slider1992').on('click', '.read-more', function(e) {
        e.preventDefault();
        
        var content = $(this).siblings('p');
        var fullText = content.data('full-text');
        
        if ($(this).text() === 'Read More') {
            content.text(fullText);
            $(this).text('Read Less');
        } else {
            var truncatedText = fullText.substr(0, charLimit) + '...';
            content.text(truncatedText);
            $(this).text('Read More');
        }
    });
    
    // Function to reset the content of non-active slides
    function resetNonActiveSlides() {
        $('.slider1992 .swiper-slide').not('.swiper-slide-active').each(function() {
            var content = $(this).find('.elementskit-commentor-content p');
            var fullText = content.data('full-text');
            
            if (fullText && fullText.length > charLimit) {
                var truncatedText = fullText.substr(0, charLimit) + '...';
                content.text(truncatedText);
            }
            
            // Reset "Read More" link text if it exists
            $(this).find('.read-more').text('Read More');
        });
    }

    // Set up a mutation observer to watch for class changes on swiper slides
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                // When class attribute changes, reset content on non-active slides
                resetNonActiveSlides();
            }
        });
    });
    
    // Observe each slide for class changes
    $('.slider1992 .swiper-slide').each(function() {
        observer.observe(this, { attributes: true });
    });

    resetNonActiveSlides(); 
	
	
	
	
	
	

});



</script>
<!-- end Simple Custom CSS and JS -->
