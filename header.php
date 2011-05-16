<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

	<title><?php if ( is_home() ) echo bloginfo('name');?></title>
	    
	<meta name="description" content="Campusradio Jena" />
	<meta name="keywords" content="Campusradio Jena, Campusradio, Jena" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="content-language" content="de" />
	<meta http-equiv="pragma" content="no-cache" />
	
	<meta name="siteinfo" content="<?php bloginfo('url'); ?>/robots.txt" />
	<meta name="robots" content="index,follow" />

	<?php /*<?php bloginfo('template_directory')?>*/?>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>"  media="screen" />
	<link rel="stylesheet" type="text/css" href="style.css"  media="screen" />	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo ('pingback_url'); ?>" />
<?php wp_head(); ?> 

</head> 

<body>
	<div id="wrapper">
	
    <div id="page_header">

	</div>