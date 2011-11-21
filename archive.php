<?php
/**
 * Diese PHP-Seite wird aufgefrufen wenn ein 
 * Archiv angezeigt werden soll.
 * 
*/

get_header(); ?>

<div id="box_content">

	<?php get_search_form(); ?>

	<h2>Soriert nach Monaten</h2>
	<ul>
		<?php 
			$args = array(
			    'type'            => 'monthly',
			    'limit'           => '20',
			    'format'          => 'html', 
			    'before'          => '',
			    'after'           => '',
			    'show_post_count' => false,
			    'echo'            => 1
			);
			wp_get_archives( $args );
		?>

	</ul>

	<?php if (have_posts()) : while (have_posts()) : 
		echo "<br />";
		the_post(); 
	?>
		<a href="<?php the_permalink() ?>"><?php the_time('j F');echo " - "; the_title(); ?></a><br />
	<?php endwhile; endif; ?>
</div>

<?php 

get_sidebar();

get_footer(); 

?>
