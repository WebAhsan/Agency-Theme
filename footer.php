<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package agency
 */


 // Get options
$options = get_option( '_agency_my_options' ); // unique id of the framework

$cat_title = $options['cat-title'];
$cat_subtitle = $options['cat-subtitle'];
$cat_btn = $options['cat-btn-text'];
$cat_btn_link = $options['cat-btn-link'];

?>
 <!-- CTA Area Start -->
 <section class="cta">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <h4><?php echo $cat_title; ?><span><?php echo $cat_subtitle; ?></span></h4>
         </div>
         <div class="col-md-6 text-center">
            <a href="<?php echo $cat_btn_link; ?>" class="box-btn"><?php echo $cat_btn; ?> <i class="fa fa-angle-double-right"></i></a>
         </div>
      </div>
   </div>
</section>
<!-- CTA Area End -->
<!-- Footer Area End -->
<footer class="footer-area pt-50 pb-50">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-md-6">
            <?php 
            
            if(is_active_sidebar('footer-1')){
               dynamic_sidebar('footer-1');
            }
            
            ?>
         </div>
         <div class="col-lg-2 col-md-6">
         <?php 
            
            if(is_active_sidebar('footer-2')){
               dynamic_sidebar('footer-2');
            }
            
            ?>
         </div>
         <div class="col-lg-4 col-md-6">
         <?php 
            
            if(is_active_sidebar('footer-3')){
               dynamic_sidebar('footer-3');
            }
            
            ?>
         </div>
         <div class="col-lg-3 col-md-6">
         <?php 
            
            if(is_active_sidebar('footer-4')){
               dynamic_sidebar('footer-4');
            }
            
            ?>
         </div>
      </div>
      <div class="row copyright">
         <div class="col-md-6">
            <p><?php echo $options['footer-copyright'];  ?></p>
         </div>
         <div class="col-md-6 text-right">
            <ul>

            <?php 

            $footer_options = $options['footer-option'];
            if($footer_options){
            foreach($footer_options as $footer_option){
            ?>

               <li><a href="<?php echo $footer_option['footer-link']; ?>"><i class="<?php echo $footer_option['footer-icon']; ?>"></i></a></li>

            <?php } }?>

            </ul>
         </div>
      </div>
   </div>
</footer>

<?php wp_footer(); ?>
<!-- Footer Area End -->
</body>
</html>
