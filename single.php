<?php
/**
 * Diese PHP-Seite wird aufgefrufen wenn eine 
 * Artikel angezeigt werden soll.
 * 
*/

get_header(); ?>

<div id="box_content">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<!-- der vorherige und naechste Artikel werden verlinkt -->
		<?php previous_post_link('« %link') ?> | <?php next_post_link('%link »') ?>
		<br />
		<hr/>
		<br />
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
						?> 
					</div>			
				</td>
				<td align="left" valign="top">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

					<div class="entry">
						<?php the_content('...'); ?>
					</div>
					
					<?php the_tags(__('<div class="tags-post">Tags: ', 'tags'), ", ", "</div>");  ?>
					<iframe src="http://www.facebook.com/plugins/like.php?app_id=158385147561968&amp;href=<?php echo get_permalink($post->ID); ?>&amp;send=true&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
					<br/><br/>
					<?php comments_template( '', true ); ?>

				</td>
			</tr>
		</table>
	<?php endwhile; endif; ?>

</div>

<?php 

get_sidebar();

get_footer(); 

?>
