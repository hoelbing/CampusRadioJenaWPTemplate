<?php
/*
 * der Code zum einrichten (im Adminbereich) des Themes
 * bassiert auf dem theme 'clean-simple-white' Code
 * */

$themename = "CRJena";
$shortname = "CRJena";
$content_width = 510;

// variable anlegen
$CRJena_Banner_Link = get_option('CRJena_Banner_Link');

$options = array (
 
	array(  "type" => "open"),
			
	array(	"name" => "Custom Favicon",
	        "desc" => "Gebe hier dein Favicon image URL ein. Bevorzugte Groesse 16 x 16 px.",
	        "id" => $shortname."_favicon",
	        "std" => "",
	        "type" => "text"),
			
	array(	"name" => "Tracking Code",
			"desc" => "Dieser Code wird vor dem Tag the &lt;/body&gt; hinzugefuegt. ",
			"id" => $shortname."_tracking_code",
			"std" => "",
			"type" => "textarea"),
	 
	array(
			"name" => "Twitter URL",
			"desc" => "URL inklusive 'http://' angeben, wenn nicht verfuehbar leer lassen.",
			"id" => $shortname."_twitter_url",	
			"std"  => "",
			"type" => "text"),
			
	array(
			"name" => "Facebook URL",
			"desc" => "URL inklusive 'http://' angeben, wenn nicht verfuehbar leer lassen.",
			"id" => $shortname."_facebook_url",		
			"std"  => "",
			"type" => "text"),
	
	array( "type" => "close"),	
);

// WP nav menu
if (function_exists('wp_nav_menu')) {
	register_nav_menus(array('primary' => 'nav_menus_header'));
}

function CRJena_widgets_init() 
{
	register_sidebar(
		array(
			'name' => 'sidebar_box_content_banner',
			'id' => 'sidebar-1',
			'description' => 'Diese Sidebar ist nur fuer die Events Banner gedacht',
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => '',
		)
	);

	register_sidebar(
		array(
			'name' => 'sidebar_box_content',
			'id' => 'sidebar-2',
			'description' => 'sidebar_box_content',
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => '',
		)
	);
	
/*	register_sidebar(
		array(
			'name' => 'Menu',
			'id' => 'menu-1',
			'description' => 'Navigationsmenu',
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => '',
		)
	);
*/
}
add_action( 'widgets_init', 'CRJena_widgets_init' );

add_theme_support('automatic-feed-links');


add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 145, 150, true );
// additional image sizes
// delete the next line if you do not need additional image sizes
add_image_size( 'category-thumb', 145, 9999 ); //150 pixels wide (and unlimited height)

/*
function mytheme_add_admin() 
{
	/*add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');* /
}
*/
 
function theme_options() 
{
 
	global $themename, $shortname, $options;
	 
	if ( $_GET['page'] == basename(__FILE__) ) {
	 
		if ( 'save' == $_REQUEST['action'] ) 
		{
		 
			foreach ($options as $value) {
				update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
			}
			 
			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } 
			}
			 
			header("Location: themes.php?page=functions.php&saved=true");
			die;
		 
		} else if( 'reset' == $_REQUEST['action'] ) {
		 
			foreach ($options as $value) {
			delete_option( $value['id'] ); }
			 
			header("Location: themes.php?page=functions.php&reset=true");
			die;
		 
		}
		
	}else 
		{
			if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
			if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
			 
			?>
			
			<div class="wrap">
			<div id="icon-options-general" class="icon32"><br /></div>
			<h2>Campusradio Jena Template Options</h2>
			 
			<form method="post">
			 
			<?php foreach ($options as $value) 
			{
				switch ( $value['type'] ) 
				{
					case "open":
						?>
						<table width="100%" border="0" style="padding:10px;">
						 
						<?php break;
						 
					case "close":
						?>
						 
						</table><br />
						 
						<?php break;
					 
					case "title":
						?>
						<table width="100%" border="0" style="padding:5px 10px;"><tr>
						<td colspan="2" style="border-bottom: 1px dashed #aaa;"><h2 style="margin-bottom: 10px;"><?php echo $value['name']; ?></h2></td>
						</tr>
						 
						<?php break;
					 
					case 'text':
						?>
						 
						<tr>
						<td width="30%" rowspan="2" valign="middle"><?php echo $value['name']; ?></td>
						<td width="70%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
						</tr>
						 
						<tr>
						<td><span style="color: #666;"><?php echo $value['desc']; ?></span></td>
						</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dashed #aaa;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
						 
						<?php
					break;
					 
					case 'textarea':
						?>
						 
						<tr>
						<td width="30%" rowspan="2" valign="middle"><?php echo $value['name']; ?></td>
						<td width="70%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?></textarea></td>
						 
						</tr>
						 
						<tr>
						<td><span style="color: #666;"><?php echo $value['desc']; ?></span></td>
						</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dashed #aaa;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
						 
						<?php
					break;
					 
					case 'select':
						?>
						<tr>
						<td width="30%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
						<td width="70%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
						</tr>
						 
						<tr>
						<td><small><?php echo $value['desc']; ?></small></td>
						</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
						 
						<?php
					break;
					 
					case "checkbox":
						?>
						<tr>
						<td width="30%" rowspan="2" valign="middle"><?php echo $value['name']; ?></td>
						<td width="70%"><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
						<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
						<span style="color: #666;"><?php echo $value['desc']; ?></span>
						</td>
						</tr>
						
						<tr><td></td></tr>
						<tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dashed #aaa;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
						 
						<?php 
					break;
					 
				}
			}
			?>
			 
			<p class="submit">
				<input name="save" class="button-primary" type="submit" value="Speichere Aenderungen" />
				<input type="hidden" name="action" value="save" />
				</p>
			</form>
			<form method="post">
				<p class="submit">
				<input name="reset" type="submit" value="Reset" />
				<input type="hidden" name="action" value="reset" />
				</p>
			</form>
			 
<?php 			
	}
}


