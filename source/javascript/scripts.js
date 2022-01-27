$('.hamburger-toggle').on('click', function(){
  $(this).toggleClass('open');
  $('.mobile-menu').toggleClass('hidden').toggleClass('z-10');
  $('.modal-bg').toggleClass('hidden').toggleClass('z-2');
  $('body').toggleClass('overflow-hidden');
});

$(window).scroll(function(){
  var h_scroll = $(this).scrollTop();
  if (h_scroll > 70) {
    $('.header').addClass('header-fixed');
  } else {
    $('.header').removeClass('header-fixed');
  }
})

if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  document.documentElement.classList.add('dark')
} else {
  document.documentElement.classList.remove('dark')
}

$('.js-toggle-light').on('click', function(){
  dataLight = $(this).data('light');
  if (dataLight === 'on') {
    document.documentElement.classList.add('dark');
    localStorage.theme = 'dark';
    
  } else {
    document.documentElement.classList.remove('dark');
    localStorage.theme = 'light';
  }
  console.log(dataLight);
});