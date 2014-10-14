<?php
/*
Template Name: Programs
*/
?>	
<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="twelve columns">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<section class="content">
				<h2><?php the_title();?></h2>


<?php 

$args = array( 'post_type' => 'programs', 'posts_per_page' => 10);
$programs = new WP_Query( $args );
while ( $programs->have_posts() ) : $programs->the_post();
	echo '<h3>';
	the_title();
	echo '</h3>';
	echo '<div class="entry-content">';
	the_content();
	echo '</div>';
endwhile;

?>


<ul class="accordion">
<?php 
$title = get_cfc_meta( 'ksasexhibits' );
if( !empty( $title ) ){
    foreach( $title as $exhibit ){
    	echo '<li><div class="title">';
    	echo '<h4>' . $exhibit ['exhibit-title'] . '</h4></div><div class="content">';
        echo '<p><strong>Location: </strong>' . $exhibit ['exhibit-location'] . '</p>';
        echo '<p><strong>Date: </strong>' . $exhibit ['exhibit-date'] . '</p>';
        echo '<p><strong>Description: </strong>' . $exhibit ['exhibit-description'] . '</p></div></li>';
    }
}
?> 
</ul>
		</section>
	</div>
</div> 
<?php get_footer(); ?>