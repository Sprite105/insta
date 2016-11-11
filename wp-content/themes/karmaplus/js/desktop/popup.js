(function(){
	var popup = document.getElementsByClassName('popup')[0];
	var closeButtons = document.getElementsByClassName('close');
	handlerClick(popup, closeButtons);



	function handlerClick(popup, closeButtons) {
		if ( closeButtons.length == 0) {
			document.body.addEventListener('click', function() {
				popup.classList.add('hide');
			})
			// TODO: времменное решение
			//чтобы закрить окно можно было клик за границами конента попапа(popup > .content)
			popup.children[0].addEventListener('click', function(e){
				e.stopPropagation();
			})
			return;
		}

		for (var i = 0; i < closeButtons.length; i++) {
			closeButtons[i].addEventListener('click', function() {
				popup.classList.add('hide');
			})
		}
	}
})()
