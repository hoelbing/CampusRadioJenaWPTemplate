<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php if ( is_home() ) echo bloginfo('name');?></title>
	    
	<meta name="description" content="<?php bloginfo('name');?>" />
	<meta name="keywords" content="Campusradio Jena, Campusradio, Jena" />
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="content-language" content="de" />
	<meta http-equiv="pragma" content="no-cache" />

	<?php
		remove_action('wp_head', 'wp_generator');  // Versionsnummer entfernen 
		wp_head();
	?>	

	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>"  media="screen" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo ('pingback_url'); ?>" />

	<script type="text/javascript">
		$(document).ready(function(){
			$('#wrapper').corner("20px");
			//$("a[rel^='prettyPhoto']").prettyPhoto();
		});
	</script>
<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://stats.campusradio-jena.de/" : "http://stats.campusradio-jena.de/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 3);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://stats.campusradio-jena.de/piwik.php?idsite=3" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->
<?php
/*
      // First we wait until the document is completely loaded using the handy
      // jQuery "ready" method.
      $(window).load(function() {
        // No we can paint our canvas. Something rounded with a shadow ;-)
        $("#wrapper").liquidCanvas(
            "fill{color:#fff} => roundedRect");
      });
	<script type="text/javascript">
		(function($) {
		    $(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
		    });
		// No we can paint our canvas. Something rounded with a shadow ;-)

		})(jQuery);
	</script>
*/
?>
</head> 

<body>
<div id="wrapper">
	
    <div id="page_header">
		<table>
		  <tr>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		  </tr>
		  <tr>
		    <td width="3%" >&nbsp;</td>
		    <td width="61%">
			<a href="<?php bloginfo('url'); ?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logoEule.png" alt="Campusradio Jena Logo" />
			</a>
		    </td>
		    <td width="36%" valign="middle">
			    <table cellpadding="2">
			      <tr align="center" valign="bottom">
				<td><a href="<?php bloginfo('stylesheet_directory'); ?>/playlist.php"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/playlist.png" alt="Playlist" /></a></td>
		        	<td>
					<a title="Player starten" onclick="window.open('<?php bloginfo('url'); ?>/webplayer/webplayer.html','player','width=400,height=150'); return false; resizable=no; location=no; status=no" href="<?php bloginfo('url'); ?>/webplayer/webplayer.html"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/hoeren.png" alt="Hoeren" /></a></td>
		        	<td><a href="<?php bloginfo('url'); ?>/interaktiv/studiocam/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/cam.png" alt="StudiCam" /></a></td>
				<td>&nbsp;</td>
		      	      </tr>
			      <tr>
				<td align="center" valign="bottom"><a href="<?php bloginfo('url'); ?>/interaktiv/playlist/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/playlist_sc.png" alt="Playlist" /></a></td>
		        	<td align="center" valign="bottom"><a title="Player starten" onclick="window.open('<?php bloginfo('url'); ?>/webplayer/webplayer.html','player','width=400,height=150'); return false; resizable=no; location=no; status=no" href="<?php bloginfo('url'); ?>/webplayer.html"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/hoeren_sc.png" alt="Hoeren" /></a></td>
		        	<td align="center" valign="bottom"><a href="<?php bloginfo('url'); ?>/interaktiv/studiocam/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/cam_sc.png" alt="StudiCam" /></a></td>
				<td>&nbsp;</td>
		      	      </tr>
			  </table>
		  </td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		  </tr>
		
		</table>

	</div>
	<?php dynamic_sidebar('Menu'); ?>
	
	<div id="nav">
		<div id="menus">
			<ul><li<?php if (is_home()) echo ' class="current_page_item"'; ?>><a href="<?php echo home_url(); ?>">Startseite</a></li></ul>
			<?php wp_nav_menu( array( 'container' => 'none', 'theme_location' => 'primary' ) ); ?>
		</div>
	</div>
