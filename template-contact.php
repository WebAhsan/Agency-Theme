<?php

// Template Name:Contact

get_header(); ?>
<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcumb">
                    <h4><?php the_title(); ?></h4>
                    <ul>
                        <li><a href="<?php echo site_url('/'); ?>"></a>Home</li> / 
                        <li><?php the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us Area End -->
<section class="contact-area pb-100 pt-100" id="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-10 mx-auto">
                  <div class="row text-center">

                  <?php
                  $options = get_option( '_agency_my_options' ); // unique id of the framework
                     $contact_features = $options['contact-option']; // id of the top bar  field
                     foreach($contact_features as $contact_feature){
                        $contact_icon = $contact_feature['contact-icon'];
                        $contact_title = $contact_feature['contact-title'];
                        $contact_info = $contact_feature['contact-info'];
                  
                  ?>

                     <div class="col-md-4">
                        <div class="contact-address">
                           <i class="<?php echo   $contact_icon ; ?>"></i>
                           <h4><?php echo   $contact_title ; ?> <span><?php echo   $contact_info ; ?></span></h4>
                        </div>
                     </div>

                        <?php } ?>
                  
                  </div>
                  <div class="row">
                     <div class="col-md-7">
                        <div class="contact-form">
                           <?php  echo do_shortcode('[contact-form-7 id="148" title="agency form"]');?>
                        </div>
                     </div>
                     <div class="col-md-5">

                     <?php $agency_map = $options['contact-map'];
                     
                     
                     ?>

                      <div class="google-map">
      

                           <iframe src="https://maps.google.com/maps?q=<?php if(class_exists('ACF') ) : echo $agency_map['latitude']; endif; ?>,<?php if(class_exists('ACF') ) : echo $agency_map['longitude'];  endif;?>&z=15&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                     </div>




                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Contact Us Area End -->
 <?php 
 
 get_footer();
 
 ?>

