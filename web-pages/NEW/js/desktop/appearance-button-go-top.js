(function () {
	var buttonGoUp = document.getElementsByClassName('button-go-up')[0];
	var limitScroll = 200;

	function changeClassWhenScrolling (limitScroll, buttonGoUp) {
		var limit  = parseInt(limitScroll) || 0;

		return function() {
			var scrollYTop = self.pageYOffset || (document.documentElement && document.documentElement.scrollTop) || (document.body && document.body.scrollTop);
			if(scrollYTop  >= limitScroll) buttonGoUp.classList.add('active');
			else buttonGoUp.classList.remove('active');
		}

	}
	// проверить возможно страница уже прокручена
	changeClassWhenScrolling(limitScroll, buttonGoUp)();

	window.addEventListener('scroll', changeClassWhenScrolling(limitScroll, buttonGoUp))
})()
