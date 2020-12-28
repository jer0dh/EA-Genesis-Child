jQuery(function($){

	// Mobile Menu
	$('.menu-toggle').click(function(){
		$('.search-toggle, .header-search').removeClass('active');
		$('.menu-toggle, .nav-menu').toggleClass('active');
	});
	$('.menu-item-has-children > .submenu-expand').click(function(e){
		$(this).toggleClass('expanded');
		e.preventDefault();
	});

	// Search toggle
	$('.search-toggle').click(function(){
		$('.menu-toggle, .nav-menu').removeClass('active');
		$('.search-toggle, .header-search').toggleClass('active');
		$('.site-header .search-field').focus();
	});

	// Team block Add Read More if height is greater than 500px
	$('.ea-team .wp-block-media-text__content').each(function (index, currentElement) {
		const $currentElement = $(currentElement);
		console.log($currentElement.height());
		if ( $currentElement.height() > 500 ) {
			console.log('element too high');
			shrinkElement($currentElement, 500);
			$currentElement.append('<a href="#" class="ea-read-more">Read More</a>');
		}

	});

	// Team block - look for Read More and add click to expand content.  After expanded, remove Read More
	$('.ea-team .wp-block-media-text__content .ea-read-more').on('click', function () {
		const $this = $(this);
		$this.parent().children().removeClass('screen-reader-text');
		$this.parent().find('.ea-read-more').remove();
		return false;

	})

	// Team block
	function shrinkElement($e, height) {
		console.log($e.children().last())
		
		$.each($e.children().get().reverse(), function () {
			if ($e.height() > height) {
				$this = $(this);
				$this.addClass('screen-reader-text');
			}
		});
	}


	
});
