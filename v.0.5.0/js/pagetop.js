$(document).ready(function() {
	var pagetop = $('.pagetop');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 700) {
			pagetop.addClass('show');
		} else {
			pagetop.removeClass('show');
		}
	});
	pagetop.click(function () {
		$('body, html').animate({ scrollTop: 0 }, 500);
		return false;
	});
});