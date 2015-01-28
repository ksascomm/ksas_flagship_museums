<?php
/*
Template Name: Exhibitions & Programs
*/
?>
<?php get_header();
	//Set Exhibitions & Programs Query Parameters
				$flagship_exhibitions_query = new WP_Query(array(
					'post_type' => 'ksasexhibits',
					'orderby' => 'date',
					'order' => 'DESC',
					'posts_per_page' => '-1'
					));
					 ?>

<div class="row wrapper radius10">
	<div class="twelve columns">
		<section class="row">
			
			<div class="seven columns copy">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h2><?php the_title();?></h2>
				<p><?php the_content(); ?></p>
			<?php endwhile; endif; ?>
			</div>

			<div class="five columns" id="fields_search" role="search">
				<form action="#">
					<fieldset class="radius10"> 
						<?php $exhibits = get_terms('exhibition_type', array(
							'orderby' 		=> 'ID',
							'order'			=> 'ASC',
							'hide_empty'	=> true,
							));
						
						$count_exhibits = count($exhibits);
						if ($count_exhibits > 0) { ?>
						<div class="row">
							<h6>Filter by Exhibit Type:</h6>
						</div>
						
						<div class="row filter option-set" data-filter-group="exhibition_type">
							<div class="button radio"><a href="#" data-filter="" class="selected">View All</a></div>
							<?php foreach ( $exhibits as $exhibit ) { ?>
								<div class="button radio"><a href="#" data-filter=".<?php echo $exhibit->slug; ?>"><?php echo $exhibit->name; ?></a></div>
							<?php } ?>
						</div>
					<?php } ?>
					<div class="row">
						<h5>Search by keyword:</h5>		
						<input type="submit" class="icon-search" placeholder="Search by name/keyword" value="&#xe004;" />
						<input type="text" name="search" value="" id="id_search" aria-label="Search"  /> 
					</div>
					</fieldset>
				</form>
			</div>
		</section>

		<section class="row" id="fields_container" role="main">
			<?php while ($flagship_exhibitions_query->have_posts()) : $flagship_exhibitions_query->the_post(); 
		//Pull discipline array (humanities, natural, social)
		$program_types = get_the_terms( $post->ID, 'exhibition_type' );
			if ( $program_types && ! is_wp_error( $program_types ) ) : 
				$program_type_names = array();
				$degree_types = array();
					foreach ( $program_types as $program_type ) {
						$program_type_names[] = $program_type->slug;
						$exhibition_types[] = $program_type->name;
					}
				$program_type_name = join( " ", $program_type_names );
				$exhibition_type = join( ", ", $exhibition_types );

			endif; ?>
		
		<!-- Set classes for isotype.js filter buttons -->
		<div class="four columns mobile-four mobile-field  <?php echo $program_type_name . ' ' . $school_name; ?>">
			
			<div class="twelve columns field radius10" id="<?php echo $program_name; ?>">
			<a href="<?php echo get_permalink() ?>" title="<?php the_title(); ?>" class="field">
					<?php if ( has_post_thumbnail()) { ?> 
						<?php the_post_thumbnail('exhibits'); ?>
					<?php } ?>			    
					<h4 class="white"><?php the_title(); ?></h4>
				</a>

				<div class="row">
					<div class="twelve columns fields ">
						<p>
							<?php if (get_post_meta($post->ID, 'ecpt_location', true)) : ?>
										<strong><?php echo get_post_meta($post->ID, 'ecpt_location', true); ?></strong><br>
									<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_dates', true)) : ?>
										<strong><?php echo get_post_meta($post->ID, 'ecpt_dates', true); ?></strong><br>
									<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_description_short', true)) : ?>
										<?php echo get_post_meta($post->ID, 'ecpt_description_short', true); ?><br>
									<?php endif; ?>
						</p>


					</div>
				</div>
			</div>
		</a>
	</div>
	<?php endwhile; ?>

	<div class="row" id="noresults">
			<div class="four columns centered">
				<h3> No matching results</h3>
			</div>
	</div>
		</section>
		
	</div>
</div>
 <!-- End content wrapper -->
	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/page.exhibits.js"></script> 	<?php get_footer(); ?>