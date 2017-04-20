<?php
	// Template Files
	function timeline_template( $template_path ) {
		if ( get_post_type() == 'timeline' ) {
			if ( is_single() ) {
				// Serve Template Files
				if ( $theme_file = locate_template( array ( 'single-entry.php' ) ) ) {
					$template_path = $theme_file;
				} else {
					$template_path = plugin_dir_path( __FILE__ ) . '../templates/single-entry.php';
				}
			}
			elseif ( is_archive() ) {
				if ( $theme_file = locate_template( array ( 'archive-entry.php' ) ) ) {
					$template_path = $theme_file;
				} else { $template_path = plugin_dir_path( __FILE__ ) . '../templates/archive-entry.php';
	 
				}
			}
		}
		return $template_path;
	}
	add_filter( 'template_include', 'timeline_template', 1 );
	
	// Shortcode Declaration
	function timeline_shortcode() {
		// Declare Start of Shortcode
		ob_start();
		
		// Building the Timeline Shortcode
		?>
            <div id="jbss-timeline" class="jbss-timeline-container">
            	<div class="top-point"></div>
                <div class="timeline-block-container">
					<?php 
						$args = array( 
							'post_type' => 'timeline', 
							'order' => 'ASC',
							'posts_per_page' => '20',
						); 
						$query = new WP_Query( $args ); 
					?>
                    <?php if( $query->have_posts() ) : while( $query->have_posts() ) : ?>
                        <?php $query->the_post(); ?>
                            <div class="jbss-timeline-block">
								<?php if( has_post_thumbnail() ) : ?>
									<div class="jbss-timeline-img exists" id="<?php echo 'post-'; echo the_ID(); ?>" data-id="<?php echo the_ID(); ?>"><div class="point"></div></div>
									<div class="jbss-timeline-content">
										<div class="jbss-image has-image"><?php the_post_thumbnail( 'full' ); ?></div>
										<h2 class="jbss-timeline-title" id="<?php echo 'post-'; echo the_ID(); ?>" data-id="<?php echo the_ID(); ?>"><?php the_title(); ?></h2>
										<div class="jbss-timeline-inner-content"><?php the_content(); ?></div>
									</div>
								<?php else : ?>
									<div class="jbss-timeline-img not-exist"><div class="point"></div></div>
									<div class="jbss-timeline-content">
										<div class="jbss-image empty-image"></div>
										<h2 class="jbss-timeline-title <?php echo 'post-'; echo the_ID(); ?>" data-id="<?php echo the_ID(); ?>"><?php the_title(); ?></h2>
										<div class="jbss-timeline-inner-content"><?php the_content(); ?></div>
									</div>
								<?php endif; ?>
                            </div>
                        <?php wp_reset_postdata(); ?>
                    <?php endwhile; endif; ?>
                </div>
                <div class="progress"></div>
				<div class="bottom-point"></div>
            </div>
        <?php
		
		// Load Shortcode Scripts
		$script_path = plugin_dir_url( __FILE__ ).'../lib/';
		wp_enqueue_script( 'plugin-js', $script_path . 'js/timeline-template.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'modernizr-js', $script_path . 'js/modernizr.js', array( 'jquery' ), '2.7.1', true );
		wp_enqueue_style( 'plugin-css', $script_path . 'css/timeline.css', array(), '1.0.0' );
		
		// Finish Shortcode
		return ob_get_clean();
	}
	add_shortcode( 'jbss_timeline', 'timeline_shortcode' );