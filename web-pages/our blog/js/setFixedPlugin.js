// Created  Bohdan Romanchuk
// Функция пронимает аргументом обьект который должен содеражать опции, такие как 
// styleElement - елемент который должен фиксироваться
// topLimit - количество пикселей при котором должен фиксироваться елемент
// bottomLimit - количество пикселей снизу где елемент должен остановиться
// marginTop - количество пикселей сверху 
// от области просмотра которое будет когда елемент станет фиксированым


// Должен подключаться до собственных скриптов

// обработчик скрола который будет делать правую панель фиксированую
function setFixedPanel(options) {
	var styleElement = options.element.style,
		topLimit = parseInt(options.topLimit),
		bottomLimit = parseInt(options.bottomLimit),
		marginTop = parseInt(options.marginTop),
		bottom = options.bottom || 0;
	
	changeStyle();

    function changeStyle () {
		// на малых екранах статичний
		if(document.documentElement.clientWidth < 880) {
			styleElement.position = 'static';
			return;
		}
		// получить значение на сколько прокручена страница
		var scrollYTop = getScroll();
		// если прокрутка больше чем допустимо то сделать блок фиксированым
		// иначе сделать статичным
		if (scrollYTop >= topLimit) {
			styleElement.position = 'fixed';
			styleElement.top = marginTop +'px';
			styleElement.bottom = 'inherit';

			if (scrollYTop + options.element.clientHeight + 
				bottomLimit + marginTop >= document.body.clientHeight) {
				styleElement.top = 'inherit';
				styleElement.bottom = bottom +'px';
				styleElement.position = 'absolute';
			}
		} else {
			styleElement.top = 0;
			styleElement.position = 'relative';
		}
	}

	function getScroll() {
		return window.pageYOffset
				|| (document.documentElement && document.documentElement.scrollTop)
				|| (document.body && document.body.scrollTop);
	}

	return changeStyle;
}
