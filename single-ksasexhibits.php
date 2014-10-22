<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="twelve columns radius-left offset-topgutter">	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="content">
			<h3><?php the_title(); ?></h3>

			<div class="twelve columns">
											<div id="featured" class="exhibit-slide">

<?php
	$args = array( 'post_type' => 'attachment', 'orderby' => 'menu_order', 'order' => 'ASC', 'post_mime_type' => 'image' ,'post_status' => null, 'numberposts' => null, 'post_parent' => $post->ID );

	$attachments = get_posts($args);
	if ($attachments) {
		foreach ( $attachments as $attachment ) {
  $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	$image_title = $attachment->post_title;
	$caption = $attachment->post_excerpt;
	$description = $image->post_content;
?>

<img src="<?php echo wp_get_attachment_url($attachment->ID); ?>" alt="<?php echo $alt; ?>">
 <?php } } ?>



						</div>	
</div>
<div class="twelve columns">
	<div class="exhibit-body">
							<?php if (get_post_meta($post->ID, 'ecpt_location', true)) : ?>
										<p><strong>Location:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_location', true); ?></p>
									<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_dates', true)) : ?>
										<p><strong>Dates:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_dates', true); ?></p>
									<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_description_full', true)) : ?>
										<p><strong>Description:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_description_full', true); ?></p>
									<?php endif; ?>
						</div>
						</div>
		</section>
		<?php endwhile; endif; ?>
	</div>	<!-- End main content (left) section -->
</div> <!-- End #page -->

<?php get_footer(); ?>