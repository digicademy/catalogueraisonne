/* Author: Aline Deicke */

/* Werkverzeichnis */

$(document).ready(function() {

		// hide/show work tabs

	$('#maincontent > div').not('#general').not('.box').hide();
	$('#work_nav a[href*="general"]').parent('li').addClass('button').attr('id', 'current');

	$('#work_nav li').hover(function() {
		$(this).addClass('button');
	}, function() {
		$('#work_nav li:not(#current)').removeAttr('class');
	});

	$('#work_nav li').click(function(event) {
		event.preventDefault();
		var $id = $(this).children('a').attr('class');

		$('#work_nav li').removeAttr('class').removeAttr('id');
		$('.' + $id).parent('li').addClass('button').attr('id', 'current');

		$('#maincontent > div').fadeOut('slow').queue(function(next) {
			next($('#' + $id).fadeIn('slow'));
		});
	});

		// hide/show parts and sources
	
	$('.alibox').each(function(index) {
		$(this).attr('id', 'a' + index);
		$(this).children('.aliboxheader').append('<a href="#a'+ index +'" class="aliboxlink plus" title="Ausklappen">Ausklappen</a><a href="#a'+ index +'" class="aliboxlink minus" title="Einklappen">Einklappen</a>');
	});

	$('.alibox *').not('.alibox .aliboxheader').not('.aliboxheader *').hide();

	$('.alibox .aliboxlink').click(function(event) {
		event.preventDefault();

		var $id = $(this).attr('href');
		var $class = $(this).attr('class');

		if ($class == 'aliboxlink minus') {
			$($id + ' *').not($id + ' .aliboxheader').not($id + ' .aliboxheader *').fadeOut('slow');
		} else {
			$($id + ' *').fadeIn('slow');
		}
	});

	$('#parts h2').after('<p id="plusminusall"><a href="#" class="plusall">Alle ausklappen</a><a href="#" class="minusall">Alle einklappen</a></p>');
	$('#sources h2').after('<p id="plusminusall"><a href="#" class="plusall">Alle ausklappen</a><a href="#" class="minusall">Alle einklappen</a></p>');
	
	$('#plusminusall a').click(function(event) {
		event.preventDefault();

		var $class = $(this).attr('class');

		if ($class == 'minusall') {
			$('.alibox *').not('.alibox .aliboxheader').not('.alibox .aliboxheader *').fadeOut('slow');
		} else {
			$('.alibox *').fadeIn('slow');
		}
	});

});