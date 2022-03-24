<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package agency
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open();

// Get options
$options = get_option( '_agency_my_options' ); // unique id of the framework

$header_email = $options['header-email']; // id of the eamil field
$header_number = $options['header-number']; // id of the number field
$header_socails = $options['header-social']; // id of the social field
$header_bg = $options['header-bg']; // id of the top bar  field



?>




	   <section class="header-top" style="background:<?php echo $header_bg; ?>">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="header-left">

							<?php if($header_email){ ?>
							<a href=""><i class="fa fa-envelope"></i><?php echo $header_email; ?></a>
							<?php } ?>
							<?php if($header_number){ ?>
							<a href=""><i class="fa fa-phone"></i> <?php echo $header_number; ?></a>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="header-social">

							<?php if( $header_socails){
								
								foreach($header_socails as $header_socail ){ 

								$social_link = $header_socail['social-link'];
								$social_icon = $header_socail['social-icon'];
								
								?>
						
							<a href="<?php echo $social_link   ?>"><i class="<?php echo $social_icon; ?>"></i></a>
							<?php } } ?>

						</div>
					</div>
				</div>
			</div>
	   </section>
      <!-- Header Area Start -->
      <header class="header header-fixed">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <nav class="navbar navbar-expand-md navbar-light">
                     <?php 
					 	$custom_logo_id = get_theme_mod( 'custom_logo' );
						 $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						  
						 if ( has_custom_logo() ) {
							 echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
						 } else {
							 echo '<h1>' . get_bloginfo('name') . '</h1>';
						 }
						?>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse ml-auto mainmenu" id="navbarNav">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container'      => 'ul',
									'menu_class'	=> 'navbar-nav ml-auto',
								)
							);
						?>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </header>
      <!-- Header Area Start -->