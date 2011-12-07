<?php
/**
 * Diese PHP-Seite wird aufgefrufen wenn ein 
 * Author angezeigt werden soll.
 * 
*/
?>

<?php get_header(); ?>

<div id="box_content">

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>

    <h2>&Uuml;ber: <?php echo $curauth->nickname; ?></h2>
    <dl>
	<?php if ($curauth->user_url != "")
	{?>
        	<dt>Website: </dt>
        	<dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
	<?php }?>

	<?php if ($curauth->user_description != "")
	{?>
        	<dt>Profile: </dt>
        	<dd><?php echo $curauth->user_description; ?></dd>
	<?php }?>

	<?php if ($curauth->frage01 != "")
	{?>
        	<dt>Profile: </dt>
        	<dd><?php echo $curauth->frage01; ?></dd>
	<?php }?>
	<?php if ($curauth->user_description != "")
	{?>
        	<dt>Profile: </dt>
        	<dd><?php echo $curauth->user_description; ?></dd>
	<?php }?>
    </dl>

    <h2>Artikel von <?php echo $curauth->nickname; ?>:</h2>

    <ul>
<!-- The Loop -->

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
            <?php the_title(); ?></a>,
            <?php the_time('d M Y'); ?>
        </li>

    <?php endwhile; else: ?>
        <p>hat noch keine Artikel geschrieben</p>
    <?php endif; ?>

<!-- End Loop -->

    </ul>
</div>
<?php 

get_sidebar();

get_footer(); 

?>
