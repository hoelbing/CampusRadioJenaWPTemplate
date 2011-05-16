<body>
<div id="wrapper">
<div id="box_header">
<?php get_header(); ?>
</div>
<div id="box_sidebar">
<?php get_sidebar(); ?>
</div>
<div id="box_content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			<div id="meta">
				<p>erstellt am: <?php the_date('d.m.Y'); ?> |
				von: <?php the_author(); ?> |
				Kategorie(n): <?php the_category(', '); ?></p>
			</div>
			<div class="entry">
				<?php the_content(); ?>
			</div>
		<?php endwhile; endif; ?>
</div>
<div id="footer">
<?php get_footer(); ?>
</div>
</div>
</body>