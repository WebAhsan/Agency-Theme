<?php

// Template Name:Services

get_header(); ?>
      <!-- Header Area Start -->
<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcumb">
                    <h4><?php the_title(); ?></h4>
                    <ul>
                        <li><a href="<?php echo home_url('/') ?>"></a>Home</li> / 
                        <li><?php the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Area Start -->
<section class="services-area pt-100 pb-50" id="services">
         <div class="container">
            <div class="row section-title">
            <?php
            $options = get_option( '_agency_my_options' ); // unique id of the framework
            $serv_header_section = $options['serv-header-section'];
            if($serv_header_section):
            $serve_subtitle =  $serv_header_section['serv-header-subtitle'];
            $serve_title =  $serv_header_section['serv-header-title'];
            $serve_des =  $serv_header_section['serv-header-des'];
         
            
            ?>


               <div class="col-md-6 text-right">
                  <h3><span><?php echo $serve_subtitle; ?></span> <?php echo $serve_title; ?></h3>
               </div>
               <div class="col-md-6">
                  <p><?php echo $serve_des; ?> </p>
               </div>
               <?php endif; ?>
            </div>
            <div class="row">

               <?php 
               
            $args = array(
               'post_type' => 'agency_service',
               'posts_per_page' => '6',
            );
            $agency_service_query = new WP_Query($args);
            while($agency_service_query->have_posts()) : $agency_service_query->the_post();
      
                ?>
               <div class="col-lg-4 col-md-6">
                  <!-- Single Service -->
                  <div class="single-service">
                      <!-- <i class=""></i> -->
                      <?php
                      if(class_exists('ACF') ) :
                       echo the_field('service_icon');
                      endif;
                       ?>
                     <h4><?php the_title(); ?></h4>
                     <?php the_content(); ?>
                  </div>
               </div>

               <?php endwhile;?>
            </div>
         </div>
      </section>
      <!-- Services Area End -->
<?php

get_footer();


?>