function get_count() {
	$.post('ajax/', { action: 'get_count' }, function(response) {
		if($('#count').length > 0) $('#count').replaceWith(response);
		else ($('#nav a.fa-shopping-cart').html(response));
	});
	return false;
}

$(function() {
	$('#nav > ul').clone().appendTo('#mobile-nav');

	$.slidebars();

	$('.img, #slider li').imagefill();

	$('#alert, #confirm, #add').easyModal();

	$('.close').on('click', function() {
		$('.modal').trigger('closeModal');
	});


	$('#slider li').height($(window).height() - $('#header').height());

	var speed_ = $("#speed_slider_backend").val()
	var effect_ = $("#effect_slider_backend").val()
	var effect_t_ = $("#effect_t_slider_backend").val()
	var auto_ = $("#auto_slider_backend").val()

	auto_ = (auto_ == "false") ? false : true


	$('#slider > ul').bxSlider({
		adaptiveHeight: true,
		controls: true,
		mode: effect_,
		onSlideBefore: function() {
			$('#slider li').imagefill();
		},
		onSlideAfter: function() {
			$('#slider li .caption').removeClass('animated ' + effect_t_);
			$('#slider li:visible .caption').addClass('animated ' + effect_t_);
		},
		onSliderLoad: function() {
			$('#slider li .caption').removeClass('animated ' + effect_t_);
			$('#slider li:visible .caption').addClass('animated ' + effect_t_);
		},
		auto: auto_,
		speed: 1000,
		pause: speed_
	});

	$('#nosotros .slider ul').bxSlider({
		adaptiveHeight: true,
		controls: false,
		mode: 'fade',
		auto: true,
		speed: 1000,
		pause: 8000
	});

	if($('#post .slider > ul > li').length > 1) {
		$('#post .slider > ul').bxSlider({
			adaptiveHeight: true,
			pagerCustom: '.slider-pager',
			controls: false,
			mode: 'fade',
			auto: true,
			prevText: '',
			nextText: '',
			speed: 1000,
			pause: 8000,
			autoHover: true,
			onSlideAfter: function() {
				$('.slider img').elevateZoom({
				    zoomType: 'inner',
					cursor: 'crosshair',
					zoomWindowFadeIn: 500,
					zoomWindowFadeOut: 750
				});
				$('.zoomContainer').remove();
				$('.slider img').removeData('elevateZoom');
				$('.slider img').removeData('zoomImage');
			},
			onSliderLoad: function() {
				$('.slider img').elevateZoom({
				    zoomType: 'inner',
					cursor: 'crosshair',
					zoomWindowFadeIn: 500,
					zoomWindowFadeOut: 750
				});
				$('.zoomContainer').remove();
				$('.slider img').removeData('elevateZoom');
				$('.slider img').removeData('zoomImage');
			}
		});

		$('#post .bx-prev').addClass('fa fa-angle-left');
		$('#post .bx-next').addClass('fa fa-angle-right');
	} else {
		$('#post .slider img').elevateZoom({
		    zoomType: 'inner',
			cursor: 'crosshair',
			zoomWindowFadeIn: 500,
			zoomWindowFadeOut: 750
		});
	}

	$('.main-menu').on('click', function() {
		var subMenu = $(this).siblings('.sub-menu');
		if(!subMenu.is(':visible')) {
			if(!$(this).parents('.sub-menu').length > 0) {
				$('#nav .sub-menu').slideUp(100);
				$('#nav .main-menu').removeClass('active');
			}
			subMenu.slideDown(250);
			$(this).addClass('active');
		} else {
			subMenu.slideUp(100);
			$(this).removeClass('active');
		}
		return false;
	});

	$('#categorias .slider > ul').bxSlider({
		slideWidth: 120,
		minSlides: 2,
		maxSlides: 16,
		ticker: true,
		tickerHover: true,
		speed: 24000,
		useCSS: false
	});

	$('[type="submit"]').on('click', function () {
	    $(this).closest('form').find('[required]').addClass('required');
	});

	$('.add').on('click', function() {
		$.post('ajax/', { action: 'add', cantidad: $('#cantidad').val(), id: $(this).attr('data-id'), size: $(this).attr('data-size') }, function(response) {
			if(response == 'null') {
				window.location.href = 'login/';
			} else {
				$('#alert').trigger('openModal');
				window.location.href = 'carrito/';
			}
		});
		get_count();
		return false;
	});

	$('.calendar-add').on('click', function() {
		$('#fecha').val($(this).parents('li').attr('data-fecha'));
		$('#add').trigger('openModal');
		return false;
	});

	$('.calendar-remove').on('click', function() {
		$.post('ajax/', { action: 'calendarRemove', id: $(this).attr('data-id') }, function(response) {
			window.location.reload();
		});
		return false;
	});

	$('#add').on('submit', function() {
		$.post('ajax/', { action: 'calendarAdd', fecha: $('#fecha').val(), nombre: $('#nombre').val() }, function(response) {
			window.location.reload();
		});
		return false;
	});

	$('.carrito').on('change', '.cantidad', function() {
		$.post('ajax/', { action: 'actualizar', cantidad: $(this).val(), id: $(this).attr('data-id'), size: $(this).attr('data-size') }, function(response) {
			if(response) {
				$('.carrito').html(response);
				get_count();
			}
		});
		return false;
	});

	$('.carrito').on('click', '.remove', function() {
		$.post('ajax/', { action: 'remove', id: $(this).attr('data-id'), size: $(this).attr('data-size') }, function(response) {
			if(response) {
				$('.carrito').html(response);
				get_count();
			}
		});
		return false;
	});

	$('.fa-angle-down').on('click', function() {
		$('html, body').animate({
			scrollTop: $('#categorias').offset().top - $('#header').height() - 40
		});
		return false;
	});

	$('.selector a').on('click', function() {
		$('.selector a').removeClass('active');
		$(this).addClass('active');
		$('.add').attr('data-size', $(this).attr('data-size'));
		$('.precio').html($(this).attr('data-price'));
		var precio = $(this).attr('data-price').replace(/\D+/g, '');
		if(precio >= 240000) {
			$('.shopping-cart').show();
		} else {
			$('.shopping-cart').hide();
		}
		return false;
	});

	$.datepicker.setDefaults($.datepicker.regional['es']);
	$('.fecha').datepicker({
		dateFormat: 'dd-mm-yy'
	});

	$(window).load(function() {
		$('#categoria .grid').fadeIn(250);
	});

	$.get('inc/rss.php');
});
