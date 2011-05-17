
<?php get_header(); ?>

<div id="box_content">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			<?php /*<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?><?php the_title(); ?></a></h2> */?>
			<div id="meta">
				<?php 
					the_time('j F, Y'); echo " um "; the_time('H:i');
					edit_post_link('Edit', ' &nbsp;|&nbsp; ', '');
				?> 
			</div>
			<div class="entry">
				<?php the_content(); ?>
			</div>
			
			<?php the_tags(__('<div class="tags-post">Tags: ', 'tags'), ", ", "</div>");  ?>
			<?php comments_popup_link('', '1 Comment', '% Comments'); ?>
			<?php echo "<br>von: "; the_author(); echo "<br><br><hr>";?>		
		<?php endwhile; endif; ?>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
