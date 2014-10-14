<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="twelve columns radius-left offset-topgutter">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="content news">
			<h6><?php the_date(); ?>
			<h5><?php the_title(); ?></h5>
			<?php foreach( get_cfc_meta( 'ksasexhibits' ) as $key => $value ){ ?>
    <div class="<?php echo $key ?>">
       <p><strong>Location:</strong> <?php the_cfc_field( 'title','location', $key ); ?></p>
       <p><strong>Date(s):</strong> <?php the_cfc_field( 'title','date', $key ); ?></p>
       <p><strong>Description:</strong> <?php the_cfc_field( 'title','exhibit-description', $key ); ?></p>
    </div>
<?php }  ?>
		</section>
		<?php endwhile; endif; ?>
	</div>	<!-- End main content (left) section -->
</div> <!-- End #page -->
<?php get_footer(); ?>