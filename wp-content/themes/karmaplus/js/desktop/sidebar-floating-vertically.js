(function() {
	// правый блок которий нужно сделять фиксированим
	var setFixedElement = document.getElementsByClassName('aside-content')[0];
	// количество пикселей прокрутки когда нужно сделать правий блок фиксирований
	var upperLimit = document.getElementsByClassName('top-panel')[0].clientHeight;
	// на сколько сверху отступить( высота fixed header)
	var top = document.getElementsByTagName('header')[0].clientHeight;
	// определить на где остановить блок
	var containerArticles = document.getElementsByClassName('container-articles')[0];
	var styleContainerArticles = window.getComputedStyle(containerArticles);
	var bottom = document.getElementsByTagName('footer')[0].clientHeight + 
	 			parseInt(window.getComputedStyle(containerArticles).marginBottom);
	
	// повестить обработчик на собитие прокрутки
	window.addEventListener('scroll', setFixedPanel({
		// для плавности нужно учитовать paading контейнра
		topLimit: upperLimit - parseInt(styleContainerArticles.paddingTop), 
		bottomLimit: bottom,
		marginTop: top,
		element: setFixedElement
	}));
})()
