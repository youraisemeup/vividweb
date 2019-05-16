$(document).ready(function(){
	function needHeight() {
		const height = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
		document.getElementsByClassName('need_height')[0].style['height'] = height + 'px';

		var footheight = $('.jsFooterBottom').innerHeight();
		$('#pagewrap').css('padding-bottom', footheight);
	}
	needHeight();

	$(window).on('load resize', function () {
		needHeight();
	});
});

