<?php
/*
Template Name: Exhibits
*/
?>	
<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="twelve columns">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<section class="content">
				<h2><?php the_title();?></h2>

<?php 

$args = array (
'post_type' => 'exhibits',
'posts_per_page' => 3,
'orderby' => 'rand'
	);
$exhibits = new WP_Query( $args );
echo '<div id="exhibits">';
while ($exhibits->have_posts() ) : $exhibits->the_post();
echo '<div class="exhibit">';
echo '<h3>' . get_the_title() . '</h3>';
echo '<p><strong>' . get_cfc_meta() . '</p></strong>';
echo '<p>';
the_content();
echo '</p>';
echo '</div>';
endwhile;
echo '</div>';
wp_reset_query();

?>

		</section>
	</div>
</div> 
<?php get_footer(); ?>