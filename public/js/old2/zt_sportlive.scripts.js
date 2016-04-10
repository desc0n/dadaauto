
jQuery(document).ready(function($){

    jQuery('#zo2-position-0 .search-icon').click(function(){
          jQuery('.search .search-inner').fadeIn('300');
          jQuery('#zo2-position-0 .search .search-inner .inputbox').focus().css("color","#fff");

    });
    jQuery('#zo2-position-0 .search-close').click(function(){
          jQuery('.search .search-inner').fadeOut('300');
    });

    jQuery('.zt-the-club-features .panel-heading').eq(0).addClass('active');
    jQuery('.zt-the-club-features .panel-heading').click(function(){
        if(jQuery(this).hasClass('active')){
            jQuery(this).removeClass('active');
        }
        else{
            jQuery('.zt-the-club-features .panel-heading').removeClass('active');
            jQuery(this).toggleClass('active');
        }
    });

    jQuery('#myCarousel').carousel() ;
    jQuery('#myCarousel').bind('slide', function(e){ //This event is fired when the carousel has completed its slide transition.
        var index = jQuery('#myCarousel .item').index(jQuery('#myCarousel .carousel-inner .active')); // find the index of current slide
        jQuery('.carousel-indicators .active').removeClass('active'); // reset the navigation
        jQuery('.carousel-nav').eq(index).addClass('active'); // update the navigation
    });
    jQuery('.carousel-nav').bind('click', function(e){
        jQuery('.carousel-indicators .active').removeClass('active'); // reset the navigation
        var index = jQuery('.carousel-nav').index(this); // find the clicked slide navigation
        jQuery('#myCarousel').carousel(index); // navigate to the selected slider
        jQuery(this).addClass('active'); // mark selected to the clicked navigation
    });



    jQuery("#gototop").click(function(){
        jQuery("body, html").animate({scrollTop: 0}); return false;
    });
    var scrollDiv = document.createElement("div");
            jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() != 0) {
                    jQuery("#gototop").fadeIn();
                } else {
                    jQuery("#gototop").fadeOut();
                }
            });

            jQuery('.mega_features').parent().addClass('featuresWrap');

    var owl = $("#zt-logo-brand .custom");
        owl.owlCarousel({
            autoPlay: 3000,
            items : 6,
            navigation : true,
            pagination : false,
            slideSpeed : 500
        });

    jQuery('.faq_block .panel-heading').eq(0).addClass('active');
        jQuery('.faq_block .panel-heading').click(function(){
            if(jQuery(this).hasClass('active')){
                jQuery(this).removeClass('active');
            }
            else{
                jQuery('.faq_block .panel-heading').removeClass('active');
                jQuery(this).toggleClass('active');
            }
        });


}(jQuery));

jQuery(document).ready(function(){
    wow = new WOW({
          boxClass:     'wow',
          animateClass: 'animated',
          offset:       100
        });
     });   