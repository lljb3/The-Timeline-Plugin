// Plugin Timeline Functions
jQuery(document).ready(function($){
	
	// Timeline Block
	var timelineBlocks = $('.jbss-timeline-block'),
		offset = 0.8;
	/* Hide tTimeline Blocks Outside Viewport */
	hideBlocks(timelineBlocks, offset);
	/* Show Timeline Blocks on Scrolling */
	$(window).on('scroll', function(){
		(!window.requestAnimationFrame) 
			? setTimeout(function(){ showBlocks(timelineBlocks, offset); }, 100)
			: window.requestAnimationFrame(function(){ showBlocks(timelineBlocks, offset); });
	});
	/* Timeline Block Functions */
	function hideBlocks(blocks, offset) {
		blocks.each(function(){
			($(this).offset().top > $(window).scrollTop()+$(window).height()*offset ) && $(this).find('.jbss-timeline-img, .jbss-timeline-content').addClass('is-hidden');
		});
	}
	function showBlocks(blocks, offset) {
		blocks.each(function(){
			($(this).offset().top <= $(window).scrollTop()+$(window).height()*offset && $(this).find('.jbss-timeline-img').hasClass('is-hidden') ) && $(this).find('.jbss-timeline-img, .jbss-timeline-content').removeClass('is-hidden').addClass('bounce-in');
		});
	}
	
	// Progress Bar
	var $progress = $('.progress');
	var progressOffset = $progress.offset().top;
	$(window).scroll(function() {
		var scrolling = $(this).scrollTop();
		$progress.height( scrolling - ( progressOffset / 1.45 ) );
		if( scrolling == progressOffset ) {
			$progress.hide();
		} else {
			$progress.show();
		}
	});
	/* Responsive Progress Height */
	$windowW = $(window).width();
	$(window).resize(function() {
		if($windowW <= 1600) {
			var $progress = $('.progress');
			var progressOffset = $progress.offset().top;
			$(window).scroll(function() {
				var scrolling = $(this).scrollTop();
				$progress.height( scrolling - ( progressOffset / 1.25 ) );
				if( scrolling == progressOffset ) {
					$progress.hide();
				} else {
					$progress.show();
				}
			});
		}
	});

	// Match Year Point to Title
	var $title = $('.jbss-timeline-title');	
	$title.each(function() {
		var $id = $(this).data('id'),
			$post = $('#post-'+$id);			
		$.each([$post], function() {
			if($($post).hasClass('exists')) {
				$(this).css({
					top: $('.jbss-timeline-title#post-'+$id).position().top + 'px',
				});
			}
		});
	});
	/* If No Post Thumbnail */
	if( $('.empty-image').length ) {
		$('.not-exist').css({
			top: '0px',
		});
	}
	/* Responsive Positioning */
	$windowW = $(window).width();
	$(window).resize(function() {
		if($windowW <= 1600) {
			var $title = $('.jbss-timeline-title');	
			$title.each(function() {
				var $id = $(this).data('id'),
					$post = $('#post-'+$id);			
				$.each([$post], function() {
					if($($post).hasClass('exists')) {
						$(this).css({
							top: $('.jbss-timeline-title#post-'+$id).position().top + 'px',
						});
					}
				});
			});
			/* If No Post Thumbnail */
			if( $('.empty-image').length ) {
				$('.not-exist').css({
					top: '0px',
				});
			}
		}
	});
		
});