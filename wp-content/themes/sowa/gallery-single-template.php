<?php
/*
* Template - Gallery post
* Version: 1.2
*/
get_header(); ?>

<!-- Treśc strony -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content gallery">
			<?php global $post, $wp_query;
			$args = array(
				'post_type'				=> 'gallery',
				'post_status'			=> 'publish',
				'name'					=> $wp_query->query_vars['name'],
				'posts_per_page'		=> 1
			);	
			$second_query = new WP_Query( $args ); 
			$gllr_options = get_option( 'gllr_options' );
			$gllr_download_link_title = addslashes( __( 'Download high resolution image', 'gallery' ) );
			if ( $second_query->have_posts() ) {
				while ( $second_query->have_posts() ) : $second_query->the_post(); ?>
					<h1 class="home_page_title entry-header"><?php the_title(); ?></h1>
                    <div class="row">
						<?php if ( ! post_password_required() ) { ?>
							<?php the_content(); 
							$posts = get_posts( array(
								"showposts"			=> -1,
								"what_to_show"		=> "posts",
								"post_status"		=> "inherit",
								"post_type"			=> "attachment",
								"orderby"			=> $gllr_options['order_by'],
								"order"				=> $gllr_options['order'],
								"post_mime_type"	=> "image/jpeg,image/gif,image/jpg,image/png",
								"post_parent"		=> $post->ID
							));
							if ( count( $posts ) > 0 ) {
								$count_image_block = 0; ?>
									<?php foreach ( $posts as $attachment ) { 
									$key = "gllr_image_text";
									$link_key = "gllr_link_url";
									$alt_tag_key = "gllr_image_alt_tag";
									$image_attributes = wp_get_attachment_image_src( $attachment->ID, 'photo-thumb' );
									$image_attributes_large = wp_get_attachment_image_src( $attachment->ID, 'large' );
									$image_attributes_full = wp_get_attachment_image_src( $attachment->ID, 'full' );
									if ( 1 == $gllr_options['border_images'] ) {
										$gllr_border = 'border-width: ' . $gllr_options['border_images_width'] . 'px; border-color:' . $gllr_options['border_images_color'] . '';
										$gllr_border_images = $gllr_options['border_images_width'] * 2;
									} else {
										$gllr_border = '';
										$gllr_border_images = 0;
									}
									?>
										<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 gallery-cell">
											<?php if ( ( $url_for_link = get_post_meta( $attachment->ID, $link_key, true ) ) != "" ) { ?>
												<a href="<?php echo $url_for_link; ?>" title="<?php echo get_post_meta( $attachment->ID, $key, true ); ?>" target="_blank">
													<img class="gallery-photo" alt="<?php echo get_post_meta( $attachment->ID, $alt_tag_key, true ); ?>" title="<?php echo get_post_meta( $attachment->ID, $key, true ); ?>" src="<?php echo $image_attributes[0]; ?>" />
												</a>
											<?php } else { ?>
											<a rel="gallery_fancybox<?php if ( 0 == $gllr_options['single_lightbox_for_multiple_galleries'] ) echo '_' . $post->ID; ?>" href="<?php echo $image_attributes_large[0]; ?>" title="<?php echo get_post_meta( $attachment->ID, $key, true ); ?>" >
												<img class="gallery-photo" alt="<?php echo get_post_meta( $attachment->ID, $alt_tag_key, true ); ?>" title="<?php echo get_post_meta( $attachment->ID, $key, true ); ?>" src="<?php echo $image_attributes[0]; ?>" />
											</a>
											<?php } ?>	
										</div>
										<?php  
										$count_image_block++; 
									}
									?>
							<?php } ?>
						</div>
						<?php } else { ?>
							<p><?php echo get_the_password_form(); ?></p>
						<?php }
					endwhile;
				if ( 1 == $gllr_options['return_link'] ) {
					if ( 'gallery_template_url' == $gllr_options["return_link_page"] ) {
						global $wpdb;
						$parent = $wpdb->get_var( "SELECT $wpdb->posts.ID FROM $wpdb->posts, $wpdb->postmeta WHERE meta_key = '_wp_page_template' AND meta_value = 'gallery-template.php' AND (post_status = 'publish' OR post_status = 'private') AND $wpdb->posts.ID = $wpdb->postmeta.post_id" );	?>
						<div class="return_link"><a href="<?php echo ( !empty( $parent ) ? get_permalink( $parent ) : '' ); ?>"><?php echo $gllr_options['return_link_text']; ?></a></div>
					<?php } else { ?>
						<div class="return_link"><a href="<?php echo $gllr_options["return_link_url"]; ?>"><?php echo $gllr_options['return_link_text']; ?></a></div>
					<?php }
				}	
			} else { ?>
				<div class="gallery_box_single">
					<p class="not_found"><?php _e( 'Sorry, nothing found.', 'gallery' ); ?></p>
			<?php } ?>				
				</div><!-- .gallery_box_single -->
			<div class="gllr_clear"></div>			
		</div><!-- #content -->
		<?php comments_template(); ?>
	</div><!-- #container -->
<?php get_sidebar(); ?>
	
<?php get_footer(); ?>