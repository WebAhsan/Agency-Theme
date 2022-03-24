<?php

// Template Name:About Us

get_header(); ?>
      <!-- Header Area Start -->
<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcumb">
                    <h4>About Us</h4>
                    <ul>
                    <li><a href="<?php echo home_url('/') ?>"></a>Home</li> / 
                        <li><?php the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Area Start -->
<section class="about-area pt-100 pb-100" id="about">
         <div class="container">
            <div class="row section-title">



        <?php 
        
   
        $options = get_option( '_agency_my_options' ); // unique id of the framework

        $header_section = $options['abt-header-section']; // id of the top bar  field

        if($header_section){

         $abt_header_title = $header_section['abt-header-title'];
         $abt_header_subtitle = $header_section['abt-header-subtitle'];
         $abt_header_des = $header_section['abt-header-des'];

    
           
           ?>
            
               <div class="col-md-6 text-right">
                  <h3><span><?php echo $abt_header_subtitle; ?></span> <?php echo $abt_header_title; ?></h3>
               </div>
               <div class="col-md-6">
                  <p><?php echo $abt_header_des; ?> </p>
               </div>

               <?php } ?>


            </div>
            <div class="row">
               <div class="col-md-7">


               

               <?php 
        
   
        $header_section = $options['abt-header-content']; // id of the top bar  field

        if($header_section){
         $abt_content_title = $header_section['abt-content-title'];
         $abt_content_des = $header_section['abt-content-des'];
         $abt_content_btn = $header_section['abt-content-btn'];
         $abt_content_btn_url = $header_section['abt-content-url'];
           
           ?>
                  <div class="about">
                     <div class="page-title">
                        <h4><?php echo $abt_content_title; ?></h4>
                     </div>
                     <p><?php echo $abt_content_des; ?></p>

                     <?php if($abt_content_btn):?>
                     <a href="<?php echo $abt_content_btn_url; ?>" class="box-btn"><?php echo $abt_content_btn; ?> <i class="fa fa-angle-double-right"></i></a>

                        <?php endif; ?>
                  </div>

                  <?php }
                  ?>
                        

               </div>
               <div class="col-md-5">


               <?php 
        
   
        $about_features = $options['abt-header-feature']; // id of the top bar  field


        if($about_features){
        foreach( $about_features as $about_feature){

         $abt_feature_title = $about_feature['abt-feature-title'];
         $abt_feature_des = $about_feature['abt-feature-des'];
         $abt_feature_icon = $about_feature['abt-feature-icon'];
           
           ?>
                  <div class="single_about">

                     <i class="<?php echo $abt_feature_icon; ?>"></i>
                 

                     <h4><?php echo $abt_feature_title; ?></h4>
                     <p><?php echo $abt_feature_des; ?></p>
                  </div>
                  <?php }} ?>
               </div>
               
            </div>
         </div>
      </section>
      <!-- About Area End -->
 <?php
 
 get_footer();
 
 ?>