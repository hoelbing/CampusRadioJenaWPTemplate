<div id="box_sidebar">
<?php
global $options;

dynamic_sidebar('sidebar_box_content_banner');

?>
<?php
foreach ($options as $value) {
    if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $value['id'] = get_option( $value['id'] ); }
}

	dynamic_sidebar('sidebar_box_content');
?>
</div><!-- end sidebar -->
