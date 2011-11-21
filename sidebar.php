<div id="box_sidebar">
<?php
global $options;

dynamic_sidebar('sidebar_box_content_banner');

/*?>
<div id="socialpic">


<table cellspacing="10" cellpadding="5" align="right">
	<tr>
		<td>
			<a href="http://www.facebook.com/profile.php?ref=profile&amp;id=100000630928257&amp;ref=ts" rel="nofollow" target="_blank" >
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/socialpic/facebook.png" alt="Facebook" title="Facebook" />
			</a>
		</td>
		<td>
			<a href="http://www.twitter.com/campusradiojena" rel="nofollow" target="_blank">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/socialpic/twitter.png" alt="Twitter" title="Twitter" />
			</a>
		</td>
		<td>
			<a href="https://plus.google.com/100590966155526036461/about" rel="nofollow" target="_blank">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/socialpic/gplus-blue-32x32.png" alt="Google +" title="Google +" />
			</a>
		</td>
	</tr>
</table>

</div>
<br />
<br />

*/?>
<?php
foreach ($options as $value) {
    if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $value['id'] = get_option( $value['id'] ); }
}

	dynamic_sidebar('sidebar_box_content');
?>
</div><!-- end sidebar -->
