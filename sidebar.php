<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package agency
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<?php
                if ( is_active_sidebar( 'sidebar' ) ):
                 echo dynamic_sidebar('sidebar'); 
                endif;
                 ?>
