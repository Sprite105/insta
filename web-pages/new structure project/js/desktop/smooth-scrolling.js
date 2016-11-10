$(document).ready(function() {
	var topOffset = $('.banner header').outerHeight() || 0;

   $(".fixed-menu a, .button-go-up").click(function() {
      $("html, body").animate({
         scrollTop: $($(this).attr("href")).offset().top - topOffset + "px"
      }, {
         duration: 500,
         easing: "swing"
      });
      return false;
   });
});