function CRJena_banner_option_page() 
{

	if ('insert' == $HTTP_POST_VARS['action'])
	{
	    update_option("CRJena_Banner_Link",$HTTP_POST_VARS['CRJena_Banner_Link']);
	}
	
	/* <!-- Start Optionen im Adminbereich (xhtml) -->*/
	?>
	<div class="wrap">
	    <h2>CRJena - Banner- Optionen</h2>
	    <form name="form1" method="post" action="<?php $location ?>">
		<table width="100%" border="0" style="padding:10px;">
			<tr>
				<td width="30%" rowspan="2" valign="middle"><?php echo "Link zum Event Banner" ?></td>
				<td width="50%"><input style="width:400px;" name="CRJena_Banner_Link" id="<?php echo $value['id']; ?>" type="text" value="<?php echo get_option("CRJena_Banner_Link"); ?>" /></td>
				<?php /*<td>
					<a href="media-upload.php?type=wp_myplugin&TB_iframe=true" class="thickbox">Insert something</a>
				</td>*/ ?>
			</tr>
		  </table>
		  <br />	 
	
	      <input name="save" class="button-primary" type="submit" />
	      <input name="action" value="insert" type="hidden" />
	    </form>
	</div>

<?php
} // Ende Funktion fb_meta_description_option_page()

/*
function CRJenaAdminMenu() 
{
  add_menu_page('CampusRadioJenaWPTemplate', 'CRJ-Themes', 6, '1212121212121212', 'theme_options');
  add_submenu_page('1212121212121212', 'CampusRadioJenaWPTemplate- Einstellungen', 'Einstellungen', 10, 'theme_options', 'theme_options');
  add_submenu_page('1212121212121212', 'CampusRadioJenaWPTemplate - EventBanner - Einstellungen', 'Banner', 10, 'CRJena_banner_option_page', 'CRJena_banner_option_page');
}
add_action('admin_menu', 'CRJenaAdminMenu');

add_option("CRJena_Banner_Link","");
add_option("CRJena_Banner_Link_Status","0"); //default ausgeschalten
*/

function my_new_contactmethods( $contactmethods ) 
{
    $contactmethods['frage01'] = 'Wer bist du';
    $contactmethods['frage02'] = 'Was f&uuml;hrte dich her';
    $contactmethods['frage03'] = 'Warum bist du geblieben';
    $contactmethods['frage04'] = 'Abschlie&szlig;ende Worte';
	
    return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);

// hier werden externe JavaScript Bibliotheken und dazugehoerige CSS Dateien geladen
function load_js_libs() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_bloginfo('template_url').'/js/jquery-1.6.4.min.js','1.6.4', false);
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script('pretty', get_bloginfo('template_url').'/js/jquery.prettyPhoto.js', array('jquery'), '2.5.6', false);
    wp_enqueue_style('pretty', get_bloginfo('template_url').'/css/prettyPhoto.css', false, '2.5.6', 'all' );

 //  wp_enqueue_script('liquid-canvas', get_bloginfo('template_url').'/js/liquid-canvas.js', array('jquery'),'0.3', false);
 //  wp_enqueue_script('liquid-canvas-plugins', get_bloginfo('template_url').'/js/liquid-canvas-plugins.js', array('jquery'), '0.3', false);

    wp_enqueue_script('jquery.corner', get_bloginfo('template_url').'/js/jquery.corner.js', array('jquery'),'2.12', false);
}
add_action('wp_enqueue_scripts', 'load_js_libs');

add_filter('option_ping_sites','privacy_ping_filter');
//add_filter('option_blog_charset','_wp_specialchars');
?>
