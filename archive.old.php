<?php
/**
 * Diese PHP-Seite wird aufgefrufen wenn ein 
 * Archiv angezeigt werden soll.
 * 
Template Name: Archiv
*/

get_header(); ?>
<div id="box_content">
	<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

	<?php /* wenn Kategorien-Archiv */ if (is_category()) { ?>Archiv der Kategorie <?php single_cat_title(); ?>
	<?php /* wenn Tages-Archiv */ } elseif (is_day()) { ?> Tagesarchiv für den <?php the_time('j. F Y'); ?>
	<?php /* wenn Monats-Archiv */ } elseif (is_month()) { ?> Monatsarchiv für <?php the_time('F Y'); ?>
	<?php /* wenn Jahres-Arhiv */ } elseif (is_year()) { ?> Jahresarchiv für <?php the_time('Y'); ?>
	<?php /* wenn Autoren-Archiv */ } elseif (is_author()) { ?>Autoren-Archiv
	<?php /* wenn Seiten-Archiv */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {

	?>Blog-Archiv
	<?php } ?>
	<?php next_posts_link('« Vorherige Einträge') ?>
	<?php previous_posts_link('Nächste Einträge »') ?>
	<?php while (have_posts()) : the_post(); ?>
	<a href="<?php the_permalink() ?>" rel="bookmark" id="post-<?php the_ID(); ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
	<?php the_time('l,') ?> den <?php the_time('j. F Y') ?>

	<!-- nur ein Auszug des Beitrags wird angezeigt --> <?php the_excerpt() ?>
	<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>

	Kategorie <?php the_category(', ') ?> |
	<?php comments_popup_link('0 Kommentare »', '1 Kommentar »', '% Kommentare »'); ?>
	<?php edit_post_link('Bearbeiten'); ?>
	<?php endwhile; ?>
	<?php next_posts_link('« Vorherige Einträge') ?>
	<?php previous_posts_link('Nächste Einträge »') ?>

	<?php else : ?>
	Sorry, ich habe nichts gefunden.
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<?php endif; ?>

</div>

<?php 

get_sidebar();

get_footer(); 

?>
