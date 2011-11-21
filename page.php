<?php
/**
 * Diese PHP-Seite wird aufgefrufen wenn eine 
 * Seite/Page angezeigt werden soll.
 * 
*/
?>

<?php get_header(); ?>

<div id="box_content">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="entry">
				<?php if ( has_post_thumbnail()) : ?>
			   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			   <?php the_post_thumbnail(array(250,120), array("class" => "alignright post_thumbnail")); ?>
			   </a>
			<?php endif; ?>
				<?php the_content(); ?>
			</div>
		<?php endwhile; endif; ?>

		<?php

		?>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
