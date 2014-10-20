<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="twelve columns radius-left offset-topgutter">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="content">
			<h5><?php the_title(); ?></h5>

			<div class="seven columns">
						<?php if ( has_post_thumbnail()) { ?> 
						<?php the_post_thumbnail('full'); ?>
					<?php } ?>	
</div>
<div class="five columns">
	<p>
							<?php if (get_post_meta($post->ID, 'ecpt_location', true)) : ?>
										<b>Location:</b>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_location', true); ?><br>
									<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_dates', true)) : ?>
										<b>Dates:</b>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_dates', true); ?><br>
									<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_description', true)) : ?>
										<b>Description:</b>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_description', true); ?><br>
									<?php endif; ?>
						</p>
						</div>
		</section>
		<?php endwhile; endif; ?>
	</div>	<!-- End main content (left) section -->
</div> <!-- End #page -->
<?php get_footer(); ?>