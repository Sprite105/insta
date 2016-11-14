$(document).ready(function(argument) {

	$(document).ready(
		function() {
			$(".photos").niceScroll({
				railoffset:{ top: -150},
				cursoropacitymin: 1,
				cursorcolor : '#b8b8b8',
				cursorborder: 'none',
				cursorfixedheight: 240,
				cursorwidth: 4,
			});
		});

	$('.photos > figure').click(function(argument) {
		let checkbox = $(this).find('input');
		let image = $(this).find('img');
		let checked = checkbox.prop('checked');
		let selectState = $(this).find('.selected-ico, figcaption');
		if (!checked) {
			checkbox.prop('checked', true);
			image.addClass('image-checked');
			selectState.removeClass('hidden');
			selectState.addClass('active');
		} else {
			checkbox.prop('checked', false);
			selectState.removeClass('active');
			image.removeClass('image-checked');
			selectState.addClass('hidden');
		}
		displayPrice();
	});

	$('span.left').click(function(argument) {
		changeCount(this, -50);
		displayPrice()
		return false;
	});

	$('span.right').click(function(argument) {
		changeCount(this, 50);
		displayPrice();
		return false;
	});

	function changeCount(self, val) {
		let count = $(self).parent().find('.count');
		let number = parseInt(count.text());

		if (number > 0 || val > 0) {
			number = number + val;
		}
		count.text(number);
	}

	function displayPrice() {
		let figure = $('.photos > figure');
		let details = $('.details');
		let totalPrice = $('.order .all-price .digit');
		let countPrice = 0;
		let result = '';
		let count = 0;

		figure.each(function(undefined, cur) {
			if ($(cur).find('input').prop('checked')) {
				let price = parseInt($(cur).find('.count').text()) *
					parseInt($(cur).find('.price').text()) / 100;
				countPrice += price;
				count++;
				result += '<div class="photo">' +
					'<span class="name">Фото ' + count + ': </span>' +
					'<span class="count">' + $(cur).find('.count').text() + '</span>' +
					'<span class="all-price"> - ' + price.toFixed(2) + 'usd</span>' +
					'</div>';
				totalPrice.text(countPrice.toFixed(2));
			}
		})

		details.html(result);
	}
})
