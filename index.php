<?php get_header(); ?>

<div id="box_content">
	
 <?php query_posts('pagename=wochenplan'); // ausschließen der ersten Kategorie ?>

 <?php while (have_posts()) : the_post(); // der Loop wird gestartet ?>

	<?php the_content() ?>

 <?php endwhile; ?>
<br/>
<br/>
<hr/>
<br/>
 <?php wp_reset_query(); ?>
 
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>"><!-- post div -->
		<table width="100%" cellspacing ="0" cellpadding ="6" border="0">
			<tr>
				<td align="left" valign="top" width="150">
					<?php if ( has_post_thumbnail()) : ?>
					   <a href="<?php the_permalink(); ?>" title="<?php trim(the_title_attribute()); ?>" >
					   <?php the_post_thumbnail(array(150,150), array("class" => "attachment-thumbnail")); ?>
					   </a>
					<?php endif; ?>
					<div class="artikel_meta_info">
						<?php 
							the_time('j F, Y'); echo "<br/> um "; the_time('H:i');echo " Uhr";
							echo "<br/>von: "; the_author();
							echo "<br/>";
							edit_post_link('Beitrag bearbeiten.',' ','');
							echo "<br/><br/>";
							comments_popup_link('Keine Kommentare bisher', '1 Kommentar bisher', '% Kommentare bisher ', 'Kommentar-Link', 'Kommentare ausgeschaltet');
							//falls das plugin installiert ist, werden die Viewer angezeigt
							if(function_exists('the_views')) { echo " | ";the_views(); }
						?> 
					</div>			
				</td>
				<td align="left" valign="top">
					<div class="entry">
					<h2>
						 <a href="<?php the_permalink() ?>"><?php trim(the_title())?></a>
					</h2>
						<?php 
							global $more;
							$more = 0;	 
							//the_content('<br/><br/>Weiterlesen ... »');
							the_content('Weiterlesen ...');
						?>
					</div>
					
					<?php
						the_tags('<div class="tags-post">Tags:', ", ", '</div>');
						//the_tags(__('<div class="tags-post">Tags: ', 'tags'), ", ", "</div>");  
					?>
					
				</td>
			</tr>
		</table>
		<br/>
		<hr/>
		<br/>
	</div><!-- END post -->
	<?php endwhile; endif; ?>
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
