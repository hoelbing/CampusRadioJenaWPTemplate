<?php get_header(); ?>

<div id="box_content">
	
 <?php query_posts('pagename=wochenplan'); // ausschließen der ersten Kategorie ?>

 <?php while (have_posts()) : the_post(); // der Loop wird gestartet ?>

	<?php the_content() ?>

 <?php endwhile; ?>
 <br/><br/><hr><br/>
 <?php wp_reset_query(); ?>
 
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<table width="100%" cellspacing ="0" cellpadding ="6" border="0">
			<tr>
				<td align="left" valign="top" width="150px">
					<?php if ( has_post_thumbnail()) : ?>
					   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
					   <?php the_post_thumbnail(array(150,150), array("class" => "attachment-thumbnail")); ?>
					   </a>
					<?php endif; ?>
					<div id="meta">
						<?php 
							the_time('j F, Y'); echo "<br/> um "; the_time('H:i');echo " Uhr";
							echo "<br/>von: "; the_author();
							echo "<br/>";
							edit_post_link('Beitrag bearbeiten.',' ','');
							echo "<br/><br/>";
							comments_popup_link('Keine Kommentare bisher', '1 Kommentar bisher', '% Kommentare bisher ', 'Kommentar-Link', 'Kommentare ausgeschaltet');
						?> 
					</div>			
				</td>
				<td align="left" valign="top">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

					<div class="entry">
						<?php 
							if (is_sticky()) {
							  global $more;    // Declare global $more (before the loop).
							  $more = 1;       // Set (inside the loop) to display all content, including text below more.
							  the_content();
							} else {
							  global $more;
							  $more = 0;
							  the_content('<br/><br/>Weiterlesen ... »');
							}
/*
							//the_content('Weiterlesen ...');
							//the_content_rss('Weiterlesen...', 1, '', 60); 
							$content = get_the_content();
							$content_strlen = strlen($content);
							$max_lng = 400;
							if ($content_strlen < $max_lng )
								$max_lng = $content_strlen;
							//echo "content_strlen:".$content_strlen."::".$max_lng."<br>";
							echo substr($content, 0, $max_lng );
							if ($content_strlen > 400 )
							{						
								echo '<br/><br/>';
								echo '<a href="';
								echo the_permalink();
								echo '">Weiterlesen ...</a>';
							}
*/
						?>
					</div>
					
					<?php the_tags(__('<div class="tags-post">Tags: ', 'tags'), ", ", "</div>");  ?>
					
				</td>
			</tr>
		</table>
		<br/>
		<hr/>
		<br/>
	<?php endwhile; endif; ?>

	<?php /**muss noch im css eingebaut werden**/ ?>
	<div class="page-nav">
		<span class="older">
			<?php next_posts_link('Nächste Artikel &raquo;') ?>
		</span>
		<span class="newer">
			<?php previous_posts_link('&laquo; Vorherige Artikel') ?>
		</span>
	</div>
</div>
<?php 

get_sidebar();

get_footer(); 

?>
