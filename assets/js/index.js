$(document).ready(function() {

	var click = 0;
	$('.navbar-toggle').click(function() {
		click++;
		if (click == 1){
			$('body, html').css({
				position: 'relative',
				'left': '-50%'
			});
			$(this).css('left', '110%');
		}
		else if(click == 2){
			$('body, html').css({
				position: 'relative',
				'left': '0%'
			});
			$(this).css('left', '0%');
			click = 0;
		}			
	});

	$('.b1').click(function() {
		$('.center').css({
			opacity: '1',
			'z-index': '9999'
		});
		$('.overlay9').css({
			'z-index': '9998',
			'background': 'rgba(0,0,0, 0.8)'
		});
	});

	$('.fa-times, .overlay9').click(function() {
		$('.center').css({
			opacity: '0',
			'z-index': '-9999'
		});
		$('.overlay9').css({
			'z-index': '-9998',
			'background': 'rgba(0,0,0, 0)'
		});
	});

	
	$('.fa-minus').click(function() {
		var quantity = $(this).next().html();
		if (quantity > 1 ){
			quantity--;
			$(this).next().html(quantity);
			$('input.pqt').val(quantity);
		}
	});

	$('.fa-plus').click(function() {
		var quantity = $(this).prev().html();	
		if (quantity < 9 ){
			quantity++;
			$(this).prev().html(quantity);
			$('input.pqt').val(quantity);
		}
	});

});