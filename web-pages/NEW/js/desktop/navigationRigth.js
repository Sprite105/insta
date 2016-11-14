(function() {
	// правый блок которий нужно сделять фиксированим
	var setFixedElement = document.getElementsByClassName('aside-content')[0];
	// количество пикселей прокрутки когда нужно сделать правий блок фиксирований
	var upperLimit = document.getElementsByClassName('banner')[0].clientHeight;
	// на сколько сверху отступить( высота fixed header)
	var top = '110px';
	// определить на где остановить блок
	var bottom = document.getElementsByTagName('footer')[0].clientHeight + 100;
	// ссылки которым нужно менять стили
	var links = setFixedElement.querySelectorAll('a');
	// якоря при переходу к которым нужно менять стили
	var anchors = document.getElementsByClassName('anchor');


	function changeClassLink(links, anchors) {
		var activeNow = 0;
		checkAndChange();


		function checkAndChange() {
			var scrollYTop = self.pageYOffset || (document.documentElement && document.documentElement.scrollTop) || (document.body && document.body.scrollTop);

			for (let i = 0; i < links.length; i++) {
				var d = anchors[i].getBoundingClientRect().top;
				if (scrollYTop >= anchors[i].getBoundingClientRect().top + scrollYTop - 150) {
					links[activeNow].classList.remove('active');
					links[i].classList.add('active');
					activeNow = i;
				} else break;
			}
		}

		return checkAndChange;
	}

	
	// повестить обработчик на собитие прокрутки
	window.addEventListener('scroll', setFixedPanel({
		topLimit: upperLimit,
		bottomLimit: bottom,
		marginTop: top,
		element: setFixedElement,
		bottom: bottom
	}));
	window.addEventListener('scroll', changeClassLink(links, anchors));
})()
