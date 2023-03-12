const burger = document.getElementById('burger');
const ul = document.querySelector('.burger-ul');
const button = document.querySelector('.burger-btn');

burger.addEventListener('click', () => {
	burger.classList.toggle('show-x');
	ul.classList.toggle('show');
})

button.addEventListener('click', () => {
	button.classList.toggle('active');
})
$(document).mouseup( function(e){ // событие клика по веб-документу
  let nav = $( "header" ); // тут указываем ID элемента
  if (burger.classList.contains('show-x')
      && ul.classList.contains('show')){
    if ( !nav.is(e.target) // если клик был не по нашему блоку
        && nav.has(e.target).length === 0 ) { // и не по его дочерним элементам
          burger.classList.toggle('show-x');
          ul.classList.toggle('show');
          button.classList.toggle('active');
    }
  }
});

$(window).scroll(function() {
	var scrolled = $(window).scrollTop();
  if (burger.classList.contains('show-x')
  && ul.classList.contains('show')){
    if ( scrolled > 100) {
      burger.classList.toggle('show-x');
      ul.classList.toggle('show');
      button.classList.toggle('active');
    }
  }
	
});