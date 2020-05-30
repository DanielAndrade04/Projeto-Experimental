(function($) {
  "use strict"; 

  // Rolagem suave usando jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 56)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Fecha o menu sandwich quando o link da seção é acionado
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Ativa o scrollspy para adicionar classe aos itens do menu
  $('body').scrollspy({
    target: '#mainNav',
    offset: 56
  });

})(jQuery);
