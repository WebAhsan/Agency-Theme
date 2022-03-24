<?php 


// Template Name:Gallery

get_header();


?>
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

<section class="gallery-area pt-100 pb-100">
    <div class="container">
        <div class="row">

         <?php

            $args = array(
               'post_type' => 'agency_gallery',
               'posts_per_page' => '6',
            );
            $galleryyy_query = new WP_Query($args);
            while($galleryyy_query->have_posts()) : $galleryyy_query->the_post();
         
         ?>


            <div class="col-xl-4">
                <div class="single-gallery">
                     <?php the_post_thumbnail();?>
                     <div class="gallery-hover">
                        <div class="gallery-content">
                           <h3><a href="<?php
                           if(class_exists('ACF') ) :
                          $popup_img = get_field('popup_image'); 
                           echo $popup_img['url']; endif;
                           ?>" class="gallery"><i class="fa fa-plus"></i> <?php the_title(); ?></a></h3>
                        </div>
                    </div>
                </div>
            </div>


      <?php
      endwhile;
      ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>