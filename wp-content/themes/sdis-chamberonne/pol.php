<?php
$path = preg_replace( '/wp-content.*$/', '', __DIR__ );
require_once( $path . 'wp-load.php' );


$url = site_url();
echo $url;
echo "<br>";
echo get_site_url();
echo "<br>";

?>
<h2>Heading</h2>
<p><?php get_site_url(); ?></p>
<a href="<?php echo site_url(); ?>">Link</a>

<a href="<?php get_site_url(); ?>">Link</a>

<p>bla bla bla bla</p>
