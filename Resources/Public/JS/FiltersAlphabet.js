/* Author: Aline Deicke */

/* Navigation register */

$(document).ready(function() {

	$('.csc-firstHeader').after('<ul class="pagination"></ul>');
	$('#maincontent div').each(function(index) {
		var $text = $(this).attr('id');
		$('.pagination').append('<li class="button"><a href="' + $text + '">' + $text + '</a></li>');
	});
//	$('.pagination').append('<li class="button act"><a href="#">Komplette Liste</a></li>');

	$('.pagination li').click(function(event) {
		event.preventDefault();

		var $target = $(event.target);
		var $letter = $(this).children('a').text();

		$('.pagination li[class*="act"]').removeClass('act');
		$('#maincontent div:visible').fadeOut('slow', function() {
			$('#maincontent div[id="' + $letter + '"]').fadeIn('slow');
			$($target).parent('li').addClass('act');
		});
	});	

	$('.pagination li:last-child').click(function() {
		$('#maincontent div').stop().fadeIn('slow');
		$($target).parent('li').addClass('act');	
	});
});