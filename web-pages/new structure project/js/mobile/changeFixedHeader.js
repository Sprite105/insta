(function(){
	var header = document.getElementsByTagName('header')[0];
	var limitScroll = 100;

	function changeClassWhenScrolling (limitScroll, header) {
		var limit  = parseInt(limitScroll) || 0;

		return function() {
			var scrollYTop = self.pageYOffset || (document.documentElement && document.documentElement.scrollTop) || (document.body && document.body.scrollTop);
			if(scrollYTop  >= limitScroll) header.classList.add('header-scroll');
			else header.classList.remove('header-scroll');
		}

	}
	// проверить возможно страница уже прокручена
	changeClassWhenScrolling(limitScroll, header)();

	window.addEventListener('scroll', changeClassWhenScrolling(limitScroll, header))
})()
