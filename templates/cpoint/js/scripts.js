
$(function(){

	// Anchors
	$('.anchor').on('click', '[href*="#"]', function(e){
		$('html,body').stop().animate({ scrollTop: $(this.hash).offset().top}, 1000);
		e.preventDefault();
	});

	// Mobile Menu
	$('.menu-toggle').click(function(){
		if ($('.mobile-menu').hasClass('open')) {
			$(this).removeClass('open');
			$('.mobile-menu').removeClass('open');
		} else {
			$(this).addClass('open');
			$('.mobile-menu').addClass('open');
		}
	});

    // Form Servers
	$('.form .row .servers .item label').click(function(){
        $('.form .row .servers .item label').removeClass('checked');

        if ($(this).find('input').prop('checked')) {
            $(this).addClass('checked');
        }
    });

    // Form Radio & Checkbox

});